<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Course;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;


class CoursesStudents extends Component
{
    use AuthorizesRequests;
    use WithPagination;

    public $course, $search = '';
    
    public function mount(Course $course){
        $this->course = $course;
        $this->authorize('dicatated', $course);
    }
    public function render()
    {
        $students = $this->course->students()->where('name', 'LIKE', '%' . $this->search . '%')->paginate(2);
        return view('livewire.instructor.courses-students', compact('students'))->layout('layouts.instructor');
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
}
