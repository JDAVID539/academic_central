<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Course;
use App\Models\Teacher;

class SubjectController extends Controller
{
    public function index()
    {
        // Code to list all subjects
    }

    public function create()
{
    $school_id = session('school_id');
    
    
    if (!$school_id) {
        return redirect()->back()->with('error', 'No hay colegio activo en sesión.');
    }

   
    $teachers = Teacher::where('school_id', $school_id)->get();
    $courses = Course::where('school_id', $school_id)->get();

    // Pasar los datos a la vista
    return view('frm_subject', compact('teachers', 'courses'));
}


    public function store(Request $request)
    {
       
        $request->validate([
            'name_subject' => 'required|string|max:255',   
            'course_id' => 'required|exists:courses,id',   
            'teacher_id' => 'required|exists:teachers,id', 
        ]);
    
        // Crear la nueva materia
        Subject::create([
            'name_subject' => $request->name_subject,
            'course_id' => $request->course_id,
            'teacher_id' => $request->teacher_id,
        ]);
    
        // Redirigir a la ruta 'subjects.store' con un mensaje de éxito
        return redirect()->route('courses.subjects', $request->course_id)->with('success', 'Materia creada correctamente.');
    }

    public function show($id)
{
    $course = Course::with('subjects.teacher.user')->findOrFail($id);
    $school_id = session('school_id');
    $teachers = Teacher::where('school_id', $school_id)->with('user')->get();

    return view('vist_show_course', compact('course', 'teachers'));
}

    public function edit($id)
    {
        $school_id = session('school_id');

        if (!$school_id) {
            return redirect()->back()->with('error', 'No hay colegio activo en sesión.');
        }

        $subject = Subject::findOrFail($id);
        $teachers = Teacher::where('school_id', $school_id)->get();
        $courses = Course::where('school_id', $school_id)->get();

        return view('colegio.edit_subject', compact('subject', 'teachers', 'courses'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_subject' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
            'teacher_id' => 'required|exists:teachers,id',
        ]);

        $subject = Subject::findOrFail($id);
        $subject->name_subject = $request->name_subject;
        $subject->course_id = $request->course_id;
        $subject->teacher_id = $request->teacher_id;
        $subject->save();

        return redirect()->route('courses.subjects', $subject->course_id)->with('success', 'Materia actualizada correctamente.');
    }

    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();

        return redirect()->back()->with('success', 'Materia eliminada correctamente.');
    }
}
