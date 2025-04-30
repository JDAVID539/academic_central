<!-- filepath: c:\xampp\htdocs\academic_central\resources\views\vista_admin.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Panel de Administración</h1>
    <p>Bienvenido al panel de administración. Aquí puedes gestionar los recursos del sistema.</p>

    <!-- Ejemplo de tabla -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Usuarios Registrados</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Juan Pérez</td>
                        <td>juan@example.com</td>
                        <td>Administrador</td>
                        <td>
                            <button class="btn btn-primary btn-sm">Editar</button>
                            <button class="btn btn-danger btn-sm">Eliminar</button>
                        </td>
                    </tr>
                    <!-- Agrega más filas según sea necesario -->
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection