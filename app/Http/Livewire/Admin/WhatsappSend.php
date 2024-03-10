<?php

namespace App\Http\Livewire\Admin;

use App\Libraries\Whatsapp;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class WhatsappSend extends Component
{
    public $templates;
    public $selectedTemplate;
    public $tab = 1;

    // Método para cambiar la pestaña activa
    public function changeTab($tab)
    {
        $this->tab = $tab;
    }

    public function mount()
    {
        // $this->accessToken = auth()->user()->companies->accessToken;
        // $this->phoneId = auth()->user()->companies->phoneId;
        // $this->wabaId = auth()->user()->companies->wabaId;
        // $this->version = auth()->user()->companies->version;
        $response = Http::withToken(auth()->user()->companies->accessToken)
            ->get('https://graph.facebook.com/v17.0/' . auth()->user()->companies->wabaId . '/message_templates?limit=250')
            ->throw();
        $this->templates = collect($response->json()['data']);
    }



    public function render()
    {
        $users = User::paginate(10);
        return view('livewire.admin.whatsapp-send', compact('users'))->layout('layouts.whatsapp-app');
    }
}
