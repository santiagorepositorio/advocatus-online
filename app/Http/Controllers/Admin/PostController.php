<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use App\Jobs\ResizeImage;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('user_id', auth()->id())
            ->latest('id')
            ->paginate(10);

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $categories = Category::where('status', 'Blog')->get();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts',
            'category_id' => 'required|exists:categories,id',
        ]);

        $post = Post::create($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'El post se creó correctamente.',
        ]);

        return redirect()->route('post.posts.edit', $post);
    }

 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // $post = Post::where('slug', $post)
        //                 ->where('user_id', auth()->id())
        //                 ->firstOrFail();
        if (!Gate::allows('author', $post)) {
            abort(403, 'No tienes permisos para editar este post');
        }

        /* $this->authorize('author', $post); */

        $categories = Category::all();

        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts,slug,' . $post->id,
            'category_id' => 'required|exists:categories,id',
            'excerpt' => $request->published ? 'required' : 'nullable',
            'body' => $request->published ? 'required' : 'nullable',
            'published' => 'required|boolean',
            'tags' => 'nullable|array',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:6144'
        ]);

        $old_images = $post->images->pluck('url')->toArray();

        $re_extractImages = '/src=["\']([^ ^"^\']*)["\']/ims';
        preg_match_all($re_extractImages, $request->body, $matches);
        $images = $matches[1];

        foreach ($images as $key => $image) {
            $images[$key] = 'images/' . pathinfo($image, PATHINFO_BASENAME);
        }

        $new_images = array_diff($images, $old_images);
        $deleted_images = array_diff($old_images, $images);

        foreach ($new_images as $image) {
            $post->images()->create([
                'url' => $image,
            ]);
        }

        

        foreach ($deleted_images as $image) {
            Storage::delete($image);
            Image::where('url', $image)->delete();
        }

        $data = $request->all();

        $tags = [];

        foreach($request->tags ?? [] as $name)
        {
            $tag = Tag::firstOrCreate([
                'name' => $name,
            ]);

            $tags[] = $tag->id;
        }

        $post->tags()->sync($tags);

        if($request->file('image'))
        {
            if($post->image_path){
                Storage::delete($post->image_path);
            }

            $file_name = $request->slug . '.' . $request->file('image')->getClientOriginalExtension();
            $data['image_path'] = Storage::putFileAs('posts', $request->image, $file_name, 'public');

            //storage/posts/imagen.jpg
            ResizeImage::dispatch($data['image_path']);
            

            /* $data['image_path'] = $request->file('image')->storeAs('posts', $file_name, [
                'visibility' => 'public',
            ]); */
        }

        $post->update($data);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'El post se actualizó correctamente.',
        ]);

        return redirect()->route('post.posts.edit', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'El post se eliminó correctamente.',
        ]);

        return redirect()->route('post.posts.index');
    }
}
