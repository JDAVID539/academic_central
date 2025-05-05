@extends('layouts.app_modulo')

@section('content')
<div class="container mt-4">
    <h3>Materias del curso: {{ $course->name_course }}</h3>

    @if($course->subjects->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre de la Materia</th>
                    <th>Profesor</th>
                </tr>
            </thead>
            <tbody>
                @foreach($course->subjects as $subject)
                    <tr>
                        <td>{{ $subject->name_subject }}</td>
                        <td>{{ $subject->teacher->user->name ?? 'No asignado' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Este curso no tiene materias registradas.</p>
    @endif

    <a href="{{ route('courses.index') }}" class="btn btn-secondary mt-3">Volver</a>
</div>
@endsection

