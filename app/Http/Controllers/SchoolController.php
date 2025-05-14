<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use Illuminate\Support\Facades\Hash;
use App\Models\User; 

class SchoolController extends Controller
{
    public function create()
    {
        return view('administrador.frm_school');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'name_school' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Crear una nueva escuela
        School::create([
            'name' => $request->name,
            'name_school' => $request->name_school,
            'address' => $request->address,
            'city' => $request->city,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password), 
        ]);
        

        // Redirigir a la vista de éxito o donde desees
        return redirect()->route('colegiio.create')->with('success', 'Escuela creada con éxito.');
    }


public function vistaColegio()
{
    // Obtener el id del colegio actual desde la sesión
    $schoolId = session('school_id');

    // Obtener los ids de los roles
    $rolEstudiante = \App\Models\Role::where('name', 'estudiante')->first();
    $rolProfesor = \App\Models\Role::where('name', 'profesor')->first();
    $rolAdministrador = \App\Models\Role::where('name', 'administrador')->first();

    // Contar total de usuarios del colegio
    $totalUsuarios = \App\Models\User::where('school_id', $schoolId)->count();

    // Contar estudiantes del colegio
    $totalEstudiantes = $rolEstudiante
        ? \App\Models\User::where('school_id', $schoolId)->where('rol_id', $rolEstudiante->id)->count()
        : 0;

    // Contar profesores del colegio
    $totalProfesores = $rolProfesor
        ? \App\Models\User::where('school_id', $schoolId)->where('rol_id', $rolProfesor->id)->count()
        : 0;

    // Contar administradores del colegio
    $totalAdministradores = $rolAdministrador
        ? \App\Models\User::where('school_id', $schoolId)->where('rol_id', $rolAdministrador->id)->count()
        : 0;

    // Retornar la vista con los totales
    return view('colegio.vista_colegio', compact('totalUsuarios', 'totalEstudiantes', 'totalProfesores', 'totalAdministradores'));
}


    public function index()
{
    $students = User::where('role', 'estudiante')->get();
    $teachers = User::where('role', 'profesor')->get();
    $admins = User::where('role', 'administrador')->get();
    // Obtener usuarios agrupados por roles
    $students = User::whereHas('role', function ($query) {
        $query->where('name', 'Estudiante');
    })->get();

    $teachers = User::whereHas('role', function ($query) {
        $query->where('name', 'Profesor');
    })->get();

    $admins = User::whereHas('role', function ($query) {
        $query->where('name', 'Administrador');
    })->get();

    // Retorna la vista con los usuarios clasificados
    return view('colegio.vista_colegio', compact('students', 'teachers', 'admins'));
}

public function showProfile()
{
    $schoolId = session('school_id'); // o como guardes el id del colegio en sesión
    $school = School::find($schoolId);
    return view('colegio.profile_colegio', compact('school'));
    
}

public function edit()
{
    $schoolId = session('school_id'); // Obtener el ID del colegio desde la sesión
    $school = School::find($schoolId);
    return view('colegio.school_edit_perfil', compact('school'));
}


public function update(Request $request)
{
    $schoolId = session('school_id');
    $school = School::find($schoolId);

    $request->validate([
        'name_school' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:15',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $school->name_school = $request->input('name_school');
    $school->address = $request->input('address');
    $school->city = $request->input('city');
    $school->email = $request->input('email');
    $school->phone = $request->input('phone');

    if ($request->hasFile('photo')) {
        $file = $request->file('photo');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads'), $filename);
        $school->photo = $filename;
    }

    $school->save();

    return redirect()->route('school.edit')->with('success', 'Perfil actualizado correctamente.');
}




}