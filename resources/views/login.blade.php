@extends('layouts.app')
<center>
@section('content')
    <h1>Iniciar Sesión</h1>

    
    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <style>
        h1 {
            color: rgb(20, 20, 143);
        }
    </style>
    
    <form action="{{ route('login.submit') }}" method="POST">
        @csrf
    
        <label for="email">Correo:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        <br><br>
    
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <br><br>
    
        <label for="type">Tipo de Usuario y Rol:</label>
        <select id="type" name="type" required>
            <option value="user_estudiante">Usuario Regular - Estudiante</option>
            <option value="user_profesor">Usuario Regular - Profesor</option>
            <option value="user_moderador">Usuario Regular - Moderador</option>
            <option value="school">Colegio</option>
        </select>
        <br><br>
    
        <button type="submit">Iniciar Sesión</button>
    </form>
</center>
@endsection


