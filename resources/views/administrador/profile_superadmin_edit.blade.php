@extends('layouts.app_modulosuperadmin')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/perfil_superadmin.css') }}?v={{ time() }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
@endpush

@section('content')
<div class="container mt-5">
    <div class="card mx-auto p-4 shadow-lg card-profile" style="max-width: 600px;">
        <div class="text-center mb-4">
            <h2 class="title-header"><i class="fas fa-user-edit me-2"></i>Editar Perfil del Super Administrador</h2>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li><i class="fas fa-exclamation-circle me-1 text-danger"></i>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('superadmin.updateProfile') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label"><i class="fas fa-user me-2 text-primary"></i>Nombre</label>
                <input type="text" class="form-control" id="name" name="name"
                    value="{{ old('name', $superAdmin->name) }}" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label"><i class="fas fa-envelope me-2 text-danger"></i>Correo Electrónico</label>
                <input type="email" class="form-control" id="email" name="email"
                    value="{{ old('email', $superAdmin->email) }}" required>
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label"><i class="fas fa-phone me-2 text-success"></i>Teléfono</label>
                <input type="text" class="form-control" id="phone" name="phone"
                    value="{{ old('phone', $superAdmin->phone) }}">
            </div>

            <div class="mb-3">
                <label for="address" class="form-label"><i class="fas fa-map-marker-alt me-2 text-warning"></i>Dirección</label>
                <input type="text" class="form-control" id="address" name="address"
                    value="{{ old('address', $superAdmin->address) }}">
            </div>

            <div class="mb-3">
                <label for="city" class="form-label"><i class="fas fa-city me-2 text-info"></i>Ciudad</label>
                <input type="text" class="form-control" id="city" name="city"
                    value="{{ old('city', $superAdmin->city) }}">
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-edit"><i class="fas fa-save me-2"></i>Actualizar Perfil</button>
                <a href="{{ route('superadmin.profile') }}" class="btn btn-secondary"><i class="fas fa-arrow-left me-2"></i>Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
