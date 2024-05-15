<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class SearchPost extends Component
{
    public $search;
    public function render()
    {
        return view('livewire.search-post');
    }
    public function getResultsProperty(){
        return Post::where('title', 'LIKE', '%'.$this->search.'%')
        ->where('published', 1)
        ->take(10)            
        ->get();
    }
}
