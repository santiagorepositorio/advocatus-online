<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class BlogsIndex extends Component
{
    public $category_id;
    use WithPagination;

    public function render()
    {
        $posts = Post::where('published', 1)   
        ->orderBy('published_at', 'desc') 
        ->paginate(10);
        $categories = Category::where('status', 'Blog')->get();
        return view('livewire.blogs-index', compact('posts', 'categories'));
    }
    public function resetFilters(){
        $this->reset(['category_id']);
    }
}
