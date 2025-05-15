@extends('layouts.app_moduloteacher')

@section('title', 'Perfil del Profesor')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/perfil_colegio.css') }}?v={{ time() }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
@endpush

@section('content')
<div class="container mt-5">
    <div class="card card-profile mx-auto p-5">
        <div class="text-center">
            <div class="badge-title mb-3">Docente</div>
            <h2 class="school-name">{{ Auth::user()->name }}</h2>

            @if($profile && $profile->foto)
                <img src="{{ asset('uploads/' . $profile->foto) }}" alt="Foto del Profesor" class="photo-circle mt-3 mb-4">
            @else
                <div class="photo-placeholder mt-3 mb-4">Sin Foto</div>
            @endif
        </div>

        <hr class="divider">

        <div class="info-section px-4">
            <h5 class="section-title">
                <i class="fas fa-address-card icon-section orange"></i>
                Información General
            </h5>
            <p class="info-item">
                <i class="fas fa-phone icon-info purple"></i>{{ $profile->phone ?? 'No disponible' }}
            </p>
            <p class="info-item">
                <i class="fas fa-map-marker-alt icon-info red"></i>{{ $profile->address ?? 'No disponible' }}
            </p>
        </div>

        @if($school)
        <div class="info-section px-4">
            <h5 class="section-title">
                <i class="fas fa-school icon-section blue"></i>
                Colegio Asociado
            </h5>
            <p class="info-item">
                {{ $school->name_school }}
            </p>
        </div>
        @endif

        <div class="text-center mt-4">
            <a href="{{ route('teacher.profile.edit') }}" class="btn btn-edit">
                {{ $profile && $profile->foto ? 'Editar Perfil' : 'Agregar Foto y Editar Perfil' }}
            </a>
        </div>
    </div>
</div>
@endsection
