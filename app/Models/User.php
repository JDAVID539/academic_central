<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Profile;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Attendance;
use App\Models\Role;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'rol_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relación de uno a uno con Profile
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    // Relación de uno a uno con Teacher
    public function teacher()
    {
        return $this->hasOne(Teacher::class);
    }

    // Relación de uno a uno con Student
    public function student()
    {
        return $this->hasOne(Student::class);
    }

    // Relación con Attendance
    public function attendance()
    {
        return $this->belongsTo(Attendance::class);
    }

    // Relación con Role
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
