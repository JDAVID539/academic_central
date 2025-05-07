@extends('layouts.app_modulo')

@section('content')
<div class="container">
    <br>
    <br> 
    <br>
    <h2>Editar Materia</h2>
    <form method="POST" action="{{ route('subjects.update', $subject->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name_subject">Nombre de la materia:</label>
            <input type="text" name="name_subject" class="form-control" value="{{ old('name_subject', $subject->name_subject) }}" required>
        </div>

        <div class="mb-3">
            <label for="course_id">Curso:</label>
            <select name="course_id" class="form-control" required>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ $course->id == old('course_id', $subject->course_id) ? 'selected' : '' }}>
                        {{ $course->name_course }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="teacher_id">Profesor:</label>
            <select name="teacher_id" class="form-control" required>
                @foreach($teachers as $teacher)
                    <option value="{{ $teacher->id }}" {{ $teacher->id == old('teacher_id', $subject->teacher_id) ? 'selected' : '' }}>
                        {{ $teacher->user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Materia</button>
    </form>
</div>
@endsection
