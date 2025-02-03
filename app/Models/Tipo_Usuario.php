<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_Usuario extends Model
{
    protected $table = 'tipos_usuarios';
    protected $fillable = ['tipo_usuario'];
    
    protected $primaryKey = 'id_tipo_usuario'; // Especifica tu clave primaria personalizada
}
