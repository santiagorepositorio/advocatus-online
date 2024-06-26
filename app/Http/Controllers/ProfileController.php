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
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use BaconQrCode\Renderer\GDLibRenderer;
use BaconQrCode\Writer;
use Im;

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
        OpenGraph::addImage(Storage::url($profile->image->url));

        TwitterCard::setTitle($profile->name);
        TwitterCard::setSite('@Sobotred');

        JsonLd::setTitle($profile->name);
        JsonLd::setDescription($postBodyWithoutTags);
        JsonLd::addImage(Storage::url($profile->image->url));
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

        // $qrcode = QrCode::generate(env('APP_URL') . '/' . $profile->slug);

        $imagePath = public_path('qr_codes/' . $profile->slug . '.png');

        // Verificar si el archivo existe
        if (!file_exists($imagePath)) {
            // Crear el directorio si no existe
            if (!file_exists(public_path('qr_codes'))) {
                mkdir(public_path('qr_codes'), 0755, true);
            }

            // Aquí debes incluir el código necesario para crear el archivo PNG si no existe.
            // Por ejemplo, podrías estar descargando una imagen o generándola de alguna forma.
            // A continuación se muestra un ejemplo de cómo podrías crear un archivo vacío para propósitos de demostración
            // Reemplaza esta parte con la lógica correcta para generar o copiar la imagen que necesitas
            file_put_contents($imagePath, '');
        }

        // Verificar de nuevo si el archivo existe después del intento de creación
        if (!file_exists($imagePath)) {
            die("El archivo no se pudo crear: " . $imagePath);
        }

        // Generar el código QR con la imagen de merge
        // $png = QrCode::format('png')
        //     ->merge($imagePath, .17, true)
        //     ->size(300)
        //     ->errorCorrection('H')
        //     ->generate(env('APP_URL') . '/' . $profile->slug);

        // // Codificar el QR en base64
        // $qrcode = base64_encode($png);
        // QrCode::format('png')->generate(env('APP_URL') . '/' . $profile->slug, Storage::path($imagePath));
        // $qrcode = QrCode::size(200)->format('png')->generate(env('APP_URL') . '/' . $profile->slug);

        // Storage::put($imagePath, QrCode::format('png')->size(100)->generate(env('APP_URL') . '/' . $profile->slug));


        // Obtener la URL pública de la imagen del QR
        $imageUrl = Storage::url($imagePath);
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
        if ($request->file('file')) {
            $url = Storage::put('profiles', $request->file('file'));
            if ($profile->image) {
                Storage::delete($profile->image->url);
                $profile->image->update([
                    'url' => $url
                ]);
            } else {
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
    public function edutacion_profile(Profile $profile)
    {
        return view('profile-professional.education', compact('profile'));
    }
    public function experience_profile(Profile $profile)
    {
        return view('profile-professional.experience', compact('profile'));
    }
    public function social_profile(Profile $profile)
    {
        return view('profile-professional.social', compact('profile'));
    }

    public function cv()
    {
        return view('profiles.cv');
    }
    public function downloadpsd()
    {
   
            
            return response()->download(storage_path("app/public/modelo_banner.psd"));
          
       
        // dd(Storage::disk($this->disk)->exists('modelo_banner.psd'));
        // return response('',404);

    }
}
