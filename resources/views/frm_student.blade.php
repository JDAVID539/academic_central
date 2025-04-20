<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Estudiante</title>
</head>
<body>
    <h2>Registrar Estudiante</h2>

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

    <form action="{{ route('students.store') }}" method="POST">
        @csrf

        <label>
            Seleccione un usuario:
            <br>
            <select name="user_id" required>
                <option value="">Seleccione un usuario</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </label>
        <br><br>

        <label>
            Seleccione un curso:
            <br>
            <select name="course_id" required>
                <option value="">Seleccione un curso</option>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name_course }}</option>
                @endforeach
            </select>
        </label>
        <br><br>

        <label>
            Seleccione un profesor asignado:
            <br>
            <select name="teacher_assigned_id" required>
                <option value="">Seleccione un profesor</option>
                @foreach ($teachers as $teacher)
                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                @endforeach
            </select>
        </label>
        <br><br>

        <button type="submit">Registrar Estudiante</button>
    </form>
</body>
</html>
