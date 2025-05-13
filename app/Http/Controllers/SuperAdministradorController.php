<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdministradorController extends Controller
{
    public function index()
    {
        return view('administrador.vist_superadministrador');
    }

    public function listSchools(Request $request)
    {
        $query = $request->input('search');
        if ($query) {
            $schools = \App\Models\School::where('name_school', 'like', '%' . $query . '%')->get();
        } else {
            $schools = \App\Models\School::all();
        }
        return view('administrador.vist_list_school', compact('schools', 'query'));
    }

    public function editSchool($id)
    {
        $school = \App\Models\School::findOrFail($id);
        return view('administrador.school_edit', compact('school'));
    }

    public function updateSchool(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'name_school' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
        ]);

        $school = \App\Models\School::findOrFail($id);
        $school->name = $request->name;
        $school->name_school = $request->name_school;
        $school->address = $request->address;
        $school->city = $request->city;
        $school->email = $request->email;
        $school->phone = $request->phone;
        $school->save();

        return redirect()->route('listado.colegios')->with('success', 'Colegio actualizado correctamente.');
    }

    public function deleteSchool($id)
    {
        $school = \App\Models\School::findOrFail($id);
        $school->delete();

        return redirect()->route('listado.colegios')->with('success', 'Colegio eliminado correctamente.');
    }

    public function profileSuperAdmin(Request $request)
    {
        $superAdminId = $request->session()->get('super_administrador_id');
        $superAdmin = \App\Models\super_administrador::findOrFail($superAdminId);
        return view('administrador.profile_superadmin', compact('superAdmin'));
    }

    public function editProfile()
    {
        $superAdminId = session('super_administrador_id');
        $superAdmin = \App\Models\super_administrador::findOrFail($superAdminId);
        return view('administrador.profile_superadmin_edit', compact('superAdmin'));
    }

    public function updateProfile(\Illuminate\Http\Request $request)
    {
        $superAdminId = session('super_administrador_id');
        $superAdmin = \App\Models\super_administrador::findOrFail($superAdminId);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
        ]);

        $superAdmin->name = $request->name;
        $superAdmin->email = $request->email;
        $superAdmin->phone = $request->phone;
        $superAdmin->address = $request->address;
        $superAdmin->city = $request->city;
        $superAdmin->save();

        return redirect()->route('superadmin.profile')->with('success', 'Perfil actualizado correctamente.');
    }

    public function showSchoolDetail($id)
    {
        $school = \App\Models\School::findOrFail($id);
        return view('administrador.school_detail', compact('school'));
    }
}
