<?php

namespace App\Http\Livewire\Profile;

use App\Models\Profile;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\StatefulGuard;
use Laravel\Jetstream\Contracts\DeletesUsers;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

class ProfessionalProfile extends Component
{
    public $confirmingUserDeletion = false;
    public $confirmingUserProfessional = false;
    public $password = '';

    public function confirmUserProfessional()
    {
        $this->resetErrorBag();

        $this->password = '';

        $this->dispatchBrowserEvent('confirming-create-user');

        $this->confirmingUserProfessional = true;
    }
    public function confirmUserDeletion()
    {
        $this->resetErrorBag();

        $this->password = '';

        $this->dispatchBrowserEvent('confirming-delete-user');

        $this->confirmingUserDeletion = true;
    }

    public function createProfessional()
    {
        $this->resetErrorBag();
        if (!Hash::check($this->password, Auth::user()->password)) {
            throw ValidationException::withMessages([
                'password' => [__('This password does not match our records.')],
            ]);
        }

        if (Auth::user()->profile()->exists()) {
            $profile = Auth::user()->profile;
            return redirect()->route('edit.profile', $profile);
        } else {
            $profile = Profile::create([               
                'city' => '',
                'state' => '',
                'about' => '',
                'name' => Auth::user()->name,
                'slug' => Str::slug(Auth::user()->name, '-'),
                'rpa' => '',
                'nit' => '',
                'phone' => Auth::user()->phone,
                'email' => Auth::user()->email,
                'latitude' => '',
                'longitude' => '',
                'user_id' => Auth::user()->id,
                'category_id' => 1,
            ]);
            return redirect()->route('edit.profile', $profile);
        }
    }


    public function deleteUser(Request $request, DeletesUsers $deleter, StatefulGuard $auth)
    {
        $this->resetErrorBag();

        if (!Hash::check($this->password, Auth::user()->password)) {
            throw ValidationException::withMessages([
                'password' => [__('This password does not match our records.')],
            ]);
        }

        // $deleter->delete(Auth::user()->fresh());

        // $auth->logout();

        // if ($request->hasSession()) {
        //     $request->session()->invalidate();
        //     $request->session()->regenerateToken();
        // }

        return redirect(config('fortify.redirects.logout') ?? '/');
    }
    public function render()
    {
        return view('livewire.profile.professional-profile');
    }
}
