<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Curso</title>
</head>
<body>
    <h2>Registrar Curso</h2>

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

    <form action="{{ route('courses.store') }}" method="POST">
        @csrf

        <label>
            Nombre del curso:
            <br>
            <input type="text" name="name_course" required> <!-- Cambiado a 'name_course' -->
        </label>
        <br><br>

        <label>
            Descripción del curso:
            <br>
            <textarea name="description_course" rows="4" required></textarea> <!-- Cambiado a 'description_course' -->
        </label>
        <br><br>

        <button type="submit">Registrar Curso</button>
    </form>
</body>
</html>