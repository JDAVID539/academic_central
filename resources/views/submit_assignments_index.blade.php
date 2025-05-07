@extends('layouts.app_moduloteacher')

@section('content')
<br>
<br>

    <h3>Entregas de trabajos: {{ $task->title ?? $task->name }}</h3>

    @if($submissions->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Estudiante</th>
                    <th>Fecha de entrega</th>
                    <th>Archivo</th>
                </tr>
            </thead>
            <tbody>
                @foreach($submissions as $submission)
                    <tr>
                        <td>{{ $submission->student->user->name ?? 'Nombre no disponible' }}</td>
                        <td>{{ \Carbon\Carbon::parse($submission->delivery_date)->format('d/m/Y H:i') }}</td>
                        <td>
                            <a href="{{ asset('storage/' . $submission->file_path) }}" target="_blank">Ver archivo</a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay entregas para esta tarea aún.</p>
    @endif
@endsection
