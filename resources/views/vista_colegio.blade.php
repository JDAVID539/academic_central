@extends('layouts.app_modulo')

@section('title', 'Dashboard') <!-- Título dinámico para la página -->

@section('content')
<div class="container">
    <br>
    <br>
    <h1>Bienvenido administrador</h1>

    <p>Aquí podrás registrar los cursos</p>
    <a href="{{route('courses.create')}}" class="btn btn-primary">Registrar Cursos</a>

    <p>Aquí se mostrarán los usuarios registrados</p>

    <!-- Lista de usuarios -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo Electrónico</th>
                <th>Rol</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $users)
                <tr>
                    <td>{{ $users->id }}</td>
                    <td>{{ $users->name }}</td>
                    <td>{{ $users->email }}</td>
                    <td>{{ $users->role->name ?? 'No tiene rol' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection