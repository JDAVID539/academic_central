<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/frmularioasistencia', [AttendanceController::class, 'create'])->name('frm_asistencia');
Route::post('/asistencia', [AttendanceController::class, 'store'])->name('asistencia.store');
// Rutas de estudiantes 
Route::get('/frmestudent', [StudentController::class, 'create'])->name('frm.create');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');


Route::get('/frmcurso', [CourseController::class, 'create'])->name('courses.create');
Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');

Route::get('/frmuser', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');