@extends('layouts.app_moduloteacher')

@section('title', 'Perfil del Estudiante')

@section('content')

<div class="container mt-4">
  <div class="card mx-auto" style="max-width: 600px;">
    <div class="card-body text-center">
      @if($school)
        <h4 class="mb-3">{{ $school->name ?? 'Nombre de la Institución no disponible' }}</h4>
      @endif
      @if($profile && $profile->foto)
        <img src="{{ asset('uploads/' . $profile->foto) }}" alt="Foto del Estudiante" class="rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">
      @else
        <div class="bg-secondary rounded-circle mb-3 d-flex align-items-center justify-content-center mx-auto" style="width: 150px; height: 150px; color: white; font-size: 24px;">
          Sin Foto
        </div>
      @endif
      <h3>{{ Auth::user()->name }}</h3>
      <p>Teléfono: {{ $profile->phone ?? 'No disponible' }}</p>
      <p>Dirección: {{ $profile->address ?? 'No disponible' }}</p>
      <a href="{{ route('student.profile.edit') }}" class="btn btn-primary mt-3">
        {{ $profile && $profile->foto ? 'Editar Perfil' : 'Agregar Foto y Editar Perfil' }}
      </a>
    </div>
  </div>
</div>

@endsection
