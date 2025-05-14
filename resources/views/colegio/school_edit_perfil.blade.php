@extends('layouts.app_modulo')

@section('title', 'Editar Perfil del Colegio')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/editar_colegio.css') }}">@endpush

@section('content')
<div class="container mt-5">
  <div class="card mx-auto p-4" style="max-width: 600px;">
    <div class="card-body">
      <h1 class="card-title text-center mb-4">Editar Perfil del Colegio</h1>

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
              <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-school"></i></span>
                  <input type="text" name="name_school" id="name_school" class="form-control" value="{{ old('name_school', $school->name_school) }}" required>
              </div>
          </div>

          <div class="mb-3">
              <label for="address" class="form-label">Dirección</label>
              <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                  <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $school->address) }}" required>
              </div>
          </div>

          <div class="mb-3">
              <label for="city" class="form-label">Ciudad</label>
              <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-city"></i></span>
                  <input type="text" name="city" id="city" class="form-control" value="{{ old('city', $school->city) }}" required>
              </div>
          </div>

          <div class="mb-3">
              <label for="email" class="form-label">Correo Electrónico</label>
              <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                  <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $school->email) }}" required>
              </div>
          </div>

          <div class="mb-3">
              <label for="phone" class="form-label">Teléfono</label>
              <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                  <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $school->phone) }}" required>
              </div>
          </div>

          <div class="mb-3">
              <label for="photo" class="form-label">Foto del Colegio</label>
              <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-image"></i></span>
                  <input type="file" name="photo" id="photo" class="form-control" accept="image/*">
              </div>
              @if($school->photo)
                  <img src="{{ asset('uploads/' . $school->photo) }}" alt="Foto actual" class="img-thumbnail mt-2" style="max-width: 150px;">
              @endif
          </div>

          <button type="submit" class="btn btn-primary w-100 mt-2">
              <i class="fas fa-save me-2"></i>Guardar Cambios
          </button>
          <a href="{{ route('profile.colegio') }}" class="btn btn-secondary w-100 mt-3">
              <i class="fas fa-arrow-left me-2"></i>Volver
          </a>
      </form>
    </div>
  </div>
</div>
@endsection
