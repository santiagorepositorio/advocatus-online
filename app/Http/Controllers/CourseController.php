<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Dompdf\Options;


use BaconQrCode\Renderer\Image\Png;
use BaconQrCode\Writer;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use SimpleSoftwareIO\QrCode\Facades\QrCode as FacadesQrCode;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CourseController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('courses.index');
    }

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
    public function show(Course $course)
    {   // funcion que evita ver cursos no publicados
        $this->authorize('published', $course);

        $similares = Course::where('category_id', $course->category_id)
            ->where('id', '!=', $course->id)
            ->where('status', 3)
            ->latest('id')
            ->take(5)
            ->get();




        return view('courses.show', compact('course', 'similares'));
    }

    public function enrolled(Course $course)
    {

        if ($course->price->value == 0) {
            $course->students()->attach(auth()->user()->id, ['created_at' => now()]);
            $course->students()->updateExistingPivot(auth()->user()->id, ['statusr' => '3']);
        } else {
            $course->students()->attach(auth()->user()->id, ['created_at' => now()]);
        }
        // $course->students()->attach(auth()->user()->id);

        return redirect()->route('courses.status', $course);
    }



    public function myCourses()
    {
        $courses = auth()->user()->courses_enrolled()->orderBy('course_user.created_at', 'desc')->paginate(12);

        return view('courses.my-courses', compact('courses'));
    }

    public function generateCertificate(Course $course)
    {
        $user = auth()->user();

        if ($course->certificate->image->url ?? false) {
            $imagePath = public_path('storage/' . $course->certificate->image->url);
            $imageData = file_exists($imagePath) ? base64_encode(file_get_contents($imagePath)) : '';
        } else {
            $imagePath = public_path('img/home/certificado-defecto.png');
            $imageData = file_exists($imagePath) ? base64_encode(file_get_contents($imagePath)) : '';
        }

        $qrcode = QrCode::generate(env('APP_URL') . 'certificate/' . $course->slug . '/' . $user->id);

        $html = View::make('certificate3')->with([
            'qrcode' => $qrcode,
            'user' => $user,
            'courses' => $course,
            'imageData' => $imageData,
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
        $dompdf->stream('certificado-' . $user->name . '.pdf');
    }

    public function certificateLink(Course $course, User $user)
    {
        return view('courseslink', compact('course', 'user'));
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

    public function privacy_policy()
    {
        return view('privacy_policy');
    }
}
