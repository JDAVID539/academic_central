@extends('layouts.app_modulo')

@section('title', 'Editar Perfil del Colegio')

@section('content')

<br>
<br>
<div class="container mt-4">
  <div class="card mx-auto" style="max-width: 600px;">
    <div class="card-body">
      <h1 class="card-title mb-4 text-center">Editar Perfil del Colegio</h1>

      @if(session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
      @endif

      <form action="{{ route('school.update') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="mb-3">
              <label for="name_school" class="form-label">Nombre del Colegio</label>
              <input type="text" name="name_school" id="name_school" class="form-control" value="{{ old('name_school', $school->name_school) }}" required>
          </div>

          <div class="mb-3">
              <label for="address" class="form-label">Dirección</label>
              <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $school->address) }}" required>
          </div>

          <div class="mb-3">
              <label for="city" class="form-label">Ciudad</label>
              <input type="text" name="city" id="city" class="form-control" value="{{ old('city', $school->city) }}" required>
          </div>

          <div class="mb-3">
              <label for="email" class="form-label">Correo Electrónico</label>
              <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $school->email) }}" required>
          </div>

          <div class="mb-3">
              <label for="phone" class="form-label">Teléfono</label>
              <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $school->phone) }}" required>
          </div>

          <div class="mb-3">
              <label for="photo" class="form-label">Foto del Colegio</label>
              <input type="file" name="photo" id="photo" class="form-control" accept="image/*">
              @if($school->photo)
                  <img src="{{ asset('uploads/' . $school->photo) }}" alt="Foto actual" class="img-thumbnail mt-2" style="max-width: 150px;">
              @endif
          </div>

          <button type="submit" class="btn btn-primary w-100">Guardar Cambios</button>
          <a href="{{ route('profile.colegio') }}" class="btn btn-secondary w-100 mt-3">volver</a>

      </form>
    </div>
  </div>
</div>

@endsection
