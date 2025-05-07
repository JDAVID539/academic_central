@extends('layouts.app_moduloteacher')

@section('content')
<br>
<br>
<h3>Asignar tarea</h3>

<button class="btn btn-primary mb-3" onclick="document.getElementById('form-add-task').classList.toggle('d-none')">
    Añadir tarea
</button>

<div id="form-add-task" class="d-none">
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="task_title" class="form-label">Nombre de la tarea</label>
            <input type="text" name="title" id="task_title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="deadline" class="form-label">Fecha límite</label>
            <input type="date" name="deadline" id="deadline" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="task_description" class="form-label">Descripción</label>
            <textarea name="task_description" id="task_description" class="form-control" required></textarea>
        </div>
        <input type="hidden" name="subject_id" value="{{ $subject->id ?? '' }}">
        <button type="submit" class="btn btn-success">Guardar tarea</button>
    </form>
</div>

@if(isset($tasks) && $tasks->count())
    <h4 class="mt-4">Tareas asignadas</h4>
    <ul class="list-group">
        @foreach($tasks as $task)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{ $task->title }}</strong> - Fecha límite: 
                    {{ $task->deadline ? \Carbon\Carbon::parse($task->deadline)->format('d/m/Y') : 'No especificada' }}
                    <p>{{ $task->description }}</p>
                </div>
                <div>
                    <a href="{{ route('submit_assignment.index', $task->id) }}" class="btn btn-sm btn-info">Ver entregas</a>

                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-primary">Editar</a>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Está seguro de eliminar esta tarea?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                    
                </div>
            </li>
        @endforeach
    </ul>
@else
    <p class="mt-4">No hay tareas asignadas aún.</p>
@endif

@endsection


