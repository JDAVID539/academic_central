@extends('layouts.app_moduloteacher')

@section('title', 'Cursos Asignados')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Cursos Asignados</h1>

    <div class="row">
        @foreach ($courses as $course)
        <div class="col-md-4">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">{{ $course->name ?? 'Sin nombre' }}</h5>
                </div>
                <div class="card-body">
                    <p><strong>Descripción:</strong> {{ $course->description ?? 'Sin descripción' }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
