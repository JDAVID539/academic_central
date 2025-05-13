@extends('layouts.app_modulosuperadmin')

@section('content')
<div class="container mt-4">
    <h2>Editar Perfil del Super Administrador</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('superadmin.updateProfile') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $superAdmin->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $superAdmin->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $superAdmin->phone) }}">
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $superAdmin->address) }}">
        </div>

        <div class="mb-3">
            <label for="city" class="form-label">Ciudad</label>
            <input type="text" class="form-control" id="city" name="city" value="{{ old('city', $superAdmin->city) }}">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Perfil</button>
        <a href="{{ route('superadmin.profile') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
