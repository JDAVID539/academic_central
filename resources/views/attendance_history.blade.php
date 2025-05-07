@extends('layouts.app_moduloteacher')

@section('content')
<div class="container mt-4">
    <h3>Historial de Asistencia - {{ $subject->name_subject }}</h3>

    <!-- Formulario para filtrar por estudiante -->
    <form method="GET" action="{{ route('teacher.subjects.attendanceHistory', $subject->id) }}" class="mb-4">
        <label for="student_id">Filtrar por estudiante:</label>
        <select name="student_id" id="student_id" class="form-control" onchange="this.form.submit()">
            <option value="">-- Todos los estudiantes --</option>
            @foreach($students as $student)
                <option value="{{ $student->id }}" {{ request('student_id') == $student->id ? 'selected' : '' }}>
                    {{ $student->user->name }}
                </option>
            @endforeach
        </select>
    </form>

    @if($filteredStudent)
        <h4>Asistencia de {{ $filteredStudent->user->name }}</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Presente</th>
                </tr>
            </thead>
            <tbody>
                @foreach($attendances as $attendance)
                    <tr>
                        <td>{{ $attendance->attendance_date }}</td>
                        <td>{{ $attendance->present ? 'Sí' : 'No' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h4>Asistencia general por día</h4>
        @foreach($attendancesByDate as $date => $attendancesOnDate)
            <h5>{{ $date }}</h5>
            <table class="table table-bordered mb-4">
                <thead>
                    <tr>
                        <th>Estudiante</th>
                        <th>Presente</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($attendancesOnDate as $attendance)
                        <tr>
                            <td>{{ $attendance->student->user->name }}</td>
                            <td>{{ $attendance->present ? 'Sí' : 'No' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endforeach
    @endif
</div>
@endsection
