<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\CourseStatus;
use App\Http\Livewire\ShoppingCart;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\PostController;
use App\Http\Livewire\ShoppingCartPayment;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Return_;
use PHPUnit\Framework\MockObject\Stub\ReturnSelf;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/prueba', function () {
//     $status = DB::table('course_user', 'cu')
//                             ->where('cu.course_id', 2)
//                             ->where('cu.user_id', auth()->user()->id)
//                             ->get('status');

//     return $status;
// });

Route::get('/', HomeController::class)->name('home');
Route::get('/privacy-policy', [CourseController::class, 'privacy_policy'])->name('privacy-policy');
Route::get('courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('posts', [BlogController::class, 'index'])->name('posts.index');
Route::get('posts/{post}', [BlogController::class, 'show'])->name('posts.show');
Route::get('profiles', [ProfileController::class, 'index'])->name('profiles.index');
Route::get('/course.show/{course}', [CourseController::class, 'show'])->name('courses.show');
Route::get('/{profile}', [ProfileController::class, 'show'])->name('profiles.show');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::post('courses/{course}/enrolled', [CourseController::class, 'enrolled'])->middleware('auth')->name('courses.enrolled');
Route::get('course-status/{course}', CourseStatus::class)->name('courses.status')->middleware('auth');
Route::get('courses/my-courses', [CourseController::class, 'myCourses'])
    ->middleware('auth')
    ->name('courses.my-courses');
Route::get('shopping-cart', ShoppingCart::class)->name('shopping-cart');
Route::get('shopping-cart/checkout', ShoppingCartPayment::class)
    ->middleware('auth', 'items_in_the_shopping_cart')
    ->name('shopping-cart.checkout');

Route::get('/certificate/{course}', [CourseController::class, 'generateCertificate'])->name('certificate');
Route::get('/certificate/{course}/{user}', [CourseController::class, 'certificateLink'])->name('certificate.link');


Route::get('/posts/{post}/image', [PostController::class, 'image'])
    ->name('posts.image');

Route::post('images/upload', [ImageController::class, 'upload'])
    ->name('images.upload');



Route::get('/auth/redirect', [AuthController::class, 'redirect'])->name('auth.redirect');


Route::get('/auth/callback', [AuthController::class, 'callback'])->name('auth.callback');

Route::post('/eliminar-datos', function (Request $request) {
    $client = new Client();
    $response = $client->post('https://advocatus-online.com/eliminar-datos', [
        'json' => ['user_id' => $request->input('user_id')]
    ]);

    $data = json_decode($response->getBody(), true);

    return response()->json([
        'url' => $data['url'],
        'confirmation_code' => $data['confirmation_code']
    ]);
});