<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function show(){
        $user = auth::user();

        if (!$user->profile) {
            $user->profile()->create([
                'foto' => 'default.jpg',
                'phone' => '',
                'address' => '',
            ]);
            $user->profile = $user->profile()->first();
        }
        $user->load('profile');
        return view('perfil', compact('user'));
        {

        }
    }
    public function edit()
    {
        $user = Auth::user();
    
        // Asegurarse de que el usuario tenga un perfil
        if (!$user->profile) {
            $user->profile()->create([
                'foto' => 'default.jpg',
                'phone' => '',
                'address' => '',
            ]);
        }
    
        $user->load('profile');
    
        return view('perfil_edit', compact('user'));
    }



}
