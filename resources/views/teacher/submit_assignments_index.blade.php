@extends('layouts.app_moduloteacher')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
@endpush

@section('content')
<br><br>

<div class="container mt-4">
    <div class="card shadow-lg">
        <div class="card-body">
            <h3 class="card-title text-center text-success mb-4">
                <i class="fas fa-file-alt me-2"></i>Entregas de Trabajos: {{ $task->title ?? $task->name }}
            </h3>

            @if($submissions->count())
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th><i class="fas fa-user-graduate me-1 text-primary"></i>Estudiante</th>
                                <th><i class="fas fa-calendar-alt me-1 text-info"></i>Fecha de Entrega</th>
                                <th><i class="fas fa-file-download me-1 text-warning"></i>Archivo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($submissions as $submission)
                                <tr>
                                    <td>{{ $submission->student->user->name ?? 'Nombre no disponible' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($submission->delivery_date)->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <a href="{{ asset('storage/' . $submission->file_path) }}" target="_blank" class="btn btn-sm btn-outline-dark">
                                            <i class="fas fa-eye me-1"></i>Ver archivo
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-warning text-center mt-4">
                    <i class="fas fa-exclamation-circle me-2"></i>No hay entregas para esta tarea aún.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
