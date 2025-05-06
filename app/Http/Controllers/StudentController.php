<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use App\Models\Course;
use App\Models\Teacher;

class StudentController extends Controller
{

    
    public function create()
    {
        // Obtiene los datos necesarios para los select del formulario
        $users = User::all();
        $courses = Course::all();
        $teachers = Teacher::all();

        return view('frm_student', compact('users', 'courses', 'teachers'));
    }

    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'course_id' => 'required|exists:courses,id',
            'teacher_assigned_id' => 'required|exists:teachers,id',
        ]);

        // Guarda el estudiante en la base de datos
        Student::create([
            'user_id' => $request->user_id,
            'course_id' => $request->course_id,
            'teacher_assigned_id' => $request->teacher_assigned_id,
        ]);

        return redirect()->back()->with('success', 'Estudiante registrado correctamente.');
    }
}
