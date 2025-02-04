<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'personas';
    protected $fillable = ['nombre_persona','apellidop_persona','apellidom_persona','direccion_persona','usuario_id'];
    protected $primaryKey = 'id_persona';
}
