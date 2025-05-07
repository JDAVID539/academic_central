@extends('layouts.app_modulo')

@section('title', 'Usuarios por Rol')

@section('content')
<div class="d-flex justify-content-center align-items-center flex-column mt-5">
    <h2 class="fw-bold mb-4 text-center">Usuarios con el rol: <span class="text-dark">{{ $role }}</span></h2>

    <div class="table-responsive shadow rounded" style="max-width: 800px;">
        <table class="table table-bordered table-hover text-center align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th><i class="bi bi-person-fill text-primary me-2"></i>Nombre</th>
                    <th><i class="bi bi-envelope-fill text-info me-2"></i>Correo electrónico</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="2" class="text-muted">No hay usuarios registrados con este rol.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
