<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Profile;
use App\Models\Publicity;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $publicities = Publicity::where('status', '1')->get();
        $courses = Course::where('status', '3')->latest('id')->get()->take(8);
        $profiles = Profile::where('status', '3')
            ->latest('id')
            ->paginate(8);

        $topSubscribedCourses = Course::withCount('students') // 'students' es el nombre de la relación que conecta los cursos con los estudiantes a través de la tabla pivot course_user
            ->orderByDesc('students_count') // Ordena los cursos por el recuento de estudiantes en orden descendente
            ->limit(8) // Limita los resultados a los 10 cursos más suscritos
            ->get();
        return view('welcome', compact('courses', 'profiles', 'publicities', 'topSubscribedCourses'));
    }
}
