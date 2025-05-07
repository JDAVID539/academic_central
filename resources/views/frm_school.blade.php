@extends('layouts.app')

@section('content')
<div class="margen">
    <h1>Registrar Colegio</h1>
<br><br>
    <!-- Mostrar mensajes de éxito -->
    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <!-- Mostrar errores de validación -->
    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <link rel="stylesheet" href="public/css/style.css">

    <form action="{{ route('colegio.store') }}" method="POST">
        @csrf
    
        <label>
            Nombre del Colegio:
            <br>
            <input type="text" name="name" value="{{ old('name') }}" required>
        </label>     <label>
            Nombre Formal del Colegio:
            <br>
            <input type="text" name="name_school" value="{{ old('name_school') }}" required>
        </label>               <label>
            Dirección:
            <br>
            <input type="text" name="address" value="{{ old('address') }}" required>
        </label>     <label>
            Ciudad:
            <br>
            <input type="text" name="city" value="{{ old('city') }}" required>
        </label> 
        <br><br>
        <label>
            Correo Electrónico:
            <br>
            <input type="email" name="email" value="{{ old('email') }}" required>
        </label>     <label>
            Teléfono:
            <br>
            <input type="text" name="phone" value="{{ old('phone') }}" required>
        </label>     <label>
            Contraseña:
            <br>
            <input type="password" name="password" required>
        </label>     <label>
            Confirmar Contraseña:
            <br>
            <input type="password" name="password_confirmation" required>
        </label>
        <br><br>
    <center>
        <button type="submit" class="btn btn-primary">
            Registrar
        </button>
    </center>
</div>

@endsection