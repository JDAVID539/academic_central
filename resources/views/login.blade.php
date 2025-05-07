@extends('layouts.app')

@section('content')

<!-- Estilos personalizados -->
<style>
    body {
        background: url('{{ asset('images/fondo.jpg') }}') no-repeat center center fixed;
        background-size: cover;
    }

    .card {
        background-color: rgba(255, 255, 255, 0.95); /* Fondo blanco con transparencia */
        border: none;
        border-radius: 16px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
    }

    .form-lab {
        font-weight: 600;
        color: #333;
    }

    .form-control,
    .form-select {
        border-radius: 10px;
        padding: 12px;
        border: 1px solid #ccc;
        transition: all 0.3s ease;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #ff6600;
        box-shadow: 0 0 0 0.2rem rgba(255, 102, 0, 0.25);
    }

    .btn-primary {
        background-color: #ff6600;
        border-color: #ff6600;
        font-weight: bold;
        border-radius: 10px;
        padding: 12px;
    }

    .btn-primary:hover {
        background-color: #e65c00;
        border-color: #e65c00;
    }
</style>


<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card shadow p-4" style="width: 100%; max-width: 600px;">
        <!-- Logo / Título -->
        <div class="text-center mb-4">
            <img src="{{ asset('images/logo2.png') }}" width="200" alt="Logo de ACADEMICENTRAL">
            <p class="text-muted">Inicia sesión para continuar</p>
        </div>

        <!-- Mostrar errores -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario -->
        <form action="{{ route('login.submit') }}" method="POST">
            @csrf

            <!-- Correo -->
            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="ejemplo@correo.com" value="{{ old('email') }}" required>
            </div>

            <!-- Contraseña -->
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="********" required>
            </div>

            <!-- Tipo de usuario -->
            <div class="mb-4">
                <label for="type" class="form-label">Tipo de usuario</label>
                <select name="type" id="type" class="form-select" required>
                    <option value="user_estudiante">Estudiante</option>
                    <option value="user_profesor">Profesor</option>
                    <option value="user_moderador">Moderador</option>
                    <option value="school">Colegio</option>
                </select>
            </div>

            <!-- Botón -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg">Iniciar Sesión</button>
            </div>
        </form>
    </div>
</div>
@endsection


   


