<?php

namespace App\Http\Livewire\Admin;

use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class CoursesUsersList extends Component
{
    use WithPagination;


    public $studentLista2, $statusr, $course, $userid, $search = '';

    public function mount(Course $course)
    {
        $this->course = $course;

        // $result = DB::table('course_user', 'cu')
        // ->where('cu.course_id', $course->id)
        // // ->where('cu.user_id', auth()->user()->id)
        // ->get('statusr');
        // $this->statusr = $result->isNotEmpty() ? $result->toArray() : null;

        // $result = DB::table('course_user', 'cu')
        //             ->where('cu.course_id', $course->id)
        //             ->get();

    }



    public function render()
    {
        $studentLista = DB::table('course_user as cu')
            ->join('users as u', 'cu.user_id', '=', 'u.id')
            ->where('cu.course_id', $this->course->id)
            ->where(function ($query) {
                $query->where('u.name', 'LIKE', '%' . $this->search . '%')
                    ->orWhere('u.phone', 'LIKE', '%' . $this->search . '%');
            })
            ->select('cu.statusr', 'u.id', 'u.name', 'u.email', 'u.phone')
            ->paginate(10);
        $course_id = $this->course->id;

        //$this->studentLista = $result->isNotEmpty() ? $result : null;

        //$students = $this->course->students()->where('name', 'LIKE', '%' . $this->search . '%')->paginate(10);
        return view('livewire.admin.courses-users-list', compact('studentLista', 'course_id'));
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function inscribir(User $user)
    {        
        $this->course->students()->updateExistingPivot($user->id, ['statusr' => '2']);  
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
