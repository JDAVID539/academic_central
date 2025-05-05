<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();

        // Asegurarse de que el usuario tenga un perfil
        $this->ensureUserProfile($user);

        return view('perfil', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();

        // Asegurarse de que el usuario tenga un perfil
        $this->ensureUserProfile($user);

        return view('perfil_edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // Validar los datos del formulario
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'role' => 'required|string|max:255',
            'foto' => 'nullable|image|max:2048',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'birthdate' => 'nullable|date',
        ]);

        // Manejar la subida de la foto
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('profiles', 'public');
        }

        // Actualizar los datos del usuario
        $user->update($data);

        // Actualizar los datos del perfil
        if ($user->profile) {
            $user->profile->update($data);
        }

        return redirect()->route('profile.edit')->with('success', 'Perfil actualizado correctamente.');
    }

    /**
     * Método privado para asegurarse de que el usuario tenga un perfil.
     */
    private function ensureUserProfile($user)
    {
        if (!$user->profile) {
            $user->profile()->create([
                'foto' => 'default.jpg',
                'phone' => '',
                'address' => '',
            ]);
        }

        $user->load('profile');
    }
}
