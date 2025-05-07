<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $table = 'attendances'; 
    protected $primaryKey = 'id';
    protected $fillable = [
        'attendance_date',
        'student_id',
        'present',
    ];
    
   
    //muchos a uno 
    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }

    //muchos a uno
    public function subjects()
    {
        return $this->hasMany('App\Models\Subject');
    }
    //muchos a uno
    public function students()
    {
        return $this->hasMany('App\Models\Student');
    }
}
