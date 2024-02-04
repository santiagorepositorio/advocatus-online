<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Course;
use App\Models\Level;
use Livewire\Component;
use Livewire\WithPagination;
class CoursesUsers extends Component
{
    use WithPagination;    
    public $search;
    protected $paginationTheme = "bootstrap";
    public function render()
    {
        $courses = Course::where('title', 'LIKE', '%'. $this->search .'%')
        ->latest('id')
        ->Where('status', 3)->paginate(8);
        return view('livewire.admin.courses-users', compact('courses'));
    }

}
