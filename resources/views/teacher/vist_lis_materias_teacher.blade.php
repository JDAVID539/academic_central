@extends('layouts.app_moduloteacher')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
@endpush

@section('content')
<br><br>

<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="card-body">
            <h3 class="card-title text-center text-primary mb-4">
                <i class="fas fa-book-open me-2"></i>Materias Asignadas
            </h3>

            @if($subjects->count())
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th><i class="fas fa-book me-1 text-info"></i>Materia</th>
                                <th><i class="fas fa-chalkboard me-1 text-warning"></i>Curso</th>
                                <th><i class="fas fa-cogs me-1 text-secondary"></i>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subjects as $subject)
                                <tr>
                                    <td>{{ $subject->name_subject }}</td>
                                    <td>{{ $subject->course->name_course ?? 'No asignado' }}</td>
                                    <td>
                                        <a href="{{ route('teacher.subjects.assignTaskForm', $subject->id) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="fas fa-tasks me-1"></i>Ver más
                                        </a>
                                        <a href="{{ route('teacher.subjects.attendanceForm', $subject->id) }}" class="btn btn-sm btn-outline-success">
                                            <i class="fas fa-user-check me-1"></i>Asistencia
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-warning text-center mt-4">
                    <i class="fas fa-exclamation-circle me-2"></i>No hay materias asignadas.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection


