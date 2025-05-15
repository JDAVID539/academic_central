{{-- filepath: c:\xampp\htdocs\academic_central\resources\views\colegio\vista_colegio.blade.php --}}
@extends('layouts.app_modulo')

@section('title', 'Dashboard')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/vista_colegio.css') }}">
<style>
    .icon-circle {
        border-radius: 50%;
        padding: 12px;
        background-color: white;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .info-header {
        font-size: 1rem;
        font-weight: bold;
        margin: 0;
    }
</style>
@endpush

@section('content')
<div class="background-image">
    <div class="container py-5">
       <center> <h2 class="fw-bold text-primary">usuarios registrados</h2></center>

        <div class="row text-center">
            <!-- Total de Usuarios -->
            <div class="col-md-3">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-center align-items-center gap-2 mb-2">
                            <div class="icon-circle text-primary">
                                <i class="fas fa-users fa-2x"></i>
                            </div>
                            <h5 class="info-header text-primary">Usuarios</h5>
                        </div>
                        <h4 class="fw-bold">{{ $totalUsuarios }}</h4>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary btn-sm mt-2">Ver Detalles</a>
                    </div>
                </div>
            </div>

            <!-- Estudiantes Registrados -->
            <div class="col-md-3">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-center align-items-center gap-2 mb-2">
                            <div class="icon-circle text-success">
                                <i class="fas fa-user-graduate fa-2x"></i>
                            </div>
                            <h5 class="info-header text-success">Estudiantes</h5>
                        </div>
                        <h4 class="fw-bold">{{ $totalEstudiantes }}</h4>
                        <a href="{{ route('users.students') }}" class="btn btn-secondary btn-sm mt-2">Ver Detalles</a>
                    </div>
                </div>
            </div>

            <!-- Profesores Registrados -->
            <div class="col-md-3">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-center align-items-center gap-2 mb-2">
                            <div class="icon-circle text-warning">
                                <i class="fas fa-chalkboard-teacher fa-2x"></i>
                            </div>
                            <h5 class="info-header text-warning">Profesores</h5>
                        </div>
                        <h4 class="fw-bold">{{ $totalProfesores }}</h4>
                        <a href="{{ route('users.teachers') }}" class="btn btn-secondary btn-sm mt-2">Ver Detalles</a>
                    </div>
                </div>
            </div>

            <!-- Administradores Registrados -->
            <div class="col-md-3">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-center align-items-center gap-2 mb-2">
                            <div class="icon-circle text-danger">
                                <i class="fas fa-user-shield fa-2x"></i>
                            </div>
                            <h5 class="info-header text-danger">Administradores</h5>
                        </div>
                        <h4 class="fw-bold">{{ $totalAdministradores }}</h4>
                        <a href="{{ route('users.admins') }}" class="btn btn-secondary btn-sm mt-2">Ver Detalles</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
