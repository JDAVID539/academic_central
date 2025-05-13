<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Role; 
use Illuminate\Support\Facades\Auth;
use App\Models\School;
use App\Models\Teacher; // 
use App\Models\Student; //
use App\Models\Classroom; //
use App\Models\Course; //

class 
UserController extends Controller
{
    public function create()
    {
        $roles = Role::all();
        return view('colegio.frm_user', compact('roles'));
    }
         
    public function store(Request $request)
{
    if (!session('school_id')) {
        return redirect()->route('users.create')->with('error', 'No se puede crear un usuario sin un colegio.');
    }

    $school_id = session('school_id');

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'numero_de_identificacion' => 'required|string|max:255',
        'password' => 'required|string|min:8|confirmed',
        'password_confirmation' => 'required|string|min:8',
        'rol_id' => 'required|exists:roles,id',
    ]);

    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->numero_de_identificacion = $request->numero_de_identificacion;
    $user->password = Hash::make($request->password);
    $user->rol_id = $request->rol_id;
    $user->school_id = $school_id;
    $user->save();

    // Registrar profesor
    $rolProfesor = Role::where('name', 'Profesor')->first();
    if ($rolProfesor && $user->rol_id == $rolProfesor->id) {
        Teacher::create([
            'user_id' => $user->id,
            'school_id' => $school_id,
            'specialty' => 'General',
        ]);
    }

    // Registrar estudiante
    $rolestudiante = Role::where('name', 'Estudiante')->first();
if ($rolestudiante && $user->rol_id == $rolestudiante->id) {
    Student::create([
        'user_id' => $user->id,
        'school_id' => $school_id,
        'course_id' => null, // Puedes asignarlo después si quieres
        'teacher_assigned_id' => null, // También puedes asignarlo después
    ]);
}

    return redirect()->back()->with('success', 'Usuario registrado con éxito');
}


    public function index(Request $request)
    {
        $school_id = session('school_id');

        if (!$school_id) {
            return redirect()->back()->with('error', 'No hay colegio activo en sesión.');
        }

        $roles = Role::all();

        $query = User::where('school_id', $school_id)->with('role');

        if ($request->filled('buscar')) {
            $buscar = $request->buscar;
            $query->where(function ($q) use ($buscar) {
                $q->where('name', 'like', "%$buscar%")
                  ->orWhere('numero_de_identificacion', 'like', "%$buscar%");
            });
        }

        $users = $query->get();

        return view('colegio.view_list_users', compact('users', 'roles'));
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $teachers = Teacher::all(); // o como obtengas los profesores
        return view('colegio.frm_user_edit', compact('course', 'teachers'));
    }
    
    

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'numero_de_identificacion' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
            'password_confirmation' => 'nullable|string|min:8',
            'rol_id' => 'required|exists:roles,id',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->rol_id = $request->rol_id;
        $user->numero_de_identificacion = $request->numero_de_identificacion;

        if ($request->filled('password')) {
            $request->validate([
                'password' => 'string|min:8|confirmed',
            ]);
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'Usuario actualizado con éxito');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuario eliminado con éxito');
    }
    public function show($id)
    {
        $user = User::with('role')->findOrFail($id);
    
        return view('user_details', compact('user'));
    }

 
}
