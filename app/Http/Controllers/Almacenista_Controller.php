<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Almacenista_Controller extends Controller
{
    public function Inicio(Request $request){
        //Llama la instancia de los datos de Sesión y los guarda en una variable
        $usuario = Auth::user();

        // Verifica si el tipo de usuario no es el que esperas (por ejemplo, si el tipo_usuario_id no es igual a 1, O si no hay un tipo de usuario)
        if (!$usuario || $usuario->tipo_usuario_id !== 3) {
            // Redirige a otra página (por ejemplo, la página de inicio)
            return redirect()->route('Pagina_Error')->withErrors(['error' => 'No tienes permiso para acceder a esta página.', 'Titulo'=>'Acceso Denegado']);
        }else{
            $Producto = Producto::join('categorias', 'productos.categoria_id', '=', 'categorias.id_categoria')
            ->where('productos.codigo_producto', '=', $request->Codigo)
            ->select('productos.*', 'categorias.nombre_categoria')
            ->first();

            return view('Almacenista_Inicio', compact('Producto'));
        }
        
    }
}
