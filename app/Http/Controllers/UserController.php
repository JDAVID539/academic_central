<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Role; 
use Illuminate\Support\Facades\Auth;
use App\Models\School;



class UserController extends Controller
{
    public function create()
    {
        $roles = Role::all();
        return view('frm_user', compact('roles'));
    }
         
    public function store(Request $request)
{
    // Verificar si hay un colegio en la sesión
    if (!session('is_school') || !session('school_id')) {
        return redirect()->route('login')->with('error', 'Debe iniciar sesión como colegio para registrar usuarios');
    }
    
    // Obtener el school_id de la sesión
    $school_id = session('school_id');
    
    // Validar los datos del formulario
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'role_id' => 'required|exists:roles,id',
    ]);
    
    // Crear el nuevo usuario con el school_id
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->role_id = $request->role_id;
    $user->school_id = $school_id; // Asignar el school_id de la sesión
    $user->save();
    
    return redirect()->back()->with('success', 'Usuario registrado con éxito');
}
public function index()
{
    $users = User::all();
    return view('user_list', compact('users'));
}
}