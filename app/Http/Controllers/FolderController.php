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
        SEOMeta::setTitle($folder->name);
        SEOMeta::setDescription('Caperta de Material Digital Jurídico & Informatico');
        SEOMeta::setCanonical('https://advocatus-online.com/folders');

        OpenGraph::setDescription('Caperta de Material Digital Jurídico & Informatico');
        OpenGraph::setTitle($folder->name);
        OpenGraph::setUrl('https://advocatus-online.com/folders');
        OpenGraph::addProperty('type', 'articles');

        TwitterCard::setTitle($folder->name);
        TwitterCard::setSite('@Sobotred');

        JsonLd::setTitle($folder->name);
        JsonLd::setDescription('Caperta de Material Digital Jurídico & Informatico');
        JsonLd::addImage('https://advocatus-online.com/assets/imgs/icons8-carpeta-48.png');
        return view('folders.show', compact('folder'));
    }

    public function ver(File $item){
        SEOMeta::setTitle($item->name);
        SEOMeta::setDescription('Archivo para Descargar de :'.$item->folder->name);
        SEOMeta::setCanonical('https://advocatus-online.com/folders');

        OpenGraph::setDescription('Archivo para Descargar de :'.$item->folder->name);
        OpenGraph::setTitle($item->name);
        OpenGraph::setUrl('https://advocatus-online.com/folders');
        OpenGraph::addProperty('type', 'articles');

        TwitterCard::setTitle($item->name);
        TwitterCard::setSite('@Sobotred');

        JsonLd::setTitle($item->name);
        JsonLd::setDescription('Archivo para Descargar de :'.$item->folder->name);
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
