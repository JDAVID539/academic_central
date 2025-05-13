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
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\SubmitAssignmentController;
use App\Models\super_administrador;

Route::get('/frmularioasistencia', [AttendanceController::class, 'create'])->name('frm_asistencia');
Route::post('/asistencia', [AttendanceController::class, 'store'])->name('asistencia.store');
// Rutas de asistencia
Route::get('/teacher/subjects/{subject}/attendance', [AttendanceController::class, 'create'])->name('teacher.subjects.attendanceForm');
Route::post('/teacher/subjects/{subject}/attendance', [AttendanceController::class, 'storeMassAttendance'])->name('teacher.subjects.storeAttendance');
Route::get('/teacher/subjects/{subject}/attendance/history', [AttendanceController::class, 'attendanceHistory'])->name('teacher.subjects.attendanceHistory');


Route::get('/frmcurso', [CourseController::class, 'create'])->name('courses.create');
Route::post('/courses', [CourseController::class, 'store'])->name('courses.store');





Route::get('/consultas', [OrmController::class, 'consultas']);



//vistas de roles
Route::get('/admin', function () {
    return view('vista_admin');})->name('admin');



Route::get('/estudiante', function () {
    return view('vista_estudiante');})->name('student.dashboard');

    
    

    
Route::get('/colegio', [SchoolController::class, 'index'])->name('school.dashboard');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', fn() => view('vista_admin'))->name('admin');
});


//vistas para home  y sus seciones
Route::get('/', function () { return view('home.home');})->name('home');//rutas que muestra al entrar
    route::get('/login', function () {return view('home.login');})->name('login');//ruta que muestra el el formulario de login
     Route::post('/login', [AuthController::class, 'login'])->name('login.submit');//ruta que que autentica la los datos enviados del home 


Route::get('/frmcontacto', [ContactController::class, 'create'])->name('contact.create');//ruta que muestra el formulario de contactanos 
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');//envvia los datos  a la bsdt de contactanos


//rutas paara el modulo colegio-administrador  y sus secciones
Route::get('/user', function () {return view('colegio.vista_colegio');})->name('colegio.dashboard');//vista que muetra al iniciar seccion
Route::get('/users', [UserController::class, 'index'])->name('users.index');// ruta para ver los usarios registrados y filtrar, eliminar editar y añadir     
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');// ediatr datos de usuario
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');// actualizar usarios registrados
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy'); //eliminar  usuarios registrados
Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); // cerrar secion

Route::get('/frmuser', [UserController::class, 'create'])->name('users.create');//para ver el formulario de registro de usario
Route::post('/users', [UserController::class, 'store'])->name('users.store');//para enviar el formulario 

//ruta para colegio ver perfil del colegio
Route::get('/profile/colegio', [SchoolController::class, 'showProfile'])->name('profile.colegio');
Route::get('/school/edit', [SchoolController::class, 'edit'])->name('school.edit');
Route::put('/school/update', [SchoolController::class, 'update'])->name('school.update');
//cursos de colegio
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');//mostrar lista de loscursos donde puede agregar  eliminar y editar   
Route::get('/courses/{id}/edit', [CourseController::class, 'edit'])->name('courses.edit');//mostrar formulario para editar un curso
Route::put('/courses/{id}', [CourseController::class, 'update'])->name('courses.update');//actualizar datos de un curso
Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('courses.destroy');//eliminar un curso




//rutas para el modulo usuario- estudiante
Route::get('/estudiante', function () {return view('estudiante.vista_estudiante');})->name('student.dashboard');//vista que manda  al iniicio de sesion de estudiante 
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



Route::delete('/courses/{course}/students/{student}', [CourseController::class, 'removeStudent'])->name('courses.removeStudent');
Route::get('/students/search', [CourseController::class, 'searchStudents'])->name('students.search');


Route::middleware(['auth'])->group(function () {
    Route::get('/teacher/subjects', [TeacherController::class, 'listAssignedSubjects'])->name('teacher.subjects.list');// Mostrar las materias asignadas al profesor
});

