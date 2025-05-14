{{-- filepath: c:\xampp\htdocs\academic_central\resources\views\estudiante\vista_estudiante.blade.php --}}
@extends('layouts.app_moduloestudent')

@section('title', 'academic_central') <!-- Título dinámico para la página -->

@section('content')

<div class="container mt-5">
    <h1 class="text-center mb-4">Bienvenido al módulo estudiante</h1>

    <div class="card shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Materias Registradas</h4>
        </div>
        <div class="card-body">
            <p><strong>Total de Materias:</strong> {{ $subjects->count() }}</p>
            <ul>
                @foreach ($subjects as $subject)
                <li>{{ $subject->name }}</li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="card shadow-sm mb-4">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Perfil del Estudiante</h4>
        </div>
        <div class="card-body">
            <p><strong>Nombre:</strong> {{ Auth::user()->name }}</p>
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
            <a href="{{ route('profile_student') }}" class="btn btn-primary">Ver Perfil Completo</a>
        </div>
    </div>
</div>

@endsection