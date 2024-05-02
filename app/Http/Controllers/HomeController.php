<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Profile;
use App\Models\Publicity;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOTools;

class HomeController extends Controller
{
    public function __invoke()
    {
        SEOMeta::setTitle('Plataforma Jurídica');
        SEOMeta::setDescription('Para Abogados & Informáticos');
        SEOMeta::setCanonical('https://advocatus-online.com/courses');

        OpenGraph::setDescription('Para Abogados & Informáticos');
        OpenGraph::setTitle('Plataforma Jurídica');
        OpenGraph::setUrl('https://advocatus-online.com/courses');
        OpenGraph::addProperty('type', 'articles');

        TwitterCard::setTitle('Plataforma Jurídica');
        TwitterCard::setSite('@Sobotred');

        JsonLd::setTitle('Plataforma Jurídica');
        JsonLd::setDescription('Para Abogados & Informáticos');
        JsonLd::addImage('https://advocatus-online.com/assets/imgs/theme/icono.png');

        $publicities = Publicity::where('status', '1')->get();
        $courses = Course::where('status', '3')->latest('id')->get()->take(8);
        $profiles = Profile::where('status', '3')
            ->latest('id')
            ->paginate(8);

        $topSubscribedCourses = Course::withCount('students')
            ->where('status', 3) // 'students' es el nombre de la relación que conecta los cursos con los estudiantes a través de la tabla pivot course_user
            ->orderByDesc('students_count') // Ordena los cursos por el recuento de estudiantes en orden descendente
            ->limit(8) // Limita los resultados a los 10 cursos más suscritos
            ->get();
        return view('welcome', compact('courses', 'profiles', 'publicities', 'topSubscribedCourses'));
    }
}
