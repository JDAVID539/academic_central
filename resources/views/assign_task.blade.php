@extends('layouts.app_moduloteacher')

@section('content')
<br>
<br>
<h3>Asignar tarea - Vista en construcción</h3>

<button class="btn btn-primary mb-3" onclick="document.getElementById('form-add-task').classList.toggle('d-none')">
    Añadir tarea
</button>

<div id="form-add-task" class="d-none">
    <form action="{{ route('tasks.store') }}" method="POST">
    
        @csrf
        <div class="mb-3">
            <label for="task_name" class="form-label">Nombre de la tarea</label>
            <input type="text" name="task_name" id="task_name" class="form-control" required>
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
@endsection
