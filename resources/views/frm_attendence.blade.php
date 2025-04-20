<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Asistencia</title>
</head>
<body>
    <h2>Registrar Asistencia</h2>

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

    <form action="{{ route('asistencia.store') }}" method="POST">
        @csrf

        <label>
            Ingrese fecha de asistencia:
            <br>
            <input type="date" name="attendance_date" required>
        </label>
        <br><br>

        <label>
            Seleccione un estudiante:
            <br>
            <select name="id_student" required>
                <option value="">Seleccione un estudiante</option>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
        </label>
        <br><br>

        <label>
            Ingrese si está presente:
            <br>
            <input type="radio" name="present" value="1" required> Presente
            <input type="radio" name="present" value="0" required> Ausente
        </label>
        <br><br>

        <button type="submit">Registrar Asistencia</button>
    </form>
</body>
</html>