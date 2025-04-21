<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
 //ralcion con cursos de uno a muchos
 public function curso()
 {
     return $this->belongsTo('App\Models\Course');
 }
  //tareas con materias de uno a muchos
 public function tasks(){
     return $this ->hasMany('App\Models\Task');
 }
 
 //materias con asistencias
 public function attendance(){
     return $this ->belongsTo('App\Models\Attendance');
 }

 //calificaiones con msterias muchos a uno 
 public function school_grades(){
     return $this ->hasMany('App\Models\School_grade');
 }
}
