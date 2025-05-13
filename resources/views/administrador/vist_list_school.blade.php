@extends('layouts.app_modulosuperadmin')

@section('content')
<div class="container mt-4">
    <h2>Listado de Colegios</h2>

    <form method="GET" action="{{ route('listado.colegios') }}" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Buscar por nombre del colegio" value="{{ $query ?? '' }}">
            <button class="btn btn-outline-secondary" type="submit">Buscar</button>
        </div>
    </form>

    <a href="{{ route('colegiio.create') }}" class="btn btn-primary mb-3">Añadir Colegio</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Nombre del Colegio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($schools as $school)
            <tr>
                <td>{{ $school->id }}</td>
                <td>{{ $school->name }}</td>
                <td>{{ $school->name_school }}</td>
                <td>
                    <a href="{{ route('colegio.editar', $school->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <a href="{{ route('school.detail', $school->id) }}" class="btn btn-sm btn-info">Ver Más</a>
                    <form action="{{ route('colegio.eliminar', $school->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este colegio?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
