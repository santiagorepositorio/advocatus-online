<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Folder;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\Storage;


class FolderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        SEOMeta::setTitle('Materiales (Memoriales, Libros y Otros)');
        SEOMeta::setDescription('Para Abogados & Informáticos');
        SEOMeta::setCanonical('https://advocatus-online.com/folders');

        OpenGraph::setDescription('Para Abogados & Informáticos');
        OpenGraph::setTitle('Materiales (Memoriales, Libros y Otros)');
        OpenGraph::setUrl('https://advocatus-online.com/folders');
        OpenGraph::addProperty('type', 'articles');

        TwitterCard::setTitle('Materiales (Memoriales, Libros y Otros)');
        TwitterCard::setSite('@Sobotred');

        JsonLd::setTitle('Materiales (Memoriales, Libros y Otros)');
        JsonLd::setDescription('Para Abogados & Informáticos');
        JsonLd::addImage('https://advocatus-online.com/assets/imgs/icons8-carpeta-48.png');
        return view('folders.index');
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
    public function show(Folder $folder)
    {
        $postBodyWithoutTags = strip_tags('Caperta de Material Digital Jurídico & Informatico');
        SEOMeta::setTitle($folder->name);
        SEOMeta::setDescription($postBodyWithoutTags);       

        SEOMeta::setTitle($folder->name);
        SEOMeta::setDescription($postBodyWithoutTags);
        SEOMeta::addMeta('article:section', $folder->category, 'property');       

        OpenGraph::setDescription($postBodyWithoutTags);
        OpenGraph::setTitle($folder->name);
        OpenGraph::addImage('https://advocatus-online.com/assets/imgs/icons8-carpeta-48.png');    

        TwitterCard::setTitle($folder->name);
        TwitterCard::setSite('@Sobotred');

        JsonLd::setTitle($folder->name);
        JsonLd::setDescription($postBodyWithoutTags);
        JsonLd::addImage('https://advocatus-online.com/assets/imgs/icons8-carpeta-48.png');

        return view('folders.show', compact('folder'));
    }

    public function ver(File $item){

        $postBodyWithoutTags = strip_tags('Archivo para Descargar de :'.$item->folder->name);
        SEOMeta::setTitle($item->name);
        SEOMeta::setDescription($postBodyWithoutTags);       

        SEOMeta::setTitle($item->name);
        SEOMeta::setDescription($postBodyWithoutTags);
        SEOMeta::addMeta('article:section', $item->folder->category, 'property');       

        OpenGraph::setDescription($postBodyWithoutTags);
        OpenGraph::setTitle($item->name);
        OpenGraph::addImage('https://advocatus-online.com/assets/imgs/archivo-min.png');    

        TwitterCard::setTitle($item->name);
        TwitterCard::setSite('@Sobotred');

        JsonLd::setTitle($item->name);
        JsonLd::setDescription($postBodyWithoutTags);
        JsonLd::addImage('https://advocatus-online.com/assets/imgs/archivo-min.png');

        return view('folders.ver', compact('item'));
    }
    public function download(File $item)
    {
        return response()->download(storage_path('app/public/' . $item->resource->url));
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
