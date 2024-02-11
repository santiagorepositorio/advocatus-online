<?php

namespace App\Http\Livewire\Admin;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;
class CourseCertificate extends Component
{
    use WithPagination;    
    public $search;
    protected $paginationTheme = "bootstrap";
    public function render()
    {
        $courses = Course::where('title', 'LIKE', '%'. $this->search .'%')
        ->latest('id')
        ->Where('status', 3)->paginate(8);
        return view('livewire.admin.course-certificate', compact('courses'));
    }
}
