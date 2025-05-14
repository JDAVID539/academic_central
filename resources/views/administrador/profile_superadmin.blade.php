@extends('layouts.app_modulosuperadmin')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/perfil_superadmin.css') }}?v={{ time() }}">
<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
@endpush

@section('content')
<div class="container mt-5">
    <div class="card mx-auto p-4 shadow-lg card-profile" style="max-width: 600px;">
        <div class="text-center mb-4">
            <h2 class="title-header"><i class="fas fa-user-shield me-2"></i>Perfil del Super Administrador</h2>
        </div>

        <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex align-items-center">
                <i class="fas fa-user fa-fw text-primary me-3"></i>
                <strong>Nombre:</strong> <span class="ms-auto">{{ $superAdmin->name }}</span>
            </li>
            <li class="list-group-item d-flex align-items-center">
                <i class="fas fa-envelope fa-fw text-danger me-3"></i>
                <strong>Email:</strong> <span class="ms-auto">{{ $superAdmin->email }}</span>
            </li>
            <li class="list-group-item d-flex align-items-center">
                <i class="fas fa-phone fa-fw text-success me-3"></i>
                <strong>Teléfono:</strong> <span class="ms-auto">{{ $superAdmin->phone ?? 'No especificado' }}</span>
            </li>
            <li class="list-group-item d-flex align-items-center">
                <i class="fas fa-map-marker-alt fa-fw text-warning me-3"></i>
                <strong>Dirección:</strong> <span class="ms-auto">{{ $superAdmin->address ?? 'No especificado' }}</span>
            </li>
            <li class="list-group-item d-flex align-items-center">
                <i class="fas fa-city fa-fw text-info me-3"></i>
                <strong>Ciudad:</strong> <span class="ms-auto">{{ $superAdmin->city ?? 'No especificado' }}</span>
            </li>
            <li class="list-group-item d-flex align-items-center">
                <i class="fas fa-school fa-fw text-secondary me-3"></i>
                <strong>Colegio Asociado:</strong> <span class="ms-auto">{{ $superAdmin->school ? $superAdmin->school->name_school : 'No asignado' }}</span>
            </li>
        </ul>

        <div class="text-center mt-4">
            <a href="{{ route('superadmin.editProfile') }}" class="btn btn-edit px-4">
                <i class="fas fa-edit me-2"></i>Editar Perfil
            </a>
        </div>
    </div>
</div>
@endsection
