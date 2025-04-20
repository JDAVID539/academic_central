<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $table = 'attendances'; 
    protected $primaryKey = 'id_attendance';
    protected $fillable = [
        'attendance_date',
        'id_student',
        'present',
    ];
    
   
    //muchos a uno 
    public function student()
    {
        return $this->hasMany('App\Models\student');
    }

    //muchos a uno
    public function subjects()
    {
        return $this->hasMany('App\Models\subject');
    }
    //muchos a uno
    public function students()
    {
        return $this->hasMany('App\Models\student');
    }
}
