<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;

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

    public function showSubjectsForStudent($studentId)
{
    $student = \App\Models\Student::findOrFail($studentId);
    $course = $student->Course;
    $subjects = $course ? $course->subjects : collect();

    return view('materias_estudent', compact('student', 'subjects'));
}
public function showSubjectTasks($subjectId)
{
    $subject = \App\Models\Subject::findOrFail($subjectId);
    $tasks = $subject->tasks; // Asumiendo que la relación está definida en el modelo Subject

    return view('student_subject_tasks', compact('subject', 'tasks'));
}



public function showProfile()
{
    $user = Auth::user();
    $profile = $user->profile;
    $school = $user->school; // Obtener la escuela asociada si existe
    return view('profile_student', compact('user', 'profile', 'school'));
}

public function editProfile()
{
    $user = Auth::user();
    $profile = $user->profile; // Obtener perfil asociado
    return view('edit_profile_student', compact('user', 'profile'));
}

public function updateProfile(Request $request)
{
    $user = Auth::user();
    $profile = $user->profile;

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        'phone' => 'nullable|string|max:20',
        'address' => 'nullable|string|max:255',
        // Otros campos que quieras validar
    ]);

    $user->update($request->only(['name', 'email']));
    $profile->update($request->only(['phone', 'address']));

    return redirect()->route('profile_student')->with('success', 'Perfil actualizado correctamente.');
}




}
