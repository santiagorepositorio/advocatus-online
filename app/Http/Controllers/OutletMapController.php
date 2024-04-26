<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Outlet;
use Illuminate\Http\Request;

class OutletMapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('status', 'Centro')->get();
        return view('outlets.map', compact('categories'));
    }

    
}
