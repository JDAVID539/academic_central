<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
 //ralcion con cursos de uno a muchos
 public function curso()
 {
     return $this->belongsTo('App\Models\course');
 }
  //tareas con materias de uno a muchos
 public function tasks(){
     return $this ->hasMany('app\models\task');
 }
 
 //materias con asistencias
 public function attendance(){
     return $this ->belongsTo('app\models\attendance');
 }

 //calificaiones con msterias muchos a uno 
 public function school_grades(){
     return $this ->hasMany('app\models\scool_grade');
 }
}
