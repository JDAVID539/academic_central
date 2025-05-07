@extends('layouts.app_moduloestudent')

@section('title', 'academic_central') 

@section('content')
<br>
<br>
<h3>Materias asignadas</h3>

<div class="row">
    @foreach($subjects as $subject)
        <div class="col-md-4 mb-4">
            <div class="card text-white" style="background-color: {{ $subject->color ?? '#007bff' }};">
                <div class="card-body">
                    <h5 class="card-title">{{ $subject->name_subject }}</h5>
                    <p class="card-text">Profesor: {{ $subject->teacher->user->name ?? 'No asignado' }}</p>
                    <a href="{{ route('student.subject.tasks', $subject->id) }}" class="btn btn-light">Ver más</a>
                </div>
            </div>
        </div>
    @endforeach
</div>



@endsection