@extends('layouts.app_modulo')

@section('title', 'Registro de Usuario')

@section('content')
<div class="margen">
    <center>
        <h2>Registro de Usuario</h2>

        @if (session('success'))
            <p style="color: green">{{ session('success') }}</p>
        @endif

        @if ($errors->any())
            <ul style="color: red;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <label>
                Nombre:
                <br>
                <input type="text" name="name" value="{{ old('name') }}" required>
            </label>
            <br><br>

            <label>
                Correo Electrónico:
                <br>
                <input type="email" name="email" value="{{ old('email') }}" required>
            </label>
            <br><br>

            <label>
                Número de Identificación:
                <br>
                <input type="text" name="numero_de_identificacion" value="{{ old('numero_de_identificacion') }}" required>
            </label>
            <br><br>

            
            <label>
                Contraseña:
                <br>
                <input type="password" name="password" required>
            </label>
            <br><br>

            <label>
                Confirmar Contraseña:
                <br>
                <input type="password" name="password_confirmation" required>
            </label>
            <br><br>

            <label>
                Rol:
                <br>
                <select name="rol_id" required>
                    <option value="">Seleccione un rol</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" {{ old('rol_id') == $role->id ? 'selected' : '' }}>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
            </label>
            <br><br>

            <button type="submit">Registrar Usuario</button>
        </form>
    </center>
</div>
@endsection
