@extends('layouts.app_modulo')

@section('title', 'Ver Curso')

@section('content')
<div class="container mt-4">
    <h3>Materias del curso: {{ $course->name_course }}</h3>

    @if($subjects->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre de la Materia</th>
                    <th>Profesor</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subjects as $subject)
                <tr>
                    <td>{{ $subject->name_subject }}</td>
                    <td>{{ $subject->teacher->user->name ?? 'No asignado' }}</td>
                    <td>
                        <a href="{{ route('subjects.edit', $subject->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    </td>
                    <td>
                        <form action="{{ route('subjects.destroy', $subject->id) }}" method="POST" onsubmit="return confirm('¿Está seguro de eliminar esta materia?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Este curso no tiene materias registradas.</p>
    @endif

    <!-- Botón para mostrar el formulario -->
    <button class="btn btn-primary mt-3" onclick="document.getElementById('form-agregar-materia').classList.toggle('d-none')">
        Agregar Materia
    </button>

    <!-- Formulario para agregar una nueva materia -->
    <div id="form-agregar-materia" class="mt-3 d-none">
        <form action="{{ route('subjects.store') }}" method="POST">
            @csrf
            <!-- Campo oculto con el ID del curso -->
            <input type="hidden" name="course_id" value="{{ $course->id }}">

            <div class="mb-3">
                <label for="name_subject" class="form-label">Nombre de la Materia</label>
                <input type="text" name="name_subject" id="name_subject" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="teacher_id" class="form-label">Profesor</label>
                <select name="teacher_id" id="teacher_id" class="form-control" required>
                    <option value="">Seleccione un profesor</option>
                    @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}">{{ $teacher->user->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Agregar Materia</button>
        </form>
    </div>
</div>

<h4>Estudiantes inscritos</h4>
@if($students->count())
    <ul class="list-group mb-3">
        @foreach($students as $student)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $student->user->name ?? 'Nombre no disponible' }}
                <form action="{{ route('courses.removeStudent', [$course->id, $student->id]) }}" method="POST" onsubmit="return confirm('¿Está seguro de eliminar a este estudiante del curso?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
    {{ $students->links() }} <!-- Paginación -->
@else
    <p>No hay estudiantes inscritos en este curso.</p>
@endif


<h4>Agregar estudiante al curso</h4>
<form action="{{ route('courses.assignStudent') }}" method="POST">
    @csrf
    <input type="hidden" name="course_id" value="{{ $course->id }}">
    
    <div class="mb-3">
        <label for="students_id">Seleccionar estudiante:</label>
        <select name="student_id" class="form-control" required>
            @foreach($available_students as $student)
                <option value="{{ $student->id }}">{{ $student->user->name }}</option>
            @endforeach
        </select>
    
    </div>

    <button type="submit" class="btn btn-primary">Añadir Estudiante</button>
</form>


@endsection
