@extends('layouts.app_modulo')

@section('title', 'Dashboard') <!-- Título dinámico para la página -->

@section('content')
<div class="container">
    <br>
    <br>
    <h1>Bienvenido administrador</h1>
 
    <a href="{{ route('users.index') }}" class="btn btn-primary">Ver Usuarios</a>

    

    
    <div id="usuariosTable">

        <!-- Verificar si hay usuarios -->
        @if($users->isEmpty())
            <p>No hay usuarios registrados en esta escuela.</p>
        @else
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
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role->name ?? 'No tiene rol' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>

<script>
    document.getElementById('verUsuariosBtn').addEventListener('click', function() {
        var table = document.getElementById('usuariosTable');
        var isTableVisible = table.style.display === 'block';
        
        if (isTableVisible) {
            table.style.display = 'none';  // Oculta la tabla
        } else {
            table.style.display = 'block';  // Muestra la tabla
        }
    });
</script>

@endsection


