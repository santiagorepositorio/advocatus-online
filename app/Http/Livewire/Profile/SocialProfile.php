<?php

namespace App\Http\Livewire\Profile;

use App\Models\Profile;
use App\Models\Social;
use Livewire\Component;

class SocialProfile extends Component
{
    public $profile, $social, $icon, $link;
    protected $rules = [
        'social.icon' =>'required',
        'social.link' =>'required',

    ];
    public function mount(Profile $profile)
    {
        $this->profile = $profile;
        $this->social = new Social();
    }

    public function render()
    {
        return view('livewire.profile.social-profile');
    }
    public function store()
    {
        $this->validate([
            'icon' => 'required',
            'link' => 'required',
       
        ]);
        $this->profile->socials()->create([
            'icon' => $this->icon,
            'link' => $this->link,
        ]);
        $this->reset('icon', 'link');
        $this->profile = Profile::find($this->profile->id);

    }
    public function edit(Social $social)
    {
        $this->social = $social;
    }
    public function update(){
        $this->validate();
        $this->social->save();
        $this->social = new Social();
        $this->profile = Profile::find($this->profile->id);
    }
    public function destroy(Social $social)
    {        
        $social->delete();      
        $this->profile = Profile::find($this->profile->id);
    }
}
