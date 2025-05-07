<?php

namespace App\Http\Controllers;
use App\Models\Task;
use App\Models\Submit_Assignment;
use App\Models\user;    

use Carbon\Carbon;



use Illuminate\Http\Request;

class SubmitAssignmentController extends Controller
{
   
    public function index($taskId)
{
    $task = Task::with('submit_assignment.student.user')->findOrFail($taskId);
    $submissions = $task->submit_assignment;

    return view('submit_assignments_index', compact('task', 'submissions'));
}

    
    
    

public function store(Request $request, $taskId)
{
    $request->validate([
        'file' => 'required|file|max:10240',
    ]);

    $task = Task::findOrFail($taskId);
    $student = auth()->user()->student;

    // Aquí se guarda el archivo en el disco 'public'
    $path = $request->file('file')->store('assignments', 'public');

    $submitAssignment = new Submit_Assignment();
    $submitAssignment->task_id = $task->id;
    $submitAssignment->student_id = $student->id;
    $submitAssignment->file_path = $path;
    $submitAssignment->delivery_date = \Carbon\Carbon::now();
    $submitAssignment->save();

    return redirect()->back()->with('success', 'Tarea enviada correctamente.');
}

    
}
