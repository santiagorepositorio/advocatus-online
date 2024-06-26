<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FolderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\CourseStatus;
use App\Http\Livewire\ShoppingCart;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\OutletMapController;
use App\Http\Controllers\PostController;
use App\Http\Livewire\Profile\QRGeneration;
use App\Http\Livewire\ShoppingCartPayment;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Return_;
use PHPUnit\Framework\MockObject\Stub\ReturnSelf;

use SimpleSoftwareIO\QrCode\Facades\QrCode;


use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;

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
Route::get('/centros_inclusivos', [OutletMapController::class, 'index'])->name('outlet_map.index');
Route::resource('outlets', OutletController::class);

Route::get('courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('posts', [BlogController::class, 'index'])->name('posts.index');
Route::get('folders', [FolderController::class, 'index'])->name('folders.index');
Route::get('folders/{folder}', [FolderController::class, 'show'])->name('folders.show');
Route::get('folder/{item}', [FolderController::class, 'ver'])->name('folder.ver');
Route::get('download/{item}', [FolderController::class, 'download'])->name('folder.download');
Route::get('posts/{post}', [BlogController::class, 'show'])->name('posts.show');
Route::get('profiles', [ProfileController::class, 'index'])->name('profiles.index');
Route::get('/course.show/{course}', [CourseController::class, 'show'])->name('courses.show');
Route::get('/{profile}', [ProfileController::class, 'show'])->name('profiles.show');
Route::get('edit/{profile}', [ProfileController::class, 'edit'])->name('edit.profile')->middleware('auth');
Route::put('update/{profile}', [ProfileController::class, 'update'])->name('update.profile')->middleware('auth');
Route::get('profile/{profile}/educations', [ProfileController::class, 'edutacion_profile'])->name('profile.educations')->middleware('auth');
Route::get('profile/{profile}/experiences', [ProfileController::class, 'experience_profile'])->name('profile.experiences')->middleware('auth');
Route::get('profile/{profile}/socials', [ProfileController::class, 'social_profile'])->name('profile.socials')->middleware('auth');
Route::get('profile/cv', [ProfileController::class, 'cv'])->name('profile.cv')->middleware('auth');
Route::get('profile/{profile}/qr-generation', QRGeneration::class)->name('profile.qr-generation')->middleware('auth');
Route::get('profile/downloadpsd', [ProfileController::class, 'downloadpsd'])->name('profile.downloadpsd');

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

Route::get('/auth/google-redirect', [AuthController::class, 'google_redirect'])->name('auth.google-redirect');
Route::get('/auth/google-callback', [AuthController::class, 'google_callback'])->name('auth.google-callback');

Route::post('/eliminar-datos-facebook/{user_id}', [AuthController::class, 'eliminarDatosFacebook']);

// Route::get('/email-preferencias', function (){
//     return URL::temporarySignedRoute('cambio.preferencias', now()->subMinutes(2), ['user' => 1]);
// });
//                                                  I
// Route::get('/cambio-preferencias', function (Request $request){
//     if(!$request->hasValidSignature()){
//         return abort(401);}
//     $user = User::find($request->query('user'));
//     if (!$user)
//     {return abort (401);}
//    Auth::login($user);
//    return view('profile.edit', [
//     'user' => $request->user(),
   
//    ]);
        
//     })->name('cambio.preferencias');
    