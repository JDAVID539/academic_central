@extends('layouts.app_moduloestudent')

@section('title', 'academic_central')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
@endpush

@section('content')
<br><br>

<div class="container mt-4">
    <h3 class="text-center mb-4 text-primary">
        <i class="fas fa-book-open me-2"></i>Materias Asignadas
    </h3>

    <div class="row">
        @foreach($subjects as $subject)
            <div class="col-md-4 mb-4">
                <div class="card shadow" style="background-color: {{ $subject->color ?? '#007bff' }};">
                    <div class="card-body text-white">
                        <h5 class="card-title">{{ $subject->name_subject }}</h5>
                        <p class="card-text">
                            <i class="fas fa-chalkboard-teacher me-2"></i>Profesor: {{ $subject->teacher->user->name ?? 'No asignado' }}
                        </p>
                        <a href="{{ route('student.subject.tasks', $subject->id) }}" class="btn btn-light">
                            <i class="fas fa-eye me-1"></i>Ver más
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
