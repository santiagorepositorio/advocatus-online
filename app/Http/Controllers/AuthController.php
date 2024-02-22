<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    //
    public function redirect(){
        return Socialite::driver('facebook')->redirect();
    }

    public function callback(){
        try {
            $user = Socialite::driver('facebook')->user();
            $findUser = User::where('fb_id', $user->id)->first();
            if ($findUser) {
                Auth::login($findUser);
                return redirect()->route('home');

            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'fb_id' => $user->id,
                    'password' => encrypt('1985srid')
                ]);
                Auth::login($newUser);
                return redirect()->route('home');
            }
            
        } catch (Exception $e) {
            dd($e->getMessage());
        }
        
    }
    
    public function google_redirect(){
        return Socialite::driver('google')->redirect();
    }

    public function google_callback(){
        try {
            $user = Socialite::driver('google')->user();
            dd($user);
            // $findUser = User::where('g_id', $user->id)->first();
            // if ($findUser) {
            //     Auth::login($findUser);
            //     return redirect()->route('home');

            // } else {
            //     $newUser = User::create([
            //         'name' => $user->name,
            //         'email' => $user->email,
            //         'g_id' => $user->id,
            //         'password' => encrypt('1985srid')
            //     ]);
            //     Auth::login($newUser);
            //     return redirect()->route('home');
            // }
            
        } catch (Exception $e) {
            dd($e->getMessage());
        }
        
    }

    public function eliminarDatosFacebook(Request $request)
    {
        // Validar la solicitud y obtener el ID del usuario
        $request->validate([
            'user_id' => 'required|integer' // Ajusta las reglas de validación según tus necesidades
        ]);

        $userId = $request->input('user_id');

        // Buscar al usuario por su ID y actualizar el campo fb_id a null
        $user = User::find($userId);
        
        if ($user) {
            $user->fb_id = null;
            $user->save();

            return response()->json(['message' => 'El fb_id del usuario ha sido eliminado correctamente.']);
        } else {
            return response()->json(['error' => 'Usuario no encontrado.'], 404);
        }
    }
}
