<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\School;

class AuthController
{
    public function login(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'type' => 'required', // Validar el tipo de usuario y rol
        ]);

        if ($request->type === 'school') {
            // Buscar el colegio por correo electrónico
            $school = School::where('email', $request->email)->first();

            if ($school && \Hash::check($request->password, $school->password)) {
                // Guardar la información del colegio en la sesión
                $request->session()->put('school_id', $school->id);
                $request->session()->put('school_name', $school->name);
                $request->session()->put('school_email', $school->email);
                $request->session()->put('user_type', 'school');
                
                // Redirigir al panel del colegio
                return redirect()->route('school.dashboard')->with('success', 'Bienvenido al panel del colegio.');
            } else {
                return redirect()->back()->withErrors(['email' => 'Credenciales incorrectas para el colegio.']);
            }
        }

        // Verificar las credenciales del usuario regular
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Obtener el usuario autenticado
            $user = Auth::user();

            // Extraer el rol del campo type
            $expectedRole = explode('_', $request->type)[1]; // Ejemplo: 'user_estudiante' -> 'estudiante'

            // Obtener el rol del usuario desde la base de datos
            $roleName = DB::table('roles')->where('id', $user->rol_id)->value('name');

            if ($roleName === $expectedRole) {
                // Guardar el tipo de usuario en la sesión
                $request->session()->put('user_type', 'regular');
                
                // Redirigir según el rol
                if ($roleName === 'estudiante') {
                    return redirect()->route('student.dashboard');
                } elseif ($roleName === 'profesor') {
                    return redirect()->route('teacher.dashboard');
                } elseif ($roleName === 'moderador') {
                    return redirect()->route('moderator.dashboard');
                }
            } else {
                // Cerrar sesión si el rol no coincide
                Auth::logout();
                return redirect()->back()->withErrors(['role' => 'El rol seleccionado no coincide con el registrado.']);
            }
        }

        // Si las credenciales no son válidas
        return redirect()->back()->withErrors(['email' => 'Credenciales incorrectas.']);
    }

    // Método para cerrar sesión
    public function logout(Request $request)
    {
        // Verificar si es un colegio o un usuario regular
        if ($request->session()->has('user_type') && $request->session()->get('user_type') === 'school') {
            // Limpiar la sesión del colegio
            $request->session()->forget(['school_id', 'school_name', 'school_email', 'user_type']);
        } else {
            // Cerrar sesión de usuario regular
            Auth::logout();
        }
        
        // Invalidar la sesión y regenerar el token CSRF
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('login');
    }
}

