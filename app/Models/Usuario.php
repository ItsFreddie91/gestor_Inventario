<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuarios';
    protected $fillable = ['correo_usuario','contrasena_usuario','tipo_usuario_id', 'sucursal_id'];
    
    protected $primaryKey = 'id_usuario'; // Especifica tu clave primaria personalizada
    public $incrementing = true; // Si tu clave primaria es auto-incremental
    protected $keyType = 'int'; // Si tu clave primaria es un entero


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
