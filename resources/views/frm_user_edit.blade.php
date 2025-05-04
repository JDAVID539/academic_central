@extends('layouts.app_modulo')

@section('title', 'Editar Usuario')

@section('content')
<div class="container mt-4">
    <h2>Editar usuario</h2>
<h3>Información del Usuario</h3>
    <form method="POST" action="{{ route('users.update', $user->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nombre</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <div class="mb-3">
            <label>Número de Identificación</label>
            <input type="text" name="numero_de_identificacion" class="form-control" value="{{ $user->numero_de_identificacion }}" required>
        </div>

        <div class="mb-3">
            <label>Rol</label>
            <select name="rol_id" class="form-control" required>
                @foreach ($roles as $rol)
                    <option value="{{ $rol->id }}" {{ $rol->id == $user->rol_id ? 'selected' : '' }}>
                        {{ $rol->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Nueva Contraseña (opcional)</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="mb-3">
            <label>Confirmar Contraseña</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
