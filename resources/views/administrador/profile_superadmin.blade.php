@extends('layouts.app_modulosuperadmin')

@section('content')
<div class="container mt-4">
    <h2>Perfil del Super Administrador</h2>

    <table class="table table-bordered">
        <tbody>
            <tr>
                <th>Nombre</th>
                <td>{{ $superAdmin->name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $superAdmin->email }}</td>
            </tr>
            <tr>
                <th>Teléfono</th>
                <td>{{ $superAdmin->phone ?? 'No especificado' }}</td>
            </tr>
            <tr>
                <th>Dirección</th>
                <td>{{ $superAdmin->address ?? 'No especificado' }}</td>
            </tr>
            <tr>
                <th>Ciudad</th>
                <td>{{ $superAdmin->city ?? 'No especificado' }}</td>
            </tr>
            <tr>
                <th>Colegio Asociado</th>
                <td>{{ $superAdmin->school ? $superAdmin->school->name_school : 'No asignado' }}</td>
            </tr>
        </tbody>
    </table>

    <a href="{{ route('superadmin.editProfile') }}" class="btn btn-primary mt-3">Editar Perfil</a>
</div>
@endsection
