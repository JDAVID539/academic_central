<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Role; // Asegúrate de importar el modelo Role

class UserController extends Controller
{
    public function create()
    {
        $roles = Role::all();
        return view('frm_user', compact('roles'));
    }
         
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8',
        'rol_id' => 'required|exists:roles,id', 
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'rol_id' => $request->rol_id, 
    ]);

    return redirect()->back()->with('success', 'Usuario registrado correctamente.');
}
}