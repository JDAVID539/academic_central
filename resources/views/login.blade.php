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

    
    <form action="{{ route('login.submit') }}" method="POST">
        @csrf

        
        <label for="email">  Correo:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        <br><br>

       
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
        <br><br>

        
        <button type="submit">Iniciar Sesión</button>
    </form>
</center>
@endsection


