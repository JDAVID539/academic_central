<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Student;

class CourseController extends Controller
{
    // Mostrar formulario de creación de curso
    public function create()
{
    $school_id = session('school_id');

    if (!$school_id) {
        return redirect()->back()->with('error', 'No hay colegio activo en sesión.');
    }

    // Cargar profesores del colegio actual con su usuario
    $teachers = Teacher::with('user')->where('school_id', $school_id)->get();

    return view('frm_course', compact('teachers'));
}

    // Guardar nuevo curso
    public function store(Request $request)
    {
        // Validar datos del formulario
        $request->validate([
            'name_course' => 'required|string|max:255',
            'description_course' => 'required|string|max:1000',
            'teacher_id' => 'required|exists:teachers,id',
        ]);

        // Obtener el school_id desde la sesión
        $school_id = session('school_id');

        if (!$school_id) {
            return redirect()->back()->with('error', 'No hay colegio activo en sesión.');
        }

        // Crear el curso
        Course::create([
            'name_course' => $request->name_course,
            'description_course' => $request->description_course,
            'teacher_id' => $request->teacher_id,
            'school_id' => $school_id,
        ]);

        return redirect()->back()->with('success', 'Curso registrado correctamente.');
    }

    // Listar cursos del colegio en sesión
    public function index(Request $request)
    {
        $school_id = session('school_id');

        if (!$school_id) {
            return redirect()->back()->with('error', 'No hay colegio activo en sesión.');
        }

        // Consultar cursos asociados al colegio
        $query = Course::where('school_id', $school_id)->with('teacher');

        // Filtro por nombre si hay búsqueda
        if ($request->filled('buscar')) {
            $buscar = $request->buscar;
            $query->where('name_course', 'like', "%$buscar%");
        }

        $courses = $query->get();

        return view('vist_list_courses', compact('courses'));
    }

    // Editar curso
    // Editar curso
public function edit($id)
{
    $course = Course::findOrFail($id);

    // Obtener el school_id desde la sesión
    $school_id = session('school_id');

    if (!$school_id) {
        return redirect()->back()->with('error', 'No hay colegio activo en sesión.');
    }

    // Cargar profesores del colegio actual con su usuario
    $teachers = Teacher::with('user')->where('school_id', $school_id)->get();

    return view('frm_course_edit', compact('course', 'teachers'));
}


    // Actualizar curso
    public function update(Request $request, $id)
{
    // Validación de los datos del formulario
    $request->validate([
        'name_course' => 'required|string|max:255',
        'description_course' => 'required|string',
        'teacher_id' => 'nullable|exists:teachers,id',
    ]);

    // Buscar el curso por su ID
    $course = Course::findOrFail($id);

    // Actualizar los datos del curso
    $course->name_course = $request->name_course;
    $course->description_course = $request->description_course;
    $course->teacher_id = $request->teacher_id;
    $course->save();

    // Redirigir con mensaje de éxito
    return redirect()->route('courses.index')->with('success', 'Curso actualizado con éxito');
}

public function destroy($id)
{
    // Buscar el curso por su ID
    $course = Course::findOrFail($id);

    // Eliminar el curso
    $course->delete();

    // Redirigir con mensaje de éxito
    return redirect()->route('courses.index')->with('success', 'Curso eliminado con éxito');
}

// funcion show para veer detalles del curso


public function showSubjects($id)
{
    $school_id = session('school_id');

    if (!$school_id) {
        return redirect()->back()->with('error', 'No hay colegio activo en sesión.');
    }

    $course = Course::findOrFail($id);
    $subjects = $course->subjects()->with('teacher.user')->paginate(6);
    $teachers = Teacher::with('user')->where('school_id', $school_id)->get();

    $available_students = \App\Models\Student::with('user')
    ->where('school_id', $school_id)
    ->where(function($query) use ($course) {
        $query->where('course_id', '!=', $course->id)
              ->orWhereNull('course_id');
    })
    ->get();


    $students = $course->students()->paginate(6);

    return view('vist_show_course', compact('course', 'teachers', 'subjects', 'students', 'available_students'));
}

public function assignStudent(Request $request)
{
    $request->validate([
        'course_id' => 'required|exists:courses,id',
        'student_id' => 'required|exists:students,id',
    ]);

    $student = \App\Models\Student::findOrFail($request->student_id);
    $student->course_id = $request->course_id;
    $student->save();

    return redirect()->back()->with('success', 'Estudiante agregado al curso.');
}
public function listTeacherCourses()
{
    $teacher_id = session('teacher_id'); // o Auth::user()->teacher->id si usas autenticación
    $courses = Course::where('teacher_id', $teacher_id)->get();
    return view('vist_lis_materias_teacher', compact('courses'));
}

public function removeStudent($courseId, $studentId)
{
    $student = Student::findOrFail($studentId);
    $student->course_id = null;
    $student->save();

    return redirect()->back()->with('success', 'Estudiante eliminado del curso correctamente.');
}

public function searchStudents(Request $request)
{
    $term = $request->input('term');

    $students = Student::with('user')
        ->where('school_id', session('school_id'))
        ->where(function($query) use ($term) {
            $query->whereHas('user', function($q) use ($term) {
                $q->where('name', 'like', "%$term%")
                  ->orWhere('identification_number', 'like', "%$term%");
            });
        })
        ->get();

    return response()->json($students);
}



}

