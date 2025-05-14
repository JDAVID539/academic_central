@extends('layouts.app_moduloestudent')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
@endpush

@section('content')
<br><br>

<div class="container mt-4">
    <div class="card shadow">
        <div class="card-body">
            <h3 class="card-title text-center mb-3 text-primary">
                <i class="fas fa-book me-2"></i>Tareas para la materia: {{ $subject->name_subject }}
            </h3>

            @if($tasks->count())
                <div class="list-group">
                    @foreach($tasks as $task)
                        <div class="list-group-item">
                            <h5>{{ $task->title ?? 'Sin título' }}</h5>
                            <p><i class="fas fa-calendar-alt me-1"></i>Fecha límite: {{ $task->deadline }}</p>
                            <p>{{ $task->description }}</p>

                            @php
                                $submitted = $task->submit_assignment->where('student_id', auth()->user()->student->id)->first();
                            @endphp

                            @if($submitted)
                                <span class="badge bg-success">Entregada</span>
                                <form action="{{ route('submit_assignment.destroy', $submitted->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('¿Está seguro de eliminar esta entrega?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm mt-2">
                                        <i class="fas fa-trash-alt me-1"></i>Eliminar
                                    </button>
                                </form>
                            @else
                                <form action="{{ route('submit_assignment.store', $task->id) }}" method="POST" enctype="multipart/form-data" class="mt-2">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="file_{{ $task->id }}" class="form-label">Subir archivo de la tarea</label>
                                        <input type="file" name="file" id="file_{{ $task->id }}" class="form-control" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fas fa-upload me-1"></i>Enviar tarea
                                    </button>
                                </form>
                            @endif
                        </div>
                    @endforeach
                </div>
            @else
                <div class="alert alert-warning text-center mt-4">
                    <i class="fas fa-exclamation-circle me-2"></i>No hay tareas asignadas para esta materia.
                </div>
            @endif

            <div class="text-center mt-4">
                <a href="{{ route('student.subjects', ['id' => auth()->user()->student->id]) }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-1"></i>Volver a materias
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
