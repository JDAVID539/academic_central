@extends('layouts.app_modulo')

@section('content')
<div class="container">
    <br>
<br> 
<br>
    <h2>Registrar Materia</h2>
    <form method="POST" action="{{ route('subjects.store') }}">
        @csrf

        <div class="mb-3">
            <label for="name">Nombre de la materia:</label>
            <input type="text" name="name_subject" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="course_id">Curso:</label>
            <select name="course_id" class="form-control" required>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name_course }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="teacher_id">Profesor:</label>
            <select name="teacher_id" class="form-control" required>
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->user->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Materia</button>
    </form>
</div>
@endsection
