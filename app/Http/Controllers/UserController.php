<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return view('frm_user');
    }

    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255', // Ejemplo: 'John Doe'
            'email' => 'required|email|unique:users,email', // Ejemplo: 'johndoe@example.com'
            'password' => 'required|string|min:8', // Ejemplo: 'password123'
            'rol' => 'required|in:profesor,aprendiz', // Ejemplo: 'profesor' o 'aprendiz'
        ]);

        // Guarda el usuario en la base de datos
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Encripta la contraseña
            'rol' => $request->rol, // Guarda el rol
        ]);

        return redirect()->back()->with('success', 'Usuario registrado correctamente.');
    }
}