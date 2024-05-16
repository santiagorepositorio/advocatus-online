<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        SEOMeta::setTitle('Perfiles Profesionales Publicados');
        SEOMeta::setDescription('Guía de Contactos de Profesionales en Derecho y otras Profesiones');
        SEOMeta::setCanonical('https://advocatus-online.com/profiles');

        OpenGraph::setDescription('Guía de Contactos de Profesionales en Derecho y otras Profesiones');
        OpenGraph::setTitle('Perfiles Profesionales Publicados');
        OpenGraph::setUrl('https://advocatus-online.com/profiles');
        OpenGraph::addProperty('type', 'articles');

        TwitterCard::setTitle('Perfiles Profesionales Publicados');
        TwitterCard::setSite('@Sobotred');

        JsonLd::setTitle('Perfiles Profesionales Publicados');
        JsonLd::setDescription('Guía de Contactos de Profesionales en Derecho y otras Profesiones');
        JsonLd::addImage('https://advocatus-online.com/assets/imgs/theme/bloguear.png');
        return view('profiles.index');
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
    public function show(Profile $profile)
    {
        $postBodyWithoutTags = strip_tags($profile->about);

        SEOMeta::setTitle($profile->name);
        SEOMeta::setDescription($postBodyWithoutTags);
       

        SEOMeta::setTitle($profile->name);
        SEOMeta::setDescription($postBodyWithoutTags);
        SEOMeta::addMeta('article:section', $profile->category, 'property');       

        OpenGraph::setDescription($postBodyWithoutTags);
        OpenGraph::setTitle($profile->name);
        OpenGraph::addImage($profile->image->url);
    
        TwitterCard::setTitle($profile->name);
        TwitterCard::setSite('@Sobotred');

        JsonLd::setTitle($profile->name);
        JsonLd::setDescription($postBodyWithoutTags);
        JsonLd::addImage($profile->image->url);
        return view('profiles.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        $this->authorize('update', $profile);
        $categories = Category::where('status', 'Perfil')->pluck('name', 'id');
        return view('profile-professional.edit', compact('profile', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {

        $newProfile = $request->validate([
            'city'   => 'nullable|max:255',
            'state'   => 'nullable|max:255',
            'about'   => 'nullable|max:500',
            'name'      => 'required|max:60',
            'slug'   => 'required|max:255',
            'rpa'   => 'nullable|max:255',
            'nit'   => 'nullable|max:255',
            'phone'   => 'required|max:255',
            'email'   => 'required|max:255',
            'latitude'  => 'nullable|required_with:longitude|max:15',
            'longitude' => 'nullable|required_with:latitude|max:15',
            'category_id' => 'nullable|max:255',
           
        ]);
        $profile->update($newProfile);
        if($request->file('file')){
            $url = Storage::put('profiles', $request->file('file'));
            if($profile->image){
                Storage::delete($profile->image->url);
                $profile->image->update([
                    'url' => $url
                ]);
            }else{
                $profile->image()->create([
                    'url' => $url
                ]);
            }
        }
        return redirect()->route('edit.profile', $profile);
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
    public function edutacion_profile(Profile $profile){
        return view('profile-professional.education', compact('profile'));

    }
    public function experience_profile(Profile $profile){
        return view('profile-professional.experience', compact('profile'));

    }
    public function social_profile(Profile $profile){
        return view('profile-professional.social', compact('profile'));

    }
}
