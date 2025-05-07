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
    
    public function storeTask(Request $request)
{
    $request->validate([
        'subject_id' => 'required|exists:subjects,id',
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'due_date' => 'nullable|date',
    ]);

    $task = new \App\Models\Task();
    $task->subject_id = $request->subject_id;
    $task->title = $request->title;
    $task->description = $request->description;
    $task->due_date = $request->due_date;
    $task->save();

    // Redirigir a la vista de asignar tarea con la lista actualizada
    return redirect()->route('teacher.subjects.assignTaskForm', $request->subject_id)
        ->with('success', 'Tarea añadida correctamente.');
}




}
