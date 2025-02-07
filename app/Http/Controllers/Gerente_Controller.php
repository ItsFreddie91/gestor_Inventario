<?php

namespace App\Http\Controllers;

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
            return view('Gerente_Incio');
        }
    }
}
