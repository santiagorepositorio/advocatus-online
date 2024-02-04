<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


class UserController extends Controller
{
   
    public function index()
    {
        return view('admin.users.index');
    }

    
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'roles'));
    }

   
    public function update(Request $request, User $user)
    {
        // $request->validate([
        //     'name' => 'required',
        //     'permissions' => 'required'
        // ]);
        $user->roles()->sync($request->roles);
        return redirect()->route('admin.users.edit', $user);
    }

    public function customers_status()
    {
        return view('admin.customers.index');
    }
    public function usersfull()
    {
        return view('admin.users.usersfull');
    }

    public function agregar_empleado(User $user)
    {
        $user->status =User::EMPLEADO;
        $user->save();
        
        return redirect()->route('admin.users.index',  $user)->with('info', 'Se agrego Satisfactoriamente');

    }

   
    public function customers_edit(User $user)
    {        
        $courses = auth()->user()->courses_enrolled()->orderBy('course_user.created_at', 'desc')->paginate(12);
        //return  $courses;
         return view('admin.users.customers_edit', compact('user', 'courses'));
    } 
public function customers_update(Course $course)
    {        
        return $course;
        // return view('admin.users.customers_edit', compact('user'));
    }

   
   
}
