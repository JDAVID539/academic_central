<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Course;
use Carbon\Carbon;
class AttendanceController extends Controller
{
   

    public function create($subjectId)
    {
        $subject = Subject::findOrFail($subjectId);
        $students = $subject->course->students;
    
        $today = Carbon::today()->toDateString();
    
        $attendancesToday = Attendance::whereIn('student_id', $students->pluck('id'))
            ->where('attendance_date', $today)
            ->get();
    
        return view('teacher.frm_attendence', compact('subject', 'students', 'attendancesToday'));
    }
    

public function storeMassAttendance(Request $request, $subjectId)
{
    $request->validate([
        'attendance_date' => 'required|date',
        'attendance' => 'required|array',
        'attendance.*.student_id' => 'required|exists:students,id',
    ]);

    foreach ($request->attendance as $att) {
        $present = isset($att['present']) ? 1 : 0;
        Attendance::updateOrCreate(
            [
                'attendance_date' => $request->attendance_date,
                'student_id' => $att['student_id'],
            ],
            ['present' => $present]
        );
    }

    return redirect()->back()->with('success', 'Asistencia registrada correctamente.');
}

public function attendanceHistory(Request $request, $subjectId)
{
    $subject = Subject::findOrFail($subjectId);
    $students = $subject->course->students;

    $studentId = $request->query('student_id');
    $filteredStudent = null;

    if ($studentId) {
        // Filtrar asistencias por estudiante
        $attendances = Attendance::where('student_id', $studentId)
            ->orderBy('attendance_date', 'desc')
            ->get();

        $filteredStudent = $students->where('id', $studentId)->first();

        // Pasar solo las asistencias filtradas y el estudiante filtrado
        return view('teacher.attendance_history', compact('subject', 'students', 'attendances', 'filteredStudent'));
    } else {
        // Obtener todas las asistencias agrupadas por fecha
        $attendancesByDate = Attendance::whereIn('student_id', $students->pluck('id'))
            ->orderBy('attendance_date', 'desc')
            ->get()
            ->groupBy('attendance_date');

        // Pasar null para filteredStudent para evitar error en la vista
        return view('teacher.attendance_history', compact('subject', 'students', 'attendancesByDate', 'filteredStudent'));
    }
}




}

