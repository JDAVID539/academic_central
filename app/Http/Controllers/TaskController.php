<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'task_description' => 'required|string',
        'deadline' => 'required|date',
        'subject_id' => 'required|exists:subjects,id',
    ]);

    $task = new \App\Models\Task();
    $task->title = $request->title;
    $task->description = $request->task_description;
    $task->deadline = $request->deadline;
    $task->subject_id = $request->subject_id;
    $task->save();

    return redirect()->back()->with('success', 'Tarea creada correctamente.');
}

public function edit($id)
{
    $task = \App\Models\Task::findOrFail($id);
    return view('tasks.edit', compact('task'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'task_description' => 'required|string',
        'deadline' => 'required|date',
    ]);

    $task = \App\Models\Task::findOrFail($id);
    $task->title = $request->title;
    $task->description = $request->task_description;
    $task->deadline = $request->deadline;
    $task->save();

    return redirect()->route('teacher.subjects.assignTaskForm', $task->subject_id)
        ->with('success', 'Tarea actualizada correctamente.');
}
public function destroy($id)
{
    $task = \App\Models\Task::findOrFail($id);
    $task->delete();

    return redirect()->back()->with('success', 'Tarea eliminada correctamente.');
}


}
