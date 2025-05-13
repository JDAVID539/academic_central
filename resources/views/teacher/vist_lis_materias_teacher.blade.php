@extends('layouts.app_moduloteacher')

@section('content')
<br>
<br>
<h3>Materias asignadas</h3>
@if($subjects->count())
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre de la Materia</th>
                <th>Curso</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subjects as $subject)
                <tr>
                    <td>{{ $subject->name_subject }}</td>
                    <td>{{ $subject->course->name_course ?? 'No asignado' }}</td>
                    <td>
                        <a href="{{ route('teacher.subjects.assignTaskForm', $subject->id) }}" class="btn btn-primary btn-sm">Ver má</a>
                        <a href="{{ route('teacher.subjects.attendanceForm', $subject->id) }}" class="btn btn-success btn-sm">Asistencia</a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@else
    <p>No hay materias asignadas.</p>
@endif
@endsection

