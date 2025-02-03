<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
    protected $fillable = ['id_producto','nombre_producto','descripcion_producto','foto_producto','codigo_producto','precio_producto','categoria_id','proveedor_id'];
    protected $primaryKey = 'id_producto';
}
