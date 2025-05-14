@extends('layouts.app_moduloteacher')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
@endpush

@section('content')
<br><br>

<div class="container mt-4">
    <div class="card shadow mx-auto" style="max-width: 600px;">
        <div class="card-body">
            <h3 class="card-title text-center text-warning mb-4">
                <i class="fas fa-edit me-2"></i>Editar Tarea
            </h3>

            <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="task_title" class="form-label"><i class="fas fa-heading me-1"></i>Nombre de la tarea</label>
                    <input type="text" name="title" id="task_title" class="form-control" value="{{ old('title', $task->title) }}" required>
                </div>

                <div class="mb-3">
                    <label for="deadline" class="form-label"><i class="fas fa-calendar-day me-1"></i>Fecha límite</label>
                    <input type="date" name="deadline" id="deadline" class="form-control" value="{{ old('deadline', $task->deadline ? \Carbon\Carbon::parse($task->deadline)->format('Y-m-d') : '') }}" required>
                </div>

                <div class="mb-3">
                    <label for="task_description" class="form-label"><i class="fas fa-align-left me-1"></i>Descripción</label>
                    <textarea name="task_description" id="task_description" class="form-control" rows="4" required>{{ old('task_description', $task->description) }}</textarea>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-save me-1"></i>Actualizar Tarea
                    </button>
                    <a href="{{ route('teacher.subjects.assignTaskForm', $task->subject_id) }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left me-1"></i>Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
