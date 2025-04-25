<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use Illuminate\Support\Facades\Hash;

class SchoolController extends Controller
{
    public function create()
    {
        return view('frm_school');
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
        return redirect()->route('home')->with('success', 'Escuela creada con éxito.');
    }
}
