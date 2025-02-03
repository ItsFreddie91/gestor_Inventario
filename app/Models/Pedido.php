<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'pedidos';
    protected $fillable = ['id_pedido','fecha_pedido','estado_pedido','monto_pedido','usuario_id'];
    protected $primaryKey = 'id_pedido';
}
