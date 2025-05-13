@extends('layouts.app_modulosuperadmin')

@section('content')
<div class="container mt-4">
    <h2>Detalle del Colegio</h2>

    <table class="table table-bordered">
        <tbody>
            <tr>
                <th>ID</th>
                <td>{{ $school->id }}</td>
            </tr>
            <tr>
                <th>Nombre</th>
                <td>{{ $school->name }}</td>
            </tr>
            <tr>
                <th>Nombre del Colegio</th>
                <td>{{ $school->name_school }}</td>
            </tr>
            <tr>
                <th>Dirección</th>
                <td>{{ $school->address }}</td>
            </tr>
            <tr>
                <th>Ciudad</th>
                <td>{{ $school->city }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $school->email }}</td>
            </tr>
            <tr>
                <th>Teléfono</th>
                <td>{{ $school->phone }}</td>
            </tr>
            <tr>
                <th>Fecha de Creación</th>
                <td>{{ $school->created_at->format('d/m/Y') }}</td>
            </tr>
        </tbody>
    </table>

    <a href="{{ route('listado.colegios') }}" class="btn btn-secondary">Volver al listado</a>
</div>
@endsection
