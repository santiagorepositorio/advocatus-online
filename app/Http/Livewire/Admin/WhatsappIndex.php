<?php

namespace App\Http\Livewire\Admin;

use App\Libraries\Whatsapp;
use App\Models\Message;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class WhatsappIndex extends Component
{
    public $search;

    public $contactChat, $chat, $chat_id;

    public $bodyMessage, $bodySend;

    public $users;

    public function getListeners()
    {
        $user_id = auth()->user()->id;
        return [
            "echo-private:webhooks.{$user_id},OrderShipped" => 'render',
        ];
    }



    public function getContactsProperty()
    {
        return Message::whereIn('id', function ($query) {
            $query->select(DB::raw('MAX(id)'))
                ->from('messages')
                ->where('wa_id', 'like', '%' . $this->search . '%')
                ->groupBy('wa_id');
        })
            ->get() ?? [];
    }



    public function open_chat_contact(Message $contact)
    {
        $this->reset('contactChat','bodyMessage', 'search');
        $contactChat = Message::where('wa_id', $contact->wa_id)
        ->orderBy('created_at')
        ->get();
    
    foreach ($contactChat as $message) {
        if ($message->type == 'template') {
            $message->data = unserialize($message->data);
        }
    }
       
        if ($contactChat) {    
                   
            $this->bodyMessage = $contactChat;
            $this->contactChat = $contact;

        }
    }
    public function sendMessage(){


        $this->validate([            

            'bodySend' => ['required', 'string'],
        ]);     
        $wp = new Whatsapp();
        $response = $wp->sendText($this->contactChat->wa_id, $this->bodySend);
        $message = new Message();
        $message->wa_id = $this->contactChat->wa_id;
        $message->wam_id = $response['messages'][0]['id'];
        $message->type = 'text';
        $message->outgoing = true;
        $message->body = $this->bodySend;
        $message->status = 'sent';
        $message->caption = '';
        $message->data = '';
        $message->save();
        $this->reset('bodySend', 'contactChat');
    }
    public function render()
    {
        return view('livewire.admin.whatsapp-index')->layout('layouts.whatsapp-app');
    }
}
