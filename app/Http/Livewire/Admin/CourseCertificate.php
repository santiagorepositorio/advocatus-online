<?php

namespace App\Http\Livewire\Admin;

use App\Models\Certificate;
use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;
use PhpParser\Node\Stmt\Return_;

class CourseCertificate extends Component
{
    use WithPagination;    
    public $search;
    public $course_id;
    protected $paginationTheme = "bootstrap";

 
    public function render()
    {
        $courses = Course::where('title', 'LIKE', '%'. $this->search .'%')
        ->latest('id')
        ->Where('status', 3)->paginate(8);
        return view('livewire.admin.course-certificate', compact('courses'));
    }

    public function asigna($id)
    {
        $course = Certificate::find($id);
        if ($course ?? true) {
            Certificate::create(['course_id' => $id]);

        } else {
            # code...
        }
        
        
    }
}
