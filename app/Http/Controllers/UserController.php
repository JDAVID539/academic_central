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
        if (!session('school_id')) {
            return redirect()->route('users.create')->with('error', 'No se puede crear un usuario sin un colegio.');
        }
        
        // Obtener el school_id de la sesión
        $school_id = session('school_id');
        
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'numero_de_identificacion' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
            'rol_id' => 'required|exists:roles,id',
        ]);
        
        // Crear el nuevo usuario con el school_id
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->numero_de_identificacion = $request->numero_de_identificacion;
        $user->password = Hash::make($request->password);
        $user->rol_id = $request->rol_id;
        $user->school_id = $school_id; 
        $user->save();
        
        return redirect()->back()->with('success', 'Usuario registrado con éxito');
    }

    public function index(Request $request)
{
    $school_id = session('school_id');

    if (!$school_id) {
        return redirect()->back()->with('error', 'No hay colegio activo en sesión.');
    }

    $roles = Role::all();

    $query = User::where('school_id', $school_id)->with('role');

    if ($request->filled('buscar')) {
        $buscar = $request->buscar;
        $query->where(function ($q) use ($buscar) {
            $q->where('name', 'like', "%$buscar%")
              ->orWhere('numero_de_identificacion', 'like', "%$buscar%");
        });
    }

    $users = $query->get();

    return view('view_list_users', compact('users', 'roles'));
}

    public function edit($id)
    {
        $user = User::findOrFail($id); // Buscar el usuario por ID
        $roles = Role::all(); // Obtener todos los roles disponibles

        return view('frm_user_edit', compact('user', 'roles')); // Retornar la vista de edición
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'rol_id' => 'required|exists:roles,id',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->rol_id = $request->rol_id;

        if ($request->filled('password')) {
            $request->validate([
                'password' => 'string|min:8|confirmed',
            ]);
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'Usuario actualizado con éxito');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuario eliminado con éxito');
    }
}