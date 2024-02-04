<?php

namespace App\Http\Livewire\Admin;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;

class CoursesIndex extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = "bootstrap";
    public function render()
    {
        $courses = Course::where('title', 'LIKE', '%'. $this->search .'%')
        ->Where('status', 2)->paginate(8);

        return view('livewire.admin.courses-index', compact('courses'));
    }
}
