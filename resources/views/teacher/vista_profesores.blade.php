@extends('layouts.app_moduloteacher')

@section('title', 'Cursos Asignados')

@section('content')
<div class="row">
    @forelse ($courses as $course)
    <div class="col-md-4">
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">{{ $course->name }}</h5>
            </div>
            <div class="card-body">
                <p><strong>Descripción:</strong> {{ $course->description }}</p>
            </div>
        </div>
    </div>
    @empty
    <p class="text-center">No tienes cursos asignados.</p>
    @endforelse
</div>
@endsection
