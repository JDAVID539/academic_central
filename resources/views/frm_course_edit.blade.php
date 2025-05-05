@extends('layouts.app_modulo')

@section('content')
<div class="container mt-4">
    <h2>Editar Curso</h2>

    @if (session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <form action="{{ route('courses.update', $course->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>
            Nombre del curso:
            <br>
            <input type="text" name="name_course" value="{{ $course->name_course }}" required>
        </label>
        <br><br>

        <label>
            Descripción del curso:
            <br>
            <textarea name="description_course" rows="4" required>{{ $course->description_course }}</textarea> 
        </label>
        <br><br>
        
        <label>
            Profesor asignado:
            <br>
            <select name="teacher_id">
                <option value="">Seleccione un profesor</option>
                @foreach ($teachers as $teacher)
                    <option value="{{ $teacher->id }}" {{ $teacher->id == $course->teacher_id ? 'selected' : '' }}>
                        {{ $teacher->user->name }}
                    </option>
                @endforeach
            </select>
        </label>
        <br><br>

        <button type="submit">Actualizar Curso</button>
    </form>
</div>
@endsection