Route::middleware(['auth'])->group(function () {
    Route::get('/teacher/subjects/{subject}/assign-task', [TeacherController::class, 'showAssignTaskForm'])->name('teacher.subjects.assignTaskForm');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/teacher/tasks/store', [TeacherController::class, 'storeTask'])->name('teacher.tasks.store');});
    Route::post('/teacher/tasks/store', [TeacherController::class, 'storeTask'])->name('teacher.tasks.store');


Route::middleware(['auth'])->group(function () {
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
});

//rutas para accones  tareas 
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');


//rutas para el modulo de estudiantes
Route::get('/student/{id}/subjects', [StudentController::class, 'showSubjectsForStudent'])->name('student.subjects');
Route::get('/student/subject/{subject}/tasks', [StudentController::class, 'showSubjectTasks'])->name('student.subject.tasks');//ruta para ver tareas del  profesor a estudiante

//rurtas para enviar la tarea al profesor
Route::post('/submit-assignment/{task}', [SubmitAssignmentController::class, 'store'])->name('submit_assignment.store');
Route::delete('/submit-assignment/{id}', [SubmitAssignmentController::class, 'destroy'])->name('submit_assignment.destroy');

//rutas para  que el profesor ve alas  entregas de laas tareas 
Route::get('/tasks/{task}/submissions', [SubmitAssignmentController::class, 'index'])->name('submit_assignment.index');



// Ruta para perfil  teacher Route::middleware(['auth', 'role:teacher'])->group(function () {
    Route::get('/teacher/profile', [TeacherController::class, 'showProfile'])->name('teacher.profile');
    Route::get('/teacher/profile/edit', [TeacherController::class, 'editProfile'])->name('teacher.profile.edit');
    Route::put('/teacher/profile/update', [TeacherController::class, 'updateProfile'])->name('teacher.profile.update');

    Route::get('/student/profile', [StudentController::class, 'showProfile'])->name('profile_student');
    Route::get('/student/profile/edit', [StudentController::class, 'editProfile'])->name('profile_edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');


Route::get('/colegio', [SchoolController::class, 'index'])->name('school.dashboard');


use App\Http\Controllers\SuperAdministradorController;

Route::get('/spadministrador', [SuperAdministradorController::class, 'index'])->name('vist_superadministrador');

Route::get('/administrador/notificaciones', [ContactController::class, 'notifications'])->name('administrador.notificaciones');
Route::get('/listado-colegios', [SuperAdministradorController::class, 'listSchools'])->name('listado.colegios');

Route::get('/colegio/{id}/editar', [SuperAdministradorController::class, 'editSchool'])->name('colegio.editar');
Route::put('/colegio/{id}', [SuperAdministradorController::class, 'updateSchool'])->name('colegio.actualizar');
Route::delete('/colegio/{id}', [SuperAdministradorController::class, 'deleteSchool'])->name('colegio.eliminar');

Route::get('/colegio/{id}/detalle', [SuperAdministradorController::class, 'showSchoolDetail'])->name('school.detail');
Route::get('/frm_colegio', [SchoolController::class, 'create'])->name('colegiio.create');//ruta  que muestra el formulario de registar el formulario
Route::post('/colegio', [SchoolController::class, 'store'])->name('colegio.store');//ruta que eenvia los datos del formulario colegio a la baase de datos

Route::get('/superadmin/profile', [SuperAdministradorController::class, 'profileSuperAdmin'])->name('superadmin.profile');

Route::get('/superadmin/profile/edit', [SuperAdministradorController::class, 'editProfile'])->name('superadmin.editProfile');
Route::put('/superadmin/profile/update', [SuperAdministradorController::class, 'updateProfile'])->name('superadmin.updateProfile');


//rutas para el modulo profesores
Route::get('/profesor', function () {return view('teacher.vista_profesores');})->name('teacher.dashboard');




