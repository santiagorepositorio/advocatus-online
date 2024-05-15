<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Request;

class BlogsIndex extends Component
{
    // public $category_id;
    use WithPagination;

    public function render()
    {
        $posts = Post::where('published', 1)
            ->filter(request()->all())
            ->orderBy('id', 'desc')
            ->paginate(5);
        $categories = Category::where('status', 'Blog')->get();
        $popuylares = Post::withCount('comments')
            ->where('published', 1) // 'students' es el nombre de la relación que conecta los cursos con los estudiantes a través de la tabla pivot course_user
            ->orderByDesc('published_at', 'desc') // Ordena los cursos por el recuento de estudiantes en orden descendente
            ->limit(8) // Limita los resultados a los 10 cursos más suscritos
            ->get();

        return view('livewire.blogs-index', compact('posts', 'categories', 'popuylares'));
    }
 
}
