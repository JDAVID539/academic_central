<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Submit_Assignment extends Model
{
     //realcion con tareas 
     public function task()
     {
         return $this->belongsTo('App\Models\task');
     }
 
     //relacion con estudiantes
     public function student()
     {
         return $this->belongsTo('App\Models\student');
     }
}
