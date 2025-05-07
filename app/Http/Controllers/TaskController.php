<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(Request $request)
{
    
    $request->validate([
        'task_description' => 'required|string',
        'deadline' => 'required|date',
        'subject_id' => 'required|exists:subjects,id',
    ]);

    $task = new \App\Models\Task();
    $task->description = $request->task_description;
    $task->deadline = $request->deadline;
    $task->subject_id = $request->subject_id;
    $task->save();

    return redirect()->back()->with('success', 'Tarea creada correctamente.');
}


}
