<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']) ->name('home');
Route::get('/student/add', [StudentController::class, 'index']) ->name('student.add');
Route::post('/student/create', [StudentController::class, 'create']) ->name('student.create');

Route::get('/student/manage', [StudentController::class, 'manage']) -> name('student.manage');

Route::get('/student/edit/{id}', [StudentController::class, 'edit']) ->name('student.edit');

Route::post('/student/update/{id}', [StudentController::class, 'update']) ->name('student.update');

Route::get('/student/delete/{id}', [StudentController::class, 'delete']) ->name('student.delete');

Route::get('/subject/add', [SubjectController::class, 'index']) ->name('subject.add');

Route::post('/subject/create', [SubjectController::class, 'create']) ->name('subject.create');

Route::get('/subject/manage', [SubjectController::class, 'manage']) ->name('subject.manage');

Route::get('/subject/edit/{id}', [SubjectController::class, 'edit']) ->name('subject.edit');

Route::post('/subject/update/{id}', [SubjectController::class, 'update']) ->name('subject.update');

Route::get('/subject/delete/{id}', [SubjectController::class, 'delete']) ->name('subject.delete');

Route::get('/subject-wise/{id}', [HomeController::class, 'subject']) ->name('subject-wise');
