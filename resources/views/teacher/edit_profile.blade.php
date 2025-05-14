@extends('layouts.app_moduloteacher')

@section('title', 'Editar Perfil del Profesor')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/perfil_teacher.css') }}?v={{ time() }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
@endpush

@section('content')
<br><br>

<div class="container mt-5">
  <div class="card mx-auto shadow-lg card-profile" style="max-width: 600px;">
    <div class="card-body">
      <h1 class="card-title text-center text-teacher"><i class="fas fa-user-edit me-2"></i>Editar Perfil del Profesor</h1>

      @if(session('success'))
          <div class="alert alert-success mt-3">
              <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
          </div>
      @endif

      <form action="{{ route('teacher.profile.update') }}" method="POST" enctype="multipart/form-data" class="mt-4">
          @csrf
          @method('PUT')

          <div class="mb-3">
              <label for="phone" class="form-label"><i class="fas fa-phone me-2 text-primary"></i>Teléfono</label>
              <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $profile->phone) }}">
          </div>

          <div class="mb-3">
              <label for="address" class="form-label"><i class="fas fa-map-marker-alt me-2 text-danger"></i>Dirección</label>
              <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $profile->address) }}">
          </div>

          <div class="mb-3">
              <label for="photo" class="form-label"><i class="fas fa-camera me-2 text-secondary"></i>Foto del Profesor</label>
              <input type="file" name="photo" id="photo" class="form-control" accept="image/*">
              @if(!empty($profile) && !empty($profile->foto))
                  <div class="text-center mt-3">
                      <img src="{{ asset('uploads/' . $profile->foto) }}" alt="Foto actual" class="img-thumbnail" style="max-width: 150px;">
                  </div>
              @endif
          </div>

          <button type="submit" class="btn btn-primary w-100 mt-3">
              <i class="fas fa-save me-2"></i>Guardar Cambios
          </button>
          <a href="{{ route('teacher.profile') }}" class="btn btn-secondary w-100 mt-2">
              <i class="fas fa-times-circle me-2"></i>Cancelar
          </a>
      </form>
    </div>
  </div>
</div>
@endsection

