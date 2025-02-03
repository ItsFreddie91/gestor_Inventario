<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'Usuarios';
    protected $fillable = ['correo_usuario','contrasena_usuario','tipo_usuario_id'];


    public function getAuthPassword()
    {
        return $this->contrasena_usuario;
    }

    protected $hidden = [
        'contrasena_usuario', // Se oculta este campo en lugar de 'password'
        'remember_token',
    ];

    // Casting de tipos
    protected $casts = [
        'email_verified_at' => 'datetime',
        'contrasena_usuario' => 'hashed', // Se utiliza 'contrasena_usuario' para que Laravel sepa que está cifrada
    ];
}
