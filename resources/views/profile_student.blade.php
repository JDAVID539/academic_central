@extends('layouts.app_moduloestudent')

@section('title', 'Perfil del Estudiante')



@section('content')
<div class="container mt-5">
    <div class="card card-profile mx-auto p-5" style="max-width: 650px;">
        <div class="text-center">
            <div class="badge-title mb-3">Estudiante</div>
            <h2 class="school-name">{{ Auth::user()->name }}</h2>

            @if($profile && $profile->foto)
                <img src="{{ asset('uploads/' . $profile->foto) }}" alt="Foto del Estudiante" class="photo-circle mt-3 mb-4">
            @else
                <div class="photo-placeholder mt-3 mb-4">Sin Foto</div>
            @endif
        </div>

        <hr class="divider">

        <div class="info-section px-4">
            <h5 class="section-title">
                <i class="fas fa-user-graduate icon-section orange"></i>
                Información Personal
            </h5>
            <p class="info-item">
                <i class="fas fa-phone icon-info purple"></i> {{ $profile->phone ?? 'No disponible' }}
            </p>
            <p class="info-item">
                <i class="fas fa-map-marker-alt icon-info red"></i> {{ $profile->address ?? 'No disponible' }}
            </p>
        </div>

        @if($school)
        <div class="info-section px-4">
            <h5 class="section-title">
                <i class="fas fa-school icon-section blue"></i>
                Institución Asociada
            </h5>
            <p class="info-item">
                {{ $school->name }}
            </p>
        </div>
        @endif

        <div class="text-center mt-4">
            <a href="{{ route('profile_edit') }}" class="btn btn-edit">
                <i class="fas fa-user-edit me-2"></i>
                {{ $profile && $profile->foto ? 'Editar Perfil' : 'Agregar Foto y Editar Perfil' }}
            </a>
        </div>
    </div>
</div>
@endsection
