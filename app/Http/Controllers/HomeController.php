<?php

namespace App\Http\Controllers;

use App\Models\Counter;
use App\Models\Course;
use App\Models\Post;
use App\Models\Profile;
use App\Models\Publicity;
use App\Models\User;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;
use Artesaos\SEOTools\Facades\SEOTools;
use PHPUnit\Framework\Constraint\Count;

class HomeController extends Controller
{
    public function __invoke()
    {
        SEOMeta::setTitle('Marketplace Juríco');
        SEOMeta::setDescription('Abogados en Linea, es una iniciativa de Sobotred Systems para dar un paso más a LegalTech');
        SEOMeta::setCanonical('https://advocatus-online.com/');

        OpenGraph::setDescription('Abogados en Linea, es una iniciativa de Sobotred Systems para dar un paso más a LegalTech');
        OpenGraph::setTitle('Marketplace Juríco');
        OpenGraph::setUrl('https://advocatus-online.com/');
        OpenGraph::addProperty('type', 'articles');

        TwitterCard::setTitle('Marketplace Juríco');
        TwitterCard::setSite('@Sobotred');

        JsonLd::setTitle('Marketplace Juríco');
        JsonLd::setDescription('Abogados en Linea, es una iniciativa de Sobotred Systems para dar un paso más a LegalTech');
        JsonLd::addImage('https://advocatus-online.com/assets/imgs/logo/advocatus-icono.png');

        $visitasHome = Counter::get();
        $usuariosHome = User::get();
        $cursosHome = Course::get();
        $articulosHome = Post::get();
        $publicities = Publicity::where('status', '2')->get();

        $courses = Course::where('status', '3')->latest('id')->get()->take(8);
        $profiles = Profile::where('status', '3')
            ->latest('id')
            ->paginate(8);

        $topSubscribedCourses = Course::withCount('students')
            ->where('status', 3) // 'students' es el nombre de la relación que conecta los cursos con los estudiantes a través de la tabla pivot course_user
            ->orderByDesc('students_count') // Ordena los cursos por el recuento de estudiantes en orden descendente
            ->limit(8) // Limita los resultados a los 10 cursos más suscritos
            ->get();
        return view('welcome', compact('courses', 'profiles', 'publicities', 'topSubscribedCourses', 'usuariosHome', 'cursosHome', 'articulosHome', 'visitasHome'));
    }

}
