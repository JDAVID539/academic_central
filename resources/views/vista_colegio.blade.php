@extends('layouts.app_modulo')

@section('title', 'Dashboard')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4"> <small class="text-muted">Estadísticas Generales</small></h2>

    <div class="row g-4 text-center">
        <!-- Estudiantes -->
        <div class="col-md-4">
            <div class="card text-white" style="background-color: #f75d34; border: none;">
                <div class="card-body d-flex flex-column justify-content-center align-items-center py-4">
                    <i class="bi bi-people-fill fs-1 mb-2"></i>
                    <h3 class="fw-bold">{{ $students->count() }}</h3>
                    <h5 class="mb-2">Estudiantes</h5>
                    <a href="{{ route('users.byRole', 'Estudiante') }}" class="text-white text-decoration-underline">Ver Detalles</a>
                </div>
            </div>
        </div>

        <!-- Profesores -->
        <div class="col-md-4">
            <div class="card text-white" style="background-color: #00cc00; border: none;">
                <div class="card-body d-flex flex-column justify-content-center align-items-center py-4">
                    <i class="bi bi-person-badge-fill fs-1 mb-2"></i>
                    <h3 class="fw-bold">{{ $teachers->count() }}</h3>
                    <h5 class="mb-2">Profesores</h5>
                    <a href="{{ route('users.byRole', 'Profesor') }}" class="text-white text-decoration-underline">Ver Detalles</a>
                </div>
            </div>
        </div>

        <!-- Administradores -->
        <div class="col-md-4">
            <div class="card text-white" style="background-color: #f44336; border: none;">
                <div class="card-body d-flex flex-column justify-content-center align-items-center py-4">
                    <i class="bi bi-shield-lock-fill fs-1 mb-2"></i>
                    <h3 class="fw-bold">{{ $admins->count() }}</h3>
                    <h5 class="mb-2">Administradores</h5>
                    <a href="{{ route('users.byRole', 'Administrador') }}" class="text-white text-decoration-underline">Ver Detalles</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
