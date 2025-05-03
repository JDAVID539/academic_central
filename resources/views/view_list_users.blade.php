@extends('layouts.app_modulo')

@section('title', 'Dashboard')

@section('content')
<br>
<div class="container mt-4">
    <h2 class="mb-4">Usuarios del Colegio</h2>

    <!-- Botón para abrir modal de agregar nuevo usuario -->
    <a href="{{ route('users.create') }}" class="btn btn-success mb-3">
        Añadir Nuevo Usuario
    </a>

    <!-- Mensajes de éxito o error -->
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <!-- Tabla de usuarios -->
    <table class="table table-striped">
        <thead>
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
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary">Editar</a>

                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Estás seguro de eliminar este usuario?')" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">No hay usuarios registrados en este colegio.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection


       

