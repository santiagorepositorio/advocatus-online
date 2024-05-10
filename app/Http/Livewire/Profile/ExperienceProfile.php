<?php

namespace App\Http\Livewire\Profile;

use App\Models\Experience;
use App\Models\Profile;
use Livewire\Component;
use Symfony\Component\CssSelector\Exception\ExpressionErrorException;

class ExperienceProfile extends Component
{
    public $profile, $experience, $title, $institution, $gestion;
    protected $rules = [
        'experience.title' =>'required',
        'experience.institution' =>'required',
        'experience.gestion' =>'required',
    ];
    public function mount(Profile $profile)
    {
        $this->profile = $profile;
        $this->experience = new Experience();
    }
    public function render()
    {
        return view('livewire.profile.experience-profile');
    }

    public function store()
    {
        $this->validate([
            'title' => 'required',
            'institution' => 'required',
            'gestion' => 'required',
        ]);
        $this->profile->experiences()->create([
            'title' => $this->title,
            'institution' => $this->institution,
            'gestion' => $this->gestion,
        ]);
        $this->reset('title', 'institution',
        'gestion');
        $this->profile = Profile::find($this->profile->id);

    }
    public function edit(Experience $experience)
    {
        $this->experience = $experience;
    }
    public function update(){
        $this->validate();
        $this->experience->save();
        $this->experience = new Experience();
        $this->profile = Profile::find($this->profile->id);
    }
    public function destroy(Experience $experience)
    {        
        $experience->delete();      
        $this->profile = Profile::find($this->profile->id);
    }
}
