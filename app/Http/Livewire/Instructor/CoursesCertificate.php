<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Certificate;
use App\Models\Course;
use Livewire\Component;
use AuthorizesRequests;

class CoursesCertificate extends Component
{
    protected $listeners = [
        'certificate_updated' => 'render',
    ];
    public $course, $search = '';
    
    public function mount(Course $course)
    {
        $this->course = $course;
        // $this->authorize('dicatated', $course);
    }
    public function render()
    {
        $id_course = $this->course;
        return view('livewire.instructor.courses-certificate', compact('id_course'));
    }
    public function asigna($id)
    {
        $course = Certificate::where('course_id', $id)->first(); // Busca un registro con el ID del curso

    if (!$course) {
        Certificate::create(['course_id' => $id]);
        $this->emit('certificate_updated');
    } else {
        // Si ya existe un registro, puedes manejar esta situación según tus necesidades
    }
        
        
    }
}
