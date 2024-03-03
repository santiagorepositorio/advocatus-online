<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Course;
use App\Models\Level;
use Livewire\Component;
use Livewire\WithPagination;
class CoursesIndex extends Component
{
    public $category_id;
    public $level_id;
    public $selectedLevelName;
    use WithPagination;

    public function render()
    {
        
        $courses = Course::where('status', 3)
                                ->category($this->category_id)
                                ->level($this->level_id)
                                ->latest('id')
                                ->paginate(8);
        $categories = Category::where('status', 'Curso')->get();
        $levels = Level::all();
        return view('livewire.courses-index', compact('courses', 'categories', 'levels'));
    }
    public function resetFilters(){
        $this->reset(['category_id', 'level_id']);
    }
    
}
