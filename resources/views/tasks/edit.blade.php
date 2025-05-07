@extends('layouts.app_moduloteacher')

@section('content')
<br>
<br>
<h3>Editar tarea</h3>

<form action="{{ route('tasks.update', $task->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="task_title" class="form-label">Nombre de la tarea</label>
        <input type="text" name="title" id="task_title" class="form-control" value="{{ old('title', $task->title) }}" required>
    </div>

    <div class="mb-3">
        <label for="deadline" class="form-label">Fecha límite</label>
<input type="date" name="deadline" id="deadline" class="form-control" value="{{ old('deadline', $task->deadline ? \Carbon\Carbon::parse($task->deadline)->format('Y-m-d') : '') }}" required>
    </div>

    <div class="mb-3">
        <label for="task_description" class="form-label">Descripción</label>
        <textarea name="task_description" id="task_description" class="form-control" required>{{ old('task_description', $task->description) }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Actualizar tarea</button>
    <a href="{{ route('teacher.subjects.assignTaskForm', $task->subject_id) }}" class="btn btn-secondary">Cancelar</a>
</form>

@endsection
