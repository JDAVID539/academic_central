<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Teacher;

class CourseController extends Controller
{
    public function create()
    {
        $teachers = Teacher::all();
        return view('frm_course', compact('teachers'));
    }

    public function store(Request $request)
    {
       
        $request->validate([
            'name_course' => 'required|string|max:255', // Cambiado a 'name_course'
            'description_course' => 'required|string|max:1000', // Cambiado a 'description_course'
            'teacher_id' => 'required|exists:teachers,id', // Cambiado a 'teacher_id'
            'school_id' => 'required|exists:schools,id', // Cambiado a 'school_id'
        ]);

        // Guarda el curso en la base de datos
        
        Course::create([
            
            'name_course' => $request->name_course, 
            'description_course' => $request->description_course, 
            'teacher_id' => $request->teacher_id, // Cambiado a 'teacher_id'
            'school_id' => $request->school_id, // Cambiado a 'school_id'
        ]);

        return redirect()->back()->with('success', 'Curso registrado correctamente.');
    }
}