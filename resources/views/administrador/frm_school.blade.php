@extends('layouts.app_modulosuperadmin')

@section('content')

<link rel="stylesheet" href="{{ asset('css/school.css') }}">

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