@extends('layouts.app_modulo')

@section('title', 'Gestión de Usuarios')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Usuarios del Colegio</h2>
        <a href="{{ route('users.create') }}" class="btn btn-primary ">➕ Añadir Usuario</a>
    </div>

    {{-- Mensajes de éxito o error --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Tabla de usuarios --}}
    <div class="table-responsive shadow-sm rounded">
        <form action="{{ route('users.index') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="buscar" class="form-control" placeholder="Buscar por nombre o identificación..." value="{{ request('buscar') }}">
                <button class="btn btn-outline-primary" type="submit">Buscar</button>
            </div>
        </form>
        
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark text">
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Identificación</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->numero_de_identificacion }}</td>
                        <td>{{ $user->role->name ?? 'Sin rol' }}</td>
                        <td class="text-center">
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-outline-primary me-1">✏️editar </a>

                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                    onclick="return confirm('¿Estás seguro de eliminar este usuario?')">
                                    🗑️
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr class="text-center">
                        <td colspan="5">No hay usuarios registrados en este colegio.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection



       

