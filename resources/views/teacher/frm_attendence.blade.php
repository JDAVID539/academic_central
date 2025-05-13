@extends('layouts.app_moduloteacher')

@section('content')
<br>
<br>
<h1>asistencia</h1>
<form action="{{ route('teacher.subjects.storeAttendance', $subject->id) }}" method="POST">
    @csrf
    <label for="attendance_date">Fecha de asistencia:</label>
    <input type="date" name="attendance_date" id="attendance_date" required>

    <table>
        <thead>
            <tr>
                <th>Estudiante</th>
                <th>Presente</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $index => $student)
            <tr>
                <td>{{ $student->user->name }}</td>
                <td>
                    <input type="hidden" name="attendance[{{ $index }}][student_id]" value="{{ $student->id }}">
                    <input type="checkbox" name="attendance[{{ $index }}][present]" value="1">
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <button type="submit">Guardar asistencia</button>
</form>
<a href="{{ route('teacher.subjects.attendanceHistory', $subject->id) }}" class="btn btn-info mt-3">Ver toda la asistencia</a>


@endsection