<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = 'proveedores';
    protected $fillable = ['nombre_proveedor','telefono_proveedor','correo_proveedor'];
    protected $primaryKey = 'id_proveedor';
}
