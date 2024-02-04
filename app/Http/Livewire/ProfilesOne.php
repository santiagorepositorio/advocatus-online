<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;

class ProfilesOne extends Component
{
    // public $courses = [];

    // public function loadPosts(){
    //     $this->courses = Course::where('status', '3')->latest('id')->get()->take(6);

    //     $this->emit('glider');
    // }
    public function render()
    {
        $courses = Course::where('status', '3')->latest('id')->get()->take(20);   
        return view('livewire.profiles-one', compact('courses'));
    }
}
