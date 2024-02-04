<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\CourseStatus;
use App\Http\Livewire\ShoppingCart;
use App\Http\Livewire\ShoppingCartPayment;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Return_;
use PHPUnit\Framework\MockObject\Stub\ReturnSelf;



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
Route::get('blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('blogs/{blog}', [BlogController::class, 'show'])->name('blogs.show');
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


