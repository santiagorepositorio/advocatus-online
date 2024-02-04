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
        $response = Http::withToken(env('WHATSAPP_API_TOKEN'))
            ->get('https://graph.facebook.com/v17.0/' . env('WHATSAPP_BUSINESS_ID') . '/message_templates?limit=250')
            ->throw();
        $this->templates = collect($response->json()['data']);
    }



    public function render()
    {
        $users = User::paginate(10);
        return view('livewire.admin.whatsapp-send', compact('users'))->layout('layouts.whatsapp-app');
    }
}
