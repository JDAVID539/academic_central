<?php

namespace App\Http\Controllers;

use App\Models\Teacher; 
use App\Models\Subject;
use App\Models\School;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    

    public function listAssignedSubjects()
    {
        $teacher = Auth::user()->teacher; // Obtener el modelo Teacher relacionado al usuario autenticado
    
        if (!$teacher) {
            return redirect()->route('login')->with('error', 'No tienes permisos para acceder a esta sección.');
        }
    
        $subjects = \App\Models\Subject::where('teacher_id', $teacher->id)->get();
    
        return view('vist_lis_materias_teacher', compact('subjects'));
    }
    
    public function showAssignTaskForm($subjectId)
    {
        $subject = Subject::findOrFail($subjectId);
        $tasks = $subject->tasks; // Obtener tareas relacionadas
        return view('assign_task', compact('subject', 'tasks'));
    }
    



}
