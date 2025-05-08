@extends('layouts.app_modulo')

@section('title', 'Perfil del Colegio')

@section('content')
<br>
<br>


<div class="container mt-4">
  <div class="card mx-auto" style="max-width: 600px;">
    <div class="card-body text-center">
      @if($school->photo)
        <img src="{{ asset('uploads/' . $school->photo) }}" alt="Foto del Colegio" class="rounded-circle mb-3" style="width: 150px; height: 150px; object-fit: cover;">
      @else
        <div class="bg-secondary rounded-circle mb-3 d-flex align-items-center justify-content-center mx-auto" style="width: 150px; height: 150px; color: white; font-size: 24px;">
          Sin Foto
        </div>
      @endif
      <h3>{{ $school->name_school }}</h3>
      <p>{{ $school->address }}, {{ $school->city }}</p>
      <p>Email: {{ $school->email }}</p>
      <p>Teléfono: {{ $school->phone }}</p>
      <a href="{{ route('school.edit') }}" class="btn btn-primary mt-3">
        {{ $school->photo ? 'Editar Perfil' : 'Agregar Foto y Editar Perfil' }}
      </a>
    </div>
  </div>
</div>

@endsection
