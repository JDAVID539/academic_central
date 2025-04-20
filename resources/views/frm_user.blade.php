<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuario</title>
</head>
<body>
    <h2>Registrar Usuario</h2>

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
            <input type="text" name="name" required>
        </label>
        <br><br>

        <label>
            Correo Electrónico:
            <br>
            <input type="email" name="email" required>
        </label>
        <br><br>

        <label>
            Contraseña:
            <br>
            <input type="password" name="password" required>
        </label>
        <br><br>

        <label>
            Rol:
            <br>
            <select name="rol" required>
                <option value="">Seleccione un rol</option>
                <option value="profesor">Profesor</option>
                <option value="aprendiz">Aprendiz</option>
            </select>
        </label>
        <br><br>

        <button type="submit">Registrar Usuario</button>
    </form>
</body>
</html>