<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Outlet;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOTools;

class OutletMapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        $postBodyWithoutTags = strip_tags('Guía de referencia sobre Centros Inclusivos por Departamentos a Nivel Nacional - Bolivia');
        SEOMeta::setTitle('Centros e Institutos Inclusivos');
        SEOMeta::setDescription($postBodyWithoutTags);       

        SEOMeta::setTitle('Centros e Institutos Inclusivos');
        SEOMeta::setDescription($postBodyWithoutTags);
        SEOMeta::addMeta('article:section', 'Centros Inclusivos', 'property');       

        OpenGraph::setDescription($postBodyWithoutTags);
        OpenGraph::setTitle('Centros e Institutos Inclusivos');
        OpenGraph::addImage('https://advocatus-online.com/assets/imgs/theme/mapageo.png');    

        TwitterCard::setTitle('Centros e Institutos Inclusivos');
        TwitterCard::setSite('@Sobotred');

        JsonLd::setTitle('Centros e Institutos Inclusivos');
        JsonLd::setDescription($postBodyWithoutTags);
        JsonLd::addImage('https://advocatus-online.com/assets/imgs/theme/mapageo.png');
        $categories = Category::where('status', 'Centro')->get();
        return view('outlets.map', compact('categories'));
    }

    
}
