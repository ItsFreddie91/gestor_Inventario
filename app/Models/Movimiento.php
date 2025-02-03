<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movimiento extends Model
{
    protected $table = 'movimientos';
    protected $fillable = ['cantidad','tipo_movimiento', 'stock_id', 'created_at'];
    protected $primaryKey = 'id_movimiento';
}
