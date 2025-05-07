<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RoleController extends Controller
{
    public function showByRole($role)
    {
        // Obtener usuarios según el rol
        $users = User::whereHas('role', function ($query) use ($role) {
            $query->where('name', $role);
        })->get();

        // Retornar la vista con los usuarios
        return view('users_by_role', compact('users', 'role'));
    }
}
