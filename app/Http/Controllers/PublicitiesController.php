<?php

namespace App\Http\Controllers;

use App\Models\Publicity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PublicitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('instructor.publicities.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('instructor.publicities.create');
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
            'title' => 'required|max:255',            
            'description' => 'required|max:255',
            'link' => 'required|max:500',           
            'file' => 'image',
            
        ]);
        //return $request->all();
        
       $publicity = Publicity::create($request->all());
       
       if($request->file('file')){
           $url = Storage::put('images/publicity', $request->file('file'));
           $publicity->image()->create([
                'url' => $url
           ]);
        }
        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Bien hecho!',
            'text' => 'El Banner se creó correctamente.',
        ]);
        return redirect()->route('instructor.publicities.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Publicity $publicity)
    {
        return view('instructor.publicities.edit', compact('publicity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publicity $publicity)
    {
        
        $request->validate([
            'title' => 'required|max:255',            
            'description' => 'required|max:255',
            'link' => 'required|max:500',           
            'file' => 'image',
            
        ]);
        $publicity->update($request->all());
        
        if($request->file('file')){
            $url = Storage::put('images/publicity', $request->file('file'));
            if($publicity->image){
                Storage::delete($publicity->image->url);
                $publicity->image->update([
                    'url' => $url
                ]);
            }else{
                $publicity->image()->create([
                    'url' => $url
                ]);
            }
        }
        return redirect()->route('instructor.publicities.edit', $publicity);
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
