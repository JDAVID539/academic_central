<!-- filepath: c:\xampp\htdocs\academic_central\resources\views\user_details.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Usuario</h1>
    <table class="table table-bordered">
        <tr>
            <th>Nombre</th>
            <td>{{ $user->name }}</td>
        </tr>
        <tr>
            <th>Email</th>
            <td>{{ $user->email }}</td>
        </tr>
      
        <tr>
            <th>Rol</th>
            <td>{{ $user->role->name }}</td>
        </tr>
    </table>
</div>
@endsection