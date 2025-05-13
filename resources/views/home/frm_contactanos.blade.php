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

