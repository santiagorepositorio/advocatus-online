<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WhatsappController;
use App\Http\Controllers\MessageController;
use App\Http\Livewire\Admin\CoursesUsersList;
use App\Http\Livewire\Admin\WhatsappIndex;
use App\Http\Livewire\Admin\WhatsappSend;
use FontLib\Table\Type\name;
use Illuminate\Support\Facades\Route;

//Route::get('', [HomeController::class, 'index'])->middleware('can:ver dashboard')->name('home');
Route::get('', [HomeController::class, 'index'])->name('home');

Route::resource('roles', RoleController::class)->names('roles');
Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('users');
Route::get('customers', [UserController::class, 'customers_status'])->name('customers.index');

Route::get('customers/{customer}', [UserController::class, 'customers_edit'])->name('customer.customers_edit');
Route::post('customers/{user}/status', [UserController::class, 'customers_update'])->name('customer.customers_update');

Route::get('usersfull', [UserController::class, 'usersfull'])->name('users.usersfull');
Route::get('usersfull/{user}', [UserController::class, 'agregar_empleado'])->name('users.agregar_empleado');
Route::get('usersfull-eliminar/{user}', [UserController::class, 'eliminar_empleado'])->name('users.eliminar_empleado');

Route::resource('certificates', CertificateController::class)->names('certificates');


Route::resource('categories', CategoryController::class)->names('categories');


Route::get('courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('courses/{course}', [CourseController::class, 'show'])->name('courses.show');
Route::post('courses/{course}/approved', [CourseController::class, 'approved'])->name('courses.approved');
Route::get('courses/{course}/observation', [CourseController::class, 'observation'])->name('courses.observation');
Route::post('courses/{course}/reject', [CourseController::class, 'reject'])->name('courses.reject');

Route::get('courses-users', [CourseController::class, 'courses_users'])->name('courses.courses-users');
Route::get('courses-users/{course}', [CourseController::class, 'courses_users_register'])->name('courses.courses-users-register');

Route::post('courses/store', [CourseController::class, 'store'])->name('course.certificate.store');


Route::get('messages', [WhatsappController::class, 'index'])->name('messages.index');

Route::get('/whatsapp', WhatsappIndex::class)
    ->middleware('auth')
    ->name('whatsapp.index');

Route::get('/whatsapp-send', WhatsappSend::class)
    ->middleware('auth')
    ->name('whatsapp.send');

Route::get('/contact/{course}', [CourseController::class, 'generateList'])->name('contact.index');
Route::get('/customers-list/{status}', [UserController::class, 'generateListCustomers'])->name('customers.status');





