<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class BlogsOne extends Component
{
    public function render()
    {
        $posts = Post::latest('id')->get()->take(5);   
        
        return view('livewire.blogs-one', compact('posts'));
    }
}
