<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrmController;
use App\Http\Controllers\SchoolController;

Route::get('/', function () {
    return view('home');})->name('home');

route::get('/login', function () {
    return view('login');})->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::get('/frmularioasistencia', [AttendanceController::class, 'create'])->name('frm_asistencia');
Route::post('/asistencia', [AttendanceController::class, 'store'])->name('asistencia.store');
// Rutas de estudiantes 
Route::get('/frmestudent', [StudentController::class, 'create'])->name('frm.create');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');


Route::get('/frmcurso', [CourseController::class, 'create'])->name('courses.create');
Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');

Route::get('/frmuser', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');

Route::get('/consultas', [OrmController::class, 'consultas']);

Route::get('/frmcontacto', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

//vistas de roles
Route::get('/admin', function () {
    return view('vista_admin');})->name('admin');

Route::get('/user', function () {
    return view('vista_profesores');})->name('teacher.dashboard');

Route::get('/estudiante', function () {
    return view('vista_usuario');})->name('student.dashboard');

   



    
    Route::get('/frm_colegio', [SchoolController::class, 'create'])->name('colegiio.create');
Route::post('/colegio', [SchoolController::class, 'store'])->name('colegio.store');
Route::get('/colegio', [SchoolController::class, 'index'])->name('school.dashboard');






