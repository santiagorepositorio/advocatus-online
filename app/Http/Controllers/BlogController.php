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
        SEOMeta::setTitle('Artículos Publicados');
        SEOMeta::setDescription('Publicaciones profesionales Jurídico & Informáticos sobre temas del Derecho, Discapacidad, TEA y otros referentes');
        SEOMeta::setCanonical('https://advocatus-online.com/posts');

        OpenGraph::setDescription('Publicaciones profesionales Jurídico & Informáticos sobre temas del Derecho, Discapacidad, TEA y otros referentes');
        OpenGraph::setTitle('Artículos Publicados');
        OpenGraph::setUrl('https://advocatus-online.com/posts');
        OpenGraph::addProperty('type', 'articles');

        TwitterCard::setTitle('Artículos Publicados');
        TwitterCard::setSite('@Sobotred');

        JsonLd::setTitle('Artículos Publicados');
        JsonLd::setDescription('Publicaciones profesionales Jurídico & Informáticos sobre temas del Derecho, Discapacidad, TEA y otros referentes');
        JsonLd::addImage('https://advocatus-online.com/assets/imgs/theme/bloguear.png');
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
        $postBodyWithoutTags = strip_tags($post->body);

        SEOMeta::setTitle($post->title);
        SEOMeta::setDescription($postBodyWithoutTags);
       

        SEOMeta::setTitle($post->title);
        SEOMeta::setDescription($postBodyWithoutTags);
        SEOMeta::addMeta('article:section', $post->category, 'property');       

        OpenGraph::setDescription($postBodyWithoutTags);
        OpenGraph::setTitle($post->title);
        OpenGraph::addImage($post->image);
    
        TwitterCard::setTitle($post->title);
        TwitterCard::setSite('@Sobotred');

        JsonLd::setTitle($post->title);
        JsonLd::setDescription($postBodyWithoutTags);
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
