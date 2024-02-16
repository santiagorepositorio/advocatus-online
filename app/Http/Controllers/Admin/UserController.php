<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\View;
use Dompdf\Dompdf;


class UserController extends Controller
{

    public function index()
    {
        return view('admin.users.index');
    }


    public function edit(User $user)
    {
        if ($user->id != 1) {
            $roles = Role::all();
            return view('admin.users.edit', compact('user', 'roles'));
        } else {
            return redirect()->route('admin.users.index',  $user)->with('danger', 'No puedes EDITAR: Super Administrador');
        }
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
        $user->status = User::EMPLEADO;
        $user->save();

        return redirect()->route('admin.users.index',  $user)->with('info', 'Se AGREGO Satisfactoriamente');
    }
    public function eliminar_empleado(User $user)
    {
        if ($user->id != 1) {
            $user->status = User::EX_EMPLEADO;
            $user->save();
            $user->roles()->sync([]);
            return redirect()->route('admin.users.index',  $user)->with('danger', 'Se ELIMINO Satisfactoriamente');
        } else {
            return redirect()->route('admin.users.index',  $user)->with('danger', 'No puedes ELIMINAR: Super Administrador');
        }
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
    public function generateListCustomers($status)
    {
        $usersQuery = User::query();

        if ($status !== null && $status !== 0) {
            $usersQuery->where('status', $status);
        }

        $users = $usersQuery->when($status === null || $status === 0, function ($query) {
            return $query->skip(1); // Omitir el primer usuario
        })->get();
        $html = View::make('customers-index-pdf')->with([
            'users' => $users,
        ])->render();
        // Instancia Dompdf
        $dompdf = new Dompdf();

        // Carga el HTML generado con el código QR en Dompdf
        $dompdf->loadHtml($html);

        // Opcional: Establece el tamaño del papel, la orientación, etc.
        $dompdf->setPaper('letter', 'landscape');

        // Renderiza el PDF
        $dompdf->render();

        // Opcional: Guarda el PDF en el servidor
        $dompdf->stream('Lista.pdf');
    }
}
