@extends('layouts.app_modulo')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">Editar Curso</h2>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('courses.update', $course->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name_course" class="form-label">Nombre del curso:</label>
                    <input type="text" name="name_course" id="name_course" class="form-control" value="{{ $course->name_course }}" required>
                </div>

                <div class="mb-3">
                    <label for="description_course" class="form-label">Descripción del curso:</label>
                    <textarea name="description_course" id="description_course" class="form-control" rows="4" required>{{ $course->description_course }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="teacher_id" class="form-label">Profesor asignado:</label>
                    <select name="teacher_id" id="teacher_id" class="form-select">
                        <option value="">Seleccione un profesor</option>
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}" {{ $teacher->id == $course->teacher_id ? 'selected' : '' }}>
                                {{ $teacher->user->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Actualizar Curso</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
