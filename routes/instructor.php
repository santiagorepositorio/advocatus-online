<?php

use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Instructor\CertificateController as InstructorCertificateController;
use App\Http\Controllers\Instructor\CourseController;
use App\Http\Controllers\PublicitiesController;
use App\Http\Livewire\Instructor\CoursesCertificate;
use App\Http\Livewire\Instructor\CoursesCurriculum;
use App\Http\Livewire\Instructor\CoursesStudents;
use App\Http\Livewire\Instructor\FoldersUploadFiles;
use Illuminate\Support\Facades\Route;

Route::redirect('','instructor/courses');

Route::resource('courses', CourseController::class)->names('courses');
Route::resource('publicities', PublicitiesController::class)->names('publicities');

Route::get('courses/{course}/curriculum', CoursesCurriculum::class)->middleware('can:Editar cursos')->name('courses.curriculum');
Route::get('folders/{user}/files', FoldersUploadFiles::class)->name('folders.upload');
Route::get('courses/{course}/goals', [CourseController::class, 'goals'])->name('courses.goals');
Route::get('courses/{course}/students', CoursesStudents::class)->middleware('can:Editar cursos')->name('courses.students');
Route::post('courses/{course}/status', [CourseController::class, 'status'])->name('courses.status');
Route::get('courses/{course}/observation', [CourseController::class, 'observation'])->name('courses.observation');
Route::get('courser/{course}/certificate', CoursesCertificate::class)->name('courses.certificate');

Route::put('certificates/{certificate}/update', [InstructorCertificateController::class, 'update'])->name('certificates.update');


