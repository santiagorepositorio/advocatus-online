<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        
        return view('admin.index', compact('cantCourses', 'cantidadUsuariosRegistrados', 'cantidadUsuariosNuevos', 'cantidadUsuariosInactivos', 'userCountsPre', 'userCounts', 'year'));
    }
    // public function index1()
    // {
    //     // Obtenemos el año actual
    //     $year = Carbon::now()->year - 1;

    //     // Inicializamos un arreglo para almacenar los datos de cada mes
    //     $userCounts = [];

    //     // Itera sobre los meses del año
    //     for ($month = 1; $month <= 12; $month++) {
    //         // Consulta la cantidad de usuarios inscritos para el mes actual en todos los cursos
    //         $count = User::whereHas('courses', function ($query) use ($month, $year) {
    //             $query->whereMonth('course_user.created_at', $month)
    //                 ->whereYear('course_user.created_at', $year)
    //                 ->where('course_user.statusr', 2); // Cambio aquí
    //         })->count();
            
    //         // Almacena la cantidad en el arreglo
    //         $userCounts[] = $count;
    //     }
    //     // Inicializamos un arreglo para almacenar los datos de cada mes
    //     $userCountsPre = [];

    //     // Itera sobre los meses del año
    //     for ($month = 1; $month <= 12; $month++) {
    //         // Consulta la cantidad de usuarios inscritos para el mes actual en todos los cursos
    //         $count = User::whereHas('courses', function ($query) use ($month, $year) {
    //             $query->whereMonth('course_user.created_at', $month)
    //                 ->whereYear('course_user.created_at', $year)
    //                 ->where('course_user.statusr', 1); // Cambio aquí
    //         })->count();
            
    //         // Almacena la cantidad en el arreglo
    //         $userCountsPre[] = $count;
    //     }
    //     $cantCourses = Course::where('status', 3)->count();
    //     $cantidadUsuariosRegistrados = User::count();
    //     $cantidadUsuariosNuevos = User::where('status', 1)->count();
    //     $cantidadUsuariosInactivos = User::where('status', 3)->count();
    //     //return $userCounts;
    //     return view('admin.index', compact('cantCourses', 'cantidadUsuariosRegistrados', 'cantidadUsuariosNuevos', 'cantidadUsuariosInactivos', 'userCountsPre', 'userCounts', 'year'));
    // }
    // public function index2()
    // {
    //     // Obtenemos el año actual
    //     $year = Carbon::now()->year - 2;

    //     // Inicializamos un arreglo para almacenar los datos de cada mes
    //     $userCounts = [];

    //     // Itera sobre los meses del año
    //     for ($month = 1; $month <= 12; $month++) {
    //         // Consulta la cantidad de usuarios inscritos para el mes actual en todos los cursos
    //         $count = User::whereHas('courses', function ($query) use ($month, $year) {
    //             $query->whereMonth('course_user.created_at', $month)
    //                 ->whereYear('course_user.created_at', $year)
    //                 ->where('course_user.statusr', 2); // Cambio aquí
    //         })->count();
            
    //         // Almacena la cantidad en el arreglo
    //         $userCounts[] = $count;
    //     }
    //     // Inicializamos un arreglo para almacenar los datos de cada mes
    //     $userCountsPre = [];

    //     // Itera sobre los meses del año
    //     for ($month = 1; $month <= 12; $month++) {
    //         // Consulta la cantidad de usuarios inscritos para el mes actual en todos los cursos
    //         $count = User::whereHas('courses', function ($query) use ($month, $year) {
    //             $query->whereMonth('course_user.created_at', $month)
    //                 ->whereYear('course_user.created_at', $year)
    //                 ->where('course_user.statusr', 1); // Cambio aquí
    //         })->count();
            
    //         // Almacena la cantidad en el arreglo
    //         $userCountsPre[] = $count;
    //     }
    //     $cantCourses = Course::where('status', 3)->count();
    //     $cantidadUsuariosRegistrados = User::count();
    //     $cantidadUsuariosNuevos = User::where('status', 1)->count();
    //     $cantidadUsuariosInactivos = User::where('status', 3)->count();
    //     //return $userCounts;
    //     return view('admin.index', compact('cantCourses', 'cantidadUsuariosRegistrados', 'cantidadUsuariosNuevos', 'cantidadUsuariosInactivos', 'userCountsPre', 'userCounts', 'year'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
