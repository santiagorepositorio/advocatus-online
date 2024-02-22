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
}
