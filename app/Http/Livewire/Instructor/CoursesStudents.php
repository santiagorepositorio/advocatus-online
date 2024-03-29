<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Course;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;


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
        $id_course = $this->course;
        $studentLista = db::table('course_user as cu')
            ->join('users as u', 'cu.user_id', '=', 'u.id')
            ->where('cu.course_id', $this->course->id)
            ->where(function ($query) {
                $query->where('u.name', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('u.phone', 'LIKE', '%' . $this->search . '%');
            })
            ->select('cu.statusr', 'u.id', 'u.name', 'u.email', 'u.phone')
            ->paginate(10);
        $students = $this->course->students()->where('name', 'LIKE', '%' . $this->search . '%')->paginate(2);
        return view('livewire.instructor.courses-students', compact('students', 'studentLista', 'id_course'))->layout('layouts.instructor');
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function inscribir(User $user)
    {        
        $this->course->students()->updateExistingPivot($user->id, ['statusr' => '2']);

        $userr = User::find($user->id);
        if ($userr) {
            $userr->status = 3;
            $userr->save();
        } else {
            
        }
        
        
      //$this->userid = $user;        
    }
    public function revertir(User $user)
    {        
        $this->course->students()->updateExistingPivot($user->id, ['statusr' => '1']);  
      //$this->userid = $user;        
    }
    public function certificar(User $user)
    {        
        $this->course->students()->updateExistingPivot($user->id, ['statusr' => '3']);  
      //$this->userid = $user;        
    }
}
