<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Gerente_Controller extends Controller
{
    public function Gerente_Vista(){
        //Llama la instancia de los datos de Sesión y los guarda en una variable
        $usuario = Auth::user();

        // Verifica si el tipo de usuario no es el que esperas (por ejemplo, si el tipo_usuario_id no es igual a 1, O si no hay un tipo de usuario)
        if (!$usuario || $usuario->tipo_usuario_id !== 2) {
            // Redirige a otra página (por ejemplo, la página de inicio)
            return redirect()->route('Pagina_Error')->withErrors(['error' => 'No tienes permiso para acceder a esta página.', 'Titulo'=>'Acceso Denegado']);
        }
        //Si hay un tipo de usuario y si es igual a 1 ejecuta el código de la vista
        else{
            $Productos = Producto::join('categorias', 'productos.categoria_id', '=', 'categorias.id_categoria')
            ->join('stocks', 'productos.id_producto', '=', 'stocks.producto_id')
            ->join('sucursales', 'sucursales.id_sucursal', '=', 'stocks.sucursal_id')
            ->where('sucursales.id_sucursal', '=', $usuario->sucursal_id)
            ->select('productos.*', 'stocks.cantidad as cantidad', 'sucursales.nombre_sucursal as sucursal', 'sucursales.id_sucursal as suc', 'categorias.nombre_categoria as categoria')
            ->get();
            return view('Gerente_Incio', compact('Productos'));
        }
    }

    public function Reportes_gerentes(){
        //Llama la instancia de los datos de Sesión y los guarda en una variable
        $usuario = Auth::user();

        // Verifica si el tipo de usuario no es el que esperas (por ejemplo, si el tipo_usuario_id no es igual a 1, O si no hay un tipo de usuario)
        if (!$usuario || $usuario->tipo_usuario_id !== 2) {
            // Redirige a otra página (por ejemplo, la página de inicio)
            return redirect()->route('Pagina_Error')->withErrors(['error' => 'No tienes permiso para acceder a esta página.', 'Titulo'=>'Acceso Denegado']);
        }
        //Si hay un tipo de usuario y si es igual a 1 ejecuta el código de la vista
        else{
            return view('Reportes_gerente');
        }
    }
}
