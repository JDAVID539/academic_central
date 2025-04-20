<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Student;

class AttendanceController extends Controller
{
    public function create()
    {
        // Obtiene todos los estudiantes para mostrarlos en el formulario
        $students = Student::all();
        return view('frm_attendence', compact('students'));
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'attendance_date' => 'required|date',
            'id_student' => 'required|exists:students,id', 
            'present' => 'required|boolean',
        ]);

        
        $attendance = new Attendance();
        $attendance->attendance_date = $request->attendance_date;
        $attendance->id_student = $request->id_student;
        $attendance->present = $request->present;
        $attendance->save();

        return redirect()->back()->with('success', 'Asistencia registrada correctamente.');
    }
}

