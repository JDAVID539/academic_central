@extends('layouts.app_moduloteacher')

@section('title', 'Cursos Asignados')

@section('content')
<br>
<br>
<center><h1><strong>Bienvenido profesor {{ Auth::user()->name }}</strong></h1>
<div class="container">
    <div class="row mb-4">
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-primary h-100">
                <div class="card-header">Cursos Asignados</div>
                <div class="card-body d-flex align-items-center">
                    <i class="now-ui-icons education_agenda-bookmark mr-3" style="font-size: 2.5rem; color: white;"></i>
                    <div>
                        <h3 class="card-title mb-1">{{ $assignedCoursesCount ?? 0 }}</h3>
                        <p class="card-text">Número de cursos asignados al profesor.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-success h-100">
                <div class="card-header">Materias Asignadas</div>
                <div class="card-body d-flex align-items-center">
                    <i class="now-ui-icons education_atom mr-3" style="font-size: 2.5rem; color: white;"></i>
                    <div>
                        <h3 class="card-title mb-1">{{ $assignedSubjectsCount ?? 0 }}</h3>
                        <p class="card-text">Cantidad de materias asignadas al profesor.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-info h-100">
                <div class="card-header">Tareas Asignadas</div>
                <div class="card-body d-flex align-items-center">
                    <i class="now-ui-icons files_single-copy-04 mr-3" style="font-size: 2.5rem; color: white;"></i>
                    <div>
                        <h3 class="card-title mb-1">{{ $assignedTasksCount ?? 0 }}</h3>
                        <p class="card-text">Número de tareas asignadas o puestas por el profesor.</p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
