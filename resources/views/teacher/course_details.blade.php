{{-- filepath: c:\xampp\htdocs\academic_central\resources\views\teacher\course_details.blade.php --}}
@extends('layouts.app_moduloteacher')

@section('title', 'Detalles del Curso')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Detalles del Curso: {{ $course->name }}</h1>

    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Información del Curso</h5>
        </div>
        <div class="card-body">
            <p><strong>Descripción:</strong> {{ $course->description }}</p>

            <p><strong>Materias:</strong></p>
            @if($course->subjects->count())
                <ul>
                    @foreach ($course->subjects as $subject)
                        <li>{{ $subject->name }}</li>
                    @endforeach
                </ul>
            @else
                <p class="text-muted">No hay materias asignadas a este curso.</p>
            @endif

            <p><strong>Estudiantes:</strong></p>
            @if($course->students->count())
                <ul>
                    @foreach ($course->students as $student)
                        <li>{{ $student->name }} ({{ $student->email }})</li>
                    @endforeach
                </ul>
            @else
                <p class="text-muted">No hay estudiantes inscritos en este curso.</p>
            @endif
        </div>
    </div>
</div>
@endsection
