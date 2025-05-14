@extends('layouts.app_moduloteacher')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
@endpush

@section('content')
<br><br>

<div class="container mt-4">
    <div class="card shadow">
        <div class="card-body">
            <h3 class="card-title text-center mb-3 text-primary">
                <i class="fas fa-check-circle me-2"></i>Registrar Asistencia
            </h3>

            <form action="{{ route('teacher.subjects.storeAttendance', $subject->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="attendance_date" class="form-label">Fecha de asistencia</label>
                    <input type="date" name="attendance_date" id="attendance_date" class="form-control" required>
                </div>

                <table class="table table-bordered mt-3">
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

                <button type="submit" class="btn btn-success w-100 mt-3">
                    <i class="fas fa-save me-1"></i>Guardar Asistencia
                </button>
            </form>

            <a href="{{ route('teacher.subjects.attendanceHistory', $subject->id) }}" class="btn btn-info mt-3">
                <i class="fas fa-history me-1"></i>Ver toda la asistencia
            </a>
        </div>
    </div>
</div>

@endsection
