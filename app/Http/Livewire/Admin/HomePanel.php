<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\Course;
use App\Models\User;
use Carbon\Carbon;

class HomePanel extends Component
{
   



    public function render()
    {
        $userCounts = [];
        $userCountsPre = [];

        $year = Carbon::now()->year;

        for ($month = 1; $month <= 12; $month++) {
            // Consulta la cantidad de usuarios inscritos para el mes actual en todos los cursos
            $count = User::whereHas('courses', function ($query) use ($month, $year) {
                $query->whereMonth('course_user.created_at', $month)
                    ->whereYear('course_user.created_at', $year)
                    ->where('course_user.statusr', 2); // Cambio aquí
            })->count();

            // Almacena la cantidad en el arreglo
            $userCounts[] = $count;
        }

        for ($month = 1; $month <= 12; $month++) {
            // Consulta la cantidad de usuarios inscritos para el mes actual en todos los cursos
            $count = User::whereHas('courses', function ($query) use ($month, $year) {
                $query->whereMonth('course_user.created_at', $month)
                    ->whereYear('course_user.created_at', $year)
                    ->where('course_user.statusr', 1); // Cambio aquí
            })->count();

            // Almacena la cantidad en el arreglo
            $userCountsPre[] = $count;
        }


        $cantCourses = Course::where('status', 3)->count();
        $cantidadUsuariosRegistrados = User::count();
        $cantidadUsuariosNuevos = User::where('status', 1)->count();
        $cantidadUsuariosInactivos = User::where('status', 3)->count();
        //return $userCounts;
        return view('livewire.admin.home-panel', compact('cantCourses', 'cantidadUsuariosRegistrados', 'cantidadUsuariosNuevos', 'cantidadUsuariosInactivos', 'userCountsPre', 'userCounts', 'year'));
    }
}
