<?php

namespace App\Http\Livewire\Profile;

use App\Models\Education;
use App\Models\Profile;
use Livewire\Component;

class EducationProfile extends Component
{
    public $profile, $education, $title, $institution, $gestion;
    protected $rules = [
        'education.title' =>'required',
        'education.institution' =>'required',
        'education.gestion' =>'required',
    ];
    public function mount(Profile $profile)
    {
        $this->profile = $profile;
        $this->education = new Education();
    }
    public function render()
    {
        return view('livewire.profile.education-profile');
    }

    public function store()
    {
        $this->validate([
            'title' => 'required',
            'institution' => 'required',
            'gestion' => 'required',
        ]);
        $this->profile->educations()->create([
            'title' => $this->title,
            'institution' => $this->institution,
            'gestion' => $this->gestion,
        ]);
        $this->reset('title', 'institution',
        'gestion');
        $this->profile = Profile::find($this->profile->id);

    }
    public function edit(Education $education)
    {
        $this->education = $education;
    }
    public function update(){
        $this->validate();
        $this->education->save();
        $this->education = new Education();
        $this->profile = Profile::find($this->profile->id);
    }
    public function destroy(Education $education)
    {        
        $education->delete();      
        $this->profile = Profile::find($this->profile->id);
    }
}
