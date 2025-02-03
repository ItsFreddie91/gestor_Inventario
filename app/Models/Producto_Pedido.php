<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto_Pedido extends Model
{
    protected $table = 'productos_pedidos';
    protected $fillable = ['id_producto_pedido','cantidad_producto_pedido','pedido_id','producto_id'];
    protected $primaryKey = 'id_producto_pedido';
}
