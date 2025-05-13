@extends('layouts.app_modulosuperadmin')

@section('content')
<div class="container mt-4">
    <h2>Editar Colegio</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('colegio.actualizar', $school->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $school->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="name_school" class="form-label">Nombre del Colegio</label>
            <input type="text" class="form-control" id="name_school" name="name_school" value="{{ old('name_school', $school->name_school) }}" required>
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $school->address) }}" required>
        </div>

        <div class="mb-3">
            <label for="city" class="form-label">Ciudad</label>
            <input type="text" class="form-control" id="city" name="city" value="{{ old('city', $school->city) }}" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $school->email) }}" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $school->phone) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Colegio</button>
        <a href="{{ route('listado.colegios') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
