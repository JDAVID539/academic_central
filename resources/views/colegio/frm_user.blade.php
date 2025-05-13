@extends('layouts.app_modulo')

@section('title', 'Registro de Usuario')

@section('content')
<div class="formulario">
    

    <h2>Registro de Usuario</h2>

    @if (session('success'))
        <p class="alerta-exito">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <ul class="alerta-error">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <label>
            Nombre:
            <input type="text" name="name" value="{{ old('name') }}" required>
        </label>

        <label>
            Correo Electrónico:
            <input type="email" name="email" value="{{ old('email') }}" required>
        </label>

        <label>
            Número de Identificación:
            <input type="text" name="numero_de_identificacion" value="{{ old('numero_de_identificacion') }}" required>
        </label>

        <label>
            Contraseña:
            <input type="password" name="password" required>
        </label>

        <label>
            Confirmar Contraseña:
            <input type="password" name="password_confirmation" required>
        </label>

        <label>
            Rol:
            <select name="rol_id" required>
                <option value="">Seleccione un rol</option>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}" {{ old('rol_id') == $role->id ? 'selected' : '' }}>
                        {{ $role->name }}
                    </option>
                @endforeach
            </select>
        </label>

        <button type="submit" class="btn-registrar">Registrar Usuario</button>
    </form>
</div>
@endsection

