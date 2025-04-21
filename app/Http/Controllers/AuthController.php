<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
   
    public function login(Request $request)
    {
        
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        
        if (Auth::attempt($request->only('email', 'password'))) {
            
            return redirect()->route('home')->with('success', 'Inicio de sesión exitoso.');
        }

        // Si falla la autenticación, redirigir con un mensaje de error
        return back()->withErrors(['email' => 'Credenciales incorrectas.'])->withInput();
    }

    
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Sesión cerrada correctamente.');
    }
}
