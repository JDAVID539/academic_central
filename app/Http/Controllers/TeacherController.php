<?php

namespace App\Http\Controllers;

use App\Models\Teacher; 
use App\Models\Subject;
use App\Models\School;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use App\Models\Course; // Asegúrate de importar el modelo Course
use App\Models\Role;
class TeacherController extends Controller
{
    

    public function listAssignedSubjects()
    {
        $teacher = Auth::user()->teacher; // Obtener el modelo Teacher relacionado al usuario autenticado
    
        if (!$teacher) {
            return redirect()->route('login')->with('error', 'No tienes permisos para acceder a esta sección.');
        }
    
        $subjects = \App\Models\Subject::where('teacher_id', $teacher->id)->get();
    
        return view('teacher.vist_lis_materias_teacher', compact('subjects'));
    }
    
    public function showAssignTaskForm($subjectId)
    {
        $subject = Subject::findOrFail($subjectId);
        $tasks = $subject->tasks; // Obtener tareas relacionadas
        return view('teacher.assign_task', compact('subject', 'tasks'));
    }
    
    public function storeTask(Request $request)
{
    $request->validate([
        'subject_id' => 'required|exists:subjects,id',
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'due_date' => 'nullable|date',
    ]);

    $task = new \App\Models\Task();
    $task->subject_id = $request->subject_id;
    $task->title = $request->title;
    $task->description = $request->description;
    $task->due_date = $request->due_date;
    $task->save();

    // Redirigir a la vista de asignar tarea con la lista actualizada
    return redirect()->route('teacher.subjects.assignTaskForm', $request->subject_id)
        ->with('success', 'Tarea añadida correctamente.');
}


public function showProfile()
{
    $user = Auth::user();
    $profile = $user->profile;

    if (!$profile) {
        $profile = new \App\Models\Profile();
        $profile->user_id = $user->id;
        $profile->save();
    }

    $teacher = $user->teacher;
    $school = $teacher ? $teacher->school : null;

    return view('teacher.profile', compact('profile', 'school'));
}

// Mostrar formulario para editar perfil

public function editProfile()
{
    $user = Auth::user();
    $profile = $user->profile;

    if (!$profile) {
        $profile = new \App\Models\Profile();
        $profile->user_id = $user->id;
        $profile->save();
    }

    return view('teacher.edit_profile', compact('profile'));
}

// Procesar actualización del perfil
public function updateProfile(Request $request)
{
    $user = Auth::user();
    $profile = $user->profile;

    if (!$profile) {
        $profile = new \App\Models\Profile();
        $profile->user_id = $user->id;
    }

    $request->validate([
        'phone' => 'nullable|string|max:15',
        'address' => 'nullable|string|max:255',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        // otros campos que quieras validar
    ]);

    $profile->phone = $request->input('phone');
    $profile->address = $request->input('address');

if ($request->hasFile('photo')) {
    $file = $request->file('photo');
    $filename = time() . '.' . $file->getClientOriginalExtension();
    $file->move(public_path('uploads'), $filename);
    $profile->foto = $filename;
}

    $profile->save();

    return redirect()->route('teacher.profile.edit')->with('success', 'Perfil actualizado correctamente.');
}

public function courses($id)
{
    // Encuentra al profesor por su ID
    $teacher = User::findOrFail($id);

    // Obtén los cursos asignados al profesor (ajusta según tu modelo)
    $courses = $teacher->courses; // Asegúrate de tener una relación 'courses' en el modelo User

    // Retorna una vista con los cursos
    return view('teachers.courses', compact('teacher', 'courses'));
}

public function dashboard()
{
    $teacherId = Auth::user()->id;

    $courses = Course::where('teacher_id', $teacherId)->get();

    $assignedCoursesCount = $courses->count();

    $assignedSubjectsCount = \App\Models\Subject::where('teacher_id', $teacherId)->count();

    $assignedTasksCount = \App\Models\Task::whereHas('subject', function ($query) use ($teacherId) {
        $query->where('teacher_id', $teacherId);
    })->count();

    return view('teacher.vista_profesores', compact('courses', 'assignedCoursesCount', 'assignedSubjectsCount', 'assignedTasksCount'));
}


public function courseDetails($id)
{
    $course = Course::with(['subjects', 'students'])->findOrFail($id);
    return view('teacher.course_details', compact('course'));
}


}
