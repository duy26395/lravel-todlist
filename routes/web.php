<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassroomControler;
use App\Http\Controllers\StudentControler;
use App\Http\Controllers\TeacherControler;



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

Route::get('/', function () {
    return view('welcome');
});
/*--------------------------------------------------
[ classroom ] */

/* ---- list --- */
Route::get('/class', [ClassroomControler::class, 'index'])->name('class.list');

/* ---- add --- */
Route::get('/classshowform', [ClassroomControler::class, 'show_add_form'])->name('classshow.add');
Route::post('/classsadd', [ClassroomControler::class, 'store'])->name('classsadd');

/* ---- delete --- */
Route::delete('/classsdel/{id}', [ClassroomControler::class, 'delete'])->name('classsdel');

/* ---- update --- */
Route::get('/classshow/{id}', [ClassroomControler::class, 'show'])->name('classroom.show');
Route::put('/classsedit/{id}', [ClassroomControler::class, 'edit'])->name('classroom.edit');

/*--------------------------------------------------
[ student ] */

/* ---- list --- */
Route::get('/student', [StudentControler::class, 'index'])->name('student.list');

/* ---- add --- */
Route::get('/studentaddform', [StudentControler::class, 'show_add_form'])->name('studentaddform');
Route::post('/studentadd', [StudentControler::class, 'store'])->name('studentadd');

/* ---- delete --- */
Route::delete('/studentdel/{id}', [StudentControler::class, 'delete'])->name('classsdel');

/* ---- update --- */
Route::get('/studentshow/{id}', [StudentControler::class, 'show'])->name('student.show');
Route::put('/studentedit/{id}', [StudentControler::class, 'edit'])->name('student.edit');

/*--------------------------------------------------
[ teacher ] */

/* ---- list --- */
Route::get('/teacher', [TeacherControler::class, 'index'])->name('teacher.list');

/* ---- add --- */
Route::get('/teacherformadd', [TeacherControler::class, 'show_add_form'])->name('teacheradd.formadd');
Route::post('/teacheradd', [TeacherControler::class, 'store'])->name('teacheradd');

/* ---- delete --- */
Route::delete('/teacherdel/{id}', [TeacherControler::class, 'delete'])->name('teacherdel');

/* ---- show all --- */
Route::get('/teacherall', [TeacherControler::class, 'show_all'])->name('teacherall');

/* ---- update --- */
Route::get('/teachershow/{id}', [TeacherControler::class, 'show'])->name('teacher.show');
Route::put('/teacheredit/{id}', [TeacherControler::class, 'edit'])->name('teacher.edit');