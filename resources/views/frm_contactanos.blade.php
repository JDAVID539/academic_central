@extends('layouts.app')

@section('content')
<div class="full-screen-container">
    <div class="form-box">
        <h1 class="form-title text-center">Contáctanos</h1>

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

        <form action="{{ route('contact.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="email" class="form-label">Correo</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" class="form-control" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="phone" class="form-label">Teléfono</label>
                    <input type="text" name="phone" class="form-control" required>
                </div>

                <div class="col-md-12 mb-3">
                    <label for="message" class="form-label">Mensaje</label>
                    <textarea name="message" rows="4" class="form-control" required></textarea>
                </div>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </div>
</div>

@endsection

@section('styles')
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
        background: rgba(255, 255, 255, 0.9);
        padding: 40px;
        border-radius: 20px;
        max-width: 900px;
        width: 100%;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
    }

    .form-title {
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
@endsection
