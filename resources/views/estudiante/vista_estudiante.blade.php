@extends('layouts.app_moduloestudent')

@section('title', 'academic_central') <!-- Título dinámico para la página -->

@section('content')

<br>
<br>
 <center><h1><strong>Bienvenido estudiante {{ Auth::user()->name }}</strong></h1></center>

<div class="container">
    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-primary h-100">
                <div class="card-header">Materias Asignadas</div>
                <div class="card-body d-flex align-items-center">
                    <i class="now-ui-icons education_agenda-bookmark mr-3" style="font-size: 2.5rem; color: white;"></i>
                    <div>
                        <h3 class="card-title mb-1">{{ $assignedSubjectsCount ?? 0 }}</h3>
                        <p class="card-text">Número de materias asignadas al estudiante.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-success h-100">
                <div class="card-header">Tareas Asignadas</div>
                <div class="card-body d-flex align-items-center">
                    <i class="now-ui-icons files_single-copy-04 mr-3" style="font-size: 2.5rem; color: white;"></i>
                    <div>
                        <h3 class="card-title mb-1">{{ $assignedTasksCount ?? 0 }}</h3>
                        <p class="card-text">Cantidad de tareas asignadas al estudiante.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card text-white bg-info h-100">
                <div class="card-header">Tareas Entregadas</div>
                <div class="card-body d-flex align-items-center">
                    <i class="now-ui-icons ui-1_check mr-3" style="font-size: 2.5rem; color: white;"></i>
                    <div>
                        <h3 class="card-title mb-1">{{ $submittedTasksCount ?? 0 }}</h3>
                        <p class="card-text">Número de tareas entregadas por el estudiante.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
