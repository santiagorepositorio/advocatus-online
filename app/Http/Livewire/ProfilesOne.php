<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Profile;
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
        $profiles = Profile::withCount('comments')
        ->withAvg('comments', 'rating') // Calcula el promedio de los ratings de los comentarios
        ->where('status', '3') // Filtrar por estado 3
        ->orderByDesc('comments_count') // Ordenar por la cantidad de comentarios
        ->orderByDesc('comments_avg_rating') // Ordenar por el promedio de rating
        ->take(7) // Tomar los 7 perfiles más destacados
        ->get();
        return view('livewire.profiles-one', compact('courses', 'profiles'));
    }
}
