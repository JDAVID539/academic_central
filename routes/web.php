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
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\SubjectController;

Route::get('/frmularioasistencia', [AttendanceController::class, 'create'])->name('frm_asistencia');
Route::post('/asistencia', [AttendanceController::class, 'store'])->name('asistencia.store');
// Rutas de estudiantes 
Route::get('/frmestudent', [StudentController::class, 'create'])->name('frm.create');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');


Route::get('/frmcurso', [CourseController::class, 'create'])->name('courses.create');
Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');





Route::get('/consultas', [OrmController::class, 'consultas']);

Route::get('/frmcontacto', [ContactController::class, 'create'])->name('contact.create');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

//vistas de roles
Route::get('/admin', function () {
    return view('vista_admin');})->name('admin');

Route::get('/user', function () {
    return view('vista_colegio');})->name('teacher.dashboard');

Route::get('/estudiante', function () {
    return view('vista_estudiante');})->name('student.dashboard');

    
Route::get('/colegio', [SchoolController::class, 'index'])->name('school.dashboard');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', fn() => view('vista_admin'))->name('admin');
});


//vistas para home  y sus seciones
Route::get('/', function () { return view('home');})->name('home');

//rutas para inicio de seccion  get y post
    route::get('/login', function () {return view('login');})->name('login');

     Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

//rutas para el formulario de registro de colegio get y post
Route::get('/frm_colegio', [SchoolController::class, 'create'])->name('colegiio.create');
Route::post('/colegio', [SchoolController::class, 'store'])->name('colegio.store');

//rutas paara el modulo administrador
Route::get('/users', [UserController::class, 'index'])->name('users.index');// ruta para ver los usarios registrados y filtrar, eliminar editar y añadir     
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');// ediatr datos de usario
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');// actualizar usarios registrados
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy'); //eliminar  usuarios registrados
Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); // cerrar secion

Route::get('/frmuser', [UserController::class, 'create'])->name('users.create');//para ver el formulario de registro de usario
Route::post('/users', [UserController::class, 'store'])->name('users.store');//para enviar el formulario 

//rutas para el modulo de eestudiantes
Route::get('/estudiante', function () {return view('vista_estudiante');})->name('student.dashboard');//vista que manda  al iniicio de sesion de estudiante 
Route::get('/user/perfil', [ProfileController::class, 'show'])->name('user.perfil');



Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');//mostrar lista de loscursos donde puede agregar  eliminar y editar   
Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');//mostrar formulario para editar un curso
Route::put('/courses/{id}', [CourseController::class, 'update'])->name('courses.update');//actualizar datos de un curso
Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');//eliminar un curso


//rutas para subjects
Route::get('/subjects', [SubjectController::class, 'create'])->name('subjects.create');//mostrar formulario para agregar una  materia
Route::post('/subjects', [SubjectController::class, 'store'])->name('subjects.store');//guardar una materia
Route::get('/subjects/{id}/edit', [SubjectController::class, 'edit'])->name('subjects.edit');//mostrar formulario para editar un curso
Route::delete('/subjects/{id}', [SubjectController::class, 'destroy'])->name('subjects.destroy');//eliminar una materia
Route::put('/subjects/{id}', [SubjectController::class, 'update'])->name('subjects.update');//actualizar una materia
Route::get('/courses/{id}/subjects', [CourseController::class, 'showSubjects'])->name('courses.subjects');//mostrar materias de un curso


Route::post('/subject/store', [SubjectController::class, 'store'])->name('frm_subject');

Route::post('/courses/assign-student', [CourseController::class, 'assignStudent'])->name('courses.assignStudent');

Route::get('/list_course_teacher', [CourseController::class, 'listTeacherCourses'])->name('list_course_teacher');

