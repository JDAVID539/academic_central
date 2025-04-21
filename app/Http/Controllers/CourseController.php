<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    public function create()
    {
        return view('frm_course');
    }

    public function store(Request $request)
    {
       
        $request->validate([
            'name_course' => 'required|string|max:255', // Cambiado a 'name_course'
            'description_course' => 'required|string|max:1000', // Cambiado a 'description_course'
        ]);

        // Guarda el curso en la base de datos
        
        Course::create([
            
            'name_course' => $request->name_course, 
            'description_course' => $request->description_course, 
        ]);

        return redirect()->back()->with('success', 'Curso registrado correctamente.');
    }
}