<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'rol_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    
     // relacion de uno a uno de usuario con perfil
     public function profile()
     {
         return $this->hasOne('app\Models\Profile');
     }
 
     // relacion de uno a uno de usuario con teacher
     public function teacher()
     {
         return $this->hasOne('app\Models\teacher');
     }
 
     // relacion de uno a uno de usuarui a estudiante
     public function student()
     {
        return $this->hasOne(Student::class);
     }
 
     //relacion con notificaciones 
 
     public function attendeance()
     {
         return $this->belongsTo('app\Models\attendance');
     }
     public function role()
    {
        return $this->belongsTo('App\Models\Role');	
    }
}
