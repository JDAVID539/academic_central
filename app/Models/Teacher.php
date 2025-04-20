<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    //resivir id de user
   public function user(){
    return $this->belongsTo("app\models\User");
   }
     //relacion teachers de uno a muchos
   public function assignment_subject_teacher()
   {
       return $this->belongsTo('App\Models\assignment_subject_teacher');
   }
    
   //relacion con materias de muchos a uno
    public function subjects()
    {
         return $this->hasMany('App\Models\subject');
    }
    public function courses(){
        return $this ->hasMany('app\models\course');
    }
}
