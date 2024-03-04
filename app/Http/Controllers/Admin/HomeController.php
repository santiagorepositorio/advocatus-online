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
    //PROTECCION PARA TODOS LOS METODOS
    // public function __construct()
    // {
    //     $this->middleware('can:admin.home')->only('index');
    // }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userCounts = [];
        $userCountsPre = [];
        $userCountsCulminado = [];

        $year = Carbon::now()->year;


        $topSubscribedCourses = Course::withCount('students')
            ->where('status', 3) // 'students' es el nombre de la relación que conecta los cursos con los estudiantes a través de la tabla pivot course_user
            ->orderByDesc('students_count') // Ordena los cursos por el recuento de estudiantes en orden descendente
            ->limit(4) // Limita los resultados a los 10 cursos más suscritos
            ->get();
        $bottomSubscribedCourses = Course::withCount('students')
            ->where('status', 3) // 'students' es el nombre de la relación que conecta los cursos con los estudiantes a través de la tabla pivot course_user
            ->orderBy('students_count') // Ordena los cursos por el recuento de estudiantes en orden descendente
            ->limit(4) // Limita los resultados a los 10 cursos más suscritos
            ->get();

        for ($month = 1; $month <= 12; $month++) {
            // Consulta la cantidad de usuarios inscritos para el mes actual en todos los cursos
            $count = Course::whereHas('users', function ($query) use ($month, $year) {
                $query->whereMonth('course_user.created_at', $month)
                    ->whereYear('course_user.created_at', $year)
                    ->where('course_user.statusr', 3); // Cambio aquí
            })->count();

            // Almacena la cantidad en el arreglo
            $userCountsCulminado[] = $count;
        }

        for ($month = 1; $month <= 12; $month++) {
            // Consulta la cantidad de usuarios inscritos para el mes actual en todos los cursos
            $count = Course::whereHas('users', function ($query) use ($month, $year) {
                $query->whereMonth('course_user.created_at', $month)
                    ->whereYear('course_user.created_at', $year)
                    ->where('course_user.statusr', 2);
            })
                ->count();

            // Almacena la cantidad en el arreglo
            $userCounts[] = $count;
        }

        for ($month = 1; $month <= 12; $month++) {
            // Consulta la cantidad de usuarios inscritos para el mes actual en todos los cursos
            $count = Course::whereHas('users', function ($query) use ($month, $year) {
                $query->whereMonth('course_user.created_at', $month)
                    ->whereYear('course_user.created_at', $year)
                    ->where('course_user.statusr', 1); // Cambio aquí
            })->count();

            // Almacena la cantidad en el arreglo
            $userCountsPre[] = $count;
        }

        // return $userCounts;
        $cantCourses = Course::where('status', 3)->count();

        $cantidadUsuariosRegistrados = User::count();
        $cantidadUsuariosNuevos = User::where('status', 1)->count();
        $cantidadUsuariosRegulares = User::where('status', 3)->count();
        $cantidadUsuariosInactivos = User::where('status', 3)->count();
        $totalUsuarios = $cantidadUsuariosRegistrados + $cantidadUsuariosNuevos + $cantidadUsuariosRegulares + $cantidadUsuariosInactivos;

        $porcentajeRegistrados = ($cantidadUsuariosRegistrados / $totalUsuarios) * 100;
        $porcentajeNuevos = ($cantidadUsuariosNuevos / $totalUsuarios) * 100;
        $porcentajeInactivos = ($cantidadUsuariosInactivos / $totalUsuarios) * 100;
        $porcentajeRegulares = ($cantidadUsuariosRegulares / $totalUsuarios) * 100;

        $porcentajes = [
            round($porcentajeRegistrados, 2),
            round($porcentajeNuevos, 2),
            round($porcentajeInactivos, 2),
            round($porcentajeRegulares, 2),
        ];

        return view('admin.index', compact('cantCourses', 'cantidadUsuariosRegistrados', 'cantidadUsuariosNuevos', 'cantidadUsuariosInactivos', 'userCountsPre', 'userCounts', 'userCountsCulminado', 'year', 'porcentajes','topSubscribedCourses', 'bottomSubscribedCourses'));
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
