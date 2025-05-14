@extends('layouts.app_modulo')

@section('title', 'Perfil del Colegio')

@push('styles')
<link rel="stylesheet" href="{{ asset('css/perfil_colegio.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
@endpush

@section('content')
<div class="container mt-5">
    <div class="card card-profile mx-auto p-5">
        <div class="text-center">
            <div class="badge-title mb-3">Institución Educativa</div>
            <h2 class="school-name">{{ $school->name_school }}</h2>

            @if($school->photo)
                <img src="{{ asset('uploads/' . $school->photo) }}" alt="Foto del Colegio" class="photo-circle mt-3 mb-4">
            @else
                <div class="photo-placeholder mt-3 mb-4">Sin Foto</div>
            @endif
        </div>

        <hr class="divider">

        <div class="info-section px-4">
            <h5 class="section-title">
                <i class="fas fa-building icon-section orange"></i>
                Información General
            </h5>
            <p class="info-item"><i class="fas fa-map-marker-alt icon-info red"></i>{{ $school->address }}, {{ $school->city }}</p>
        </div>

        <div class="info-section px-4">
            <h5 class="section-title">
                <i class="fas fa-address-book icon-section blue"></i>
                Contacto
            </h5>
            <p class="info-item"><i class="fas fa-envelope icon-info green"></i>{{ $school->email }}</p>
            <p class="info-item"><i class="fas fa-phone icon-info purple"></i>{{ $school->phone }}</p>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('school.edit') }}" class="btn btn-edit">
                {{ $school->photo ? 'Editar Perfil' : 'Agregar Foto y Editar Perfil' }}
            </a>
        </div>
    </div>
</div>
@endsection
