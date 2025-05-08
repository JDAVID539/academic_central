<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Models\user; // Import the user model
use App\Models\Role; // Import the role model
use App\Models\School;
use App\Models\School_Grade;
use App\Models\Student;

class OrmController extends Controller
{
    public function consultas()
    {
        // $student = Student::find(1);
        //  $student->user_id;
        //  return $student->user;

         $user = School::find(1); // Buscar el usuario con ID 1
        return $user->users;

        // $user = User::find(1); // Buscar el usuario con ID 1
        // return $user->Role;

        // $profile = Profile::find(3);
        // return $profile->user;

        // $student = Student::find(1); 
        // return $student->course;

        
        // $School_Grade =school_Grade::find(1); 
        // return $School_Grade;

        
  }
}