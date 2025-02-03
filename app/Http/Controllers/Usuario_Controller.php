<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Usuario;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class Usuario_Controller extends Controller
{
    public function Agregar_Usuarios(Request $request){
        $request->validate([
            "Nombre"=>"required|string",
            "Apellido_P"=>"required|string",
            "Apellido_M"=>"required|string",
            "Sucursal"=>"required|integer",
            "Tipo_Usuario"=>"required|integer",
            "Usuario"=>"required|email|unique:usuarios,correo_usuario",
            "Contrasena"=>"required|string|min:6"
        ]);

        $item = new Usuario();
        $item->correo_usuario = $request->Usuario;
        $item->contrasena_usuario = Hash::make($request->Contrasena);
        $item->tipo_usuario_id = $request->Tipo_Usuario;
        $item->sucursal_id = $request->Sucursal;
        $item->save();

        $usuario_id = $item->id_usuario;

        // Guardar la nueva persona con el ID del usuario
        $item2 = new Persona();
        $item2->nombre_persona = $request->Nombre;
        $item2->apellidop_persona = $request->Apellido_P;
        $item2->apellidom_persona = $request->Apellido_M;
        $item2->direccion_persona = "No aplica";
        $item2->usuario_id = $usuario_id;
        $item2->save();

        return redirect()->back()->with(['Agregado'=>'El usuario se ha agregado']);
    }

    public function Actualizar_Usuario(Request $request){
        Log::info($request);

        $request->validate([
            "Id_Usuario"=>"required|integer",
            "Nombre"=>"required|string",
            "Apellido_P"=>"required|string",
            "Apellido_M"=>"required|string",
            "Correo"=>"required|email",
            "Direccion"=>"required|string",
            "Tipo_Usuario"=>"required|integer",
        ]);

        Log::info('Los datos fueron validados');

        try{
            $Usuario_Buscar = Usuario::find($request->Id_Usuario);
            $Usuario_Buscar->update([
                'correo_usuario' => $request->Correo,
                'tipo_usuario_id' => $request->Tipo_Usuario
            ]);

            $Persona_Buscar = Persona::where('usuario_id',$request->Id_Usuario)->first();
            $Persona_Buscar->update([
                'nombre_persona' => $request->Nombre,
                'apellidop_persona' => $request->Apellido_P,
                'apellidom_persona' => $request->Apellido_M
            ]);

            return redirect()->back()->with(['Actualizado'=>'El usuario se ha actualizado']);
        }catch(Exception $e){
            Log::error($e->getMessage());
            return redirect()->back()->withErrors(['Error_Actualizar' => 'No se actualizo']);
        }

    }

    public function Actulizar_Contrasena(Request $request){
        $request->validate([
            "Id_User"=>"required|integer",
            "Contra"=>"required|string|min:8"
        ]);

        try{
            $Usuario_Buscar = Usuario::find($request->Id_User);
            $Usuario_Buscar->update([
                'contrasena_usuario' => Hash::make($request->Contra)
            ]);

            return redirect()->back()->with(['Contraseña_A'=>'La contraseña se ha actualizado']);
        }catch(Exception $e){
            Log::error($e->getMessage());
            return redirect()->back()->withErrors(['Error_Contraseña' => 'No se actualizo']);
        }
    }

    public function Borrar_Usuario($id){
        $Usuario = Usuario::find($id);

        if ($Usuario) {
            $Usuario->delete();
            return back()->with('success', 'El usuario se elimino');
        }
    }
}
