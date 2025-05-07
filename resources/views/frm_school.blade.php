@extends('layouts.app')

@section('content')

<style>
    body {
        background: url('{{ asset('images/fondo.jpg') }}') no-repeat center center fixed;
        background-size: cover;
        margin: 0;
        padding: 0;
    }

    .full-screen-container {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 20px;
    }

    .form-box {
        background: #ffffffee;
        padding: 40px;
        border-radius: 20px;
        max-width: 900px;
        width: 100%;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
    }

    .form-title {
        text-align: center;
        margin-bottom: 30px;
        font-size: 28px;
        font-weight: bold;
    }

    .form-label {
        font-weight: 600;
    }

    .form-control {
        border-radius: 10px;
        padding: 12px;
    }

    .btn-primary {
        background-color: #ff6600;
        border: none;
        padding: 12px;
        font-weight: bold;
        border-radius: 10px;
        width: 100%;
    }

    .btn-primary:hover {
        background-color: #e65c00;
    }

    .alert {
        font-size: 14px;
    }
</style>

<div class="full-screen-container">
    <div class="form-box">
        <h1 class="form-title">Registrar Colegio</h1>

        <!-- Éxito -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Errores -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('colegio.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Nombre del Colegio</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="name_school" class="form-label">Nombre Formal del Colegio</label>
                    <input type="text" name="name_school" id="name_school" class="form-control" value="{{ old('name_school') }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="address" class="form-label">Dirección</label>
                    <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="city" class="form-label">Ciudad</label>
                    <input type="text" name="city" id="city" class="form-control" value="{{ old('city') }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="phone" class="form-label">Teléfono</label>
                    <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone') }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>

                <div class="col-md-6 mb-4">
                    <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                </div>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Registrar Colegio</button>
            </div>
        </form>
    </div>
</div>

@endsection

