<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('blogs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {

        SEOMeta::setTitle($post->title);
        SEOMeta::setDescription($post->body);
       

        SEOMeta::setTitle($post->title);
        SEOMeta::setDescription($post->body);
        SEOMeta::addMeta('article:section', $post->category, 'property');       

        OpenGraph::setDescription($post->body);
        OpenGraph::setTitle($post->title);
        OpenGraph::addImage($post->image);
    
        TwitterCard::setTitle($post->title);
        TwitterCard::setSite('@Sobotred');

        JsonLd::setTitle($post->title);
        JsonLd::setDescription($post->body);
        JsonLd::addImage($post->image);

        $similares = Post::where('category_id', $post->category_id)   
                    ->where('id', '!=', $post->id)                 
                    ->orderBy('published_at', 'desc') 
                    ->where('published', 1)
                    ->take(5)
                    ->get();


        return view('blogs.show', compact('post', 'similares'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
