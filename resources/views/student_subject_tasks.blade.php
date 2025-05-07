@extends('layouts.app_moduloestudent')

@section('content')
<br>
<br>
<h3>Tareas para la materia: {{ $subject->name_subject }}</h3>

@if($tasks->count())
    <ul>
        @foreach($tasks as $task)
    <div class="task-item">
        <h5>{{ $task->title ?? 'Sin título' }}</h5>
        <p>Fecha límite: {{ $task->deadline }}</p>
        <p>{{ $task->description }}</p>

        @php
            $submitted = $task->submit_assignment->where('student_id', auth()->user()->student->id)->first();
        @endphp

        @if($submitted)
            <span class="badge bg-red">Entregada</span>
            <form action="{{ route('submit_assignment.destroy', $submitted->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Está seguro de eliminar esta entrega?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
            </form>
        @else
            <!-- Mostrar formulario solo si no hay envío -->
            <form action="{{ route('submit_assignment.store', $task->id) }}" method="POST" enctype="multipart/form-data" class="mt-2">
                @csrf
                <div class="mb-3">
                    <label for="file_{{ $task->id }}">Subir archivo de la tarea</label>
                    <input type="file" name="file" id="file_{{ $task->id }}" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Enviar tarea</button>
            </form>
        @endif
    </div>
@endforeach





    </ul>
@else
    <p>No hay tareas asignadas para esta materia.</p>
@endif

<a href="{{ route('student.subjects', ['id' => auth()->user()->student->id]) }}" class="btn btn-secondary">Volver a materias</a>
@endsection
