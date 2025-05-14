@extends('layouts.app_modulosuperadmin')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/perfil_superadmin.css') }}?v={{ time() }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
@endpush

@section('content')
<div class="container mt-5">
    <div class="card mx-auto p-4 shadow-lg card-profile" style="max-width: 700px;">
        <div class="text-center mb-4">
            <h2 class="title-header"><i class="fas fa-building-columns me-2"></i>Detalle del Colegio</h2>
        </div>

        <table class="table table-bordered border-secondary shadow-sm">
            <tbody>
                <tr>
                    <th><i class="fas fa-id-badge me-2 text-info"></i>ID</th>
                    <td>{{ $school->id }}</td>
                </tr>
                <tr>
                    <th><i class="fas fa-user-tie me-2 text-primary"></i>Nombre del Director</th>
                    <td>{{ $school->name }}</td>
                </tr>
                <tr>
                    <th><i class="fas fa-school me-2 text-warning"></i>Nombre del Colegio</th>
                    <td>{{ $school->name_school }}</td>
                </tr>
                <tr>
                    <th><i class="fas fa-map-marker-alt me-2 text-danger"></i>Dirección</th>
                    <td>{{ $school->address }}</td>
                </tr>
                <tr>
                    <th><i class="fas fa-city me-2 text-secondary"></i>Ciudad</th>
                    <td>{{ $school->city }}</td>
                </tr>
                <tr>
                    <th><i class="fas fa-envelope me-2 text-success"></i>Email</th>
                    <td>{{ $school->email }}</td>
                </tr>
                <tr>
                    <th><i class="fas fa-phone me-2 text-primary"></i>Teléfono</th>
                    <td>{{ $school->phone }}</td>
                </tr>
                <tr>
                    <th><i class="fas fa-calendar-alt me-2 text-dark"></i>Fecha de Creación</th>
                    <td>{{ $school->created_at->format('d/m/Y') }}</td>
                </tr>
            </tbody>
        </table>

        <div class="text-center mt-4">
            <a href="{{ route('listado.colegios') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Volver al listado
            </a>
        </div>
    </div>
</div>
@endsection
