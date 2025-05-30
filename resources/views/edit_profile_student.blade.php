@extends('layouts.app_moduloestudent')

@section('title', 'Editar Perfil del Estudiante')

@section('content')

<div class="container mt-4">
  <div class="card mx-auto" style="max-width: 600px;">
    <div class="card-body">
      <h1 class="card-title mb-4 text-center">Editar Perfil del Estudiante</h1>

      @if(session('success'))
          <div class="alert alert-success">
              {{ session('success') }}
          </div>
      @endif

      <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <div class="mb-3">
              <label for="phone" class="form-label">Teléfono</label>
              <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $profile->phone) }}">
          </div>

          <div class="mb-3">
              <label for="address" class="form-label">Dirección</label>
              <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $profile->address) }}">
          </div>

          <div class="mb-3">
              <label for="photo" class="form-label">Foto del Estudiante</label>
              <input type="file" name="photo" id="photo" class="form-control" accept="image/*">
              @if(!empty($profile) && !empty($profile->foto))
                  <img src="{{ asset('uploads/' . $profile->foto) }}" alt="Foto actual" class="img-thumbnail mt-2" style="max-width: 150px;">
              @endif
          </div>

          <button type="submit" class="btn btn-primary w-100">Guardar Cambios</button>
          <button><a href="{{ route('profile_student') }}" class="btn btn-primary w-100 ">Cancelar</button>
      </form>
    </div>
  </div>
</div>

@endsection