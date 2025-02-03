<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Proveedor_Controller extends Controller
{
    public function Agregar_Proveedor(Request $request){
        $messages = [
            'Correo_Proveedor.unique' => 'La categoría ya existe, por favor ingrese una nueva.',
            'Numero_Proveedor.unique' => 'El Numero ya existe'
        ];

        $request->validate([
            "Nombre_Proveedor" => "required|string",
            "Numero_Proveedor" => "required|string|unique:proveedores,telefono_proveedor",
            "Correo_Proveedor" => "required|email|unique:proveedores,correo_proveedor"
        ], $messages);

        $item = new Proveedor();
        $item->nombre_proveedor = $request->Nombre_Proveedor;
        $item->telefono_proveedor = $request->Numero_Proveedor;
        $item->correo_proveedor = $request->Correo_Proveedor;
        $item->save();

        return redirect()->back()->with(['Proveedor_Agregado'=>'Agregado']);
    }

    public function Eliminar_Proveedor($id){
        $item = Proveedor::find($id);
        $item->delete();
        return redirect()->back()->with(['Proveedor_Eliminado'=>'Eliminado']);
    }

    public function Actualizar_Proveedor(Request $request){
        $request->validate([
            "Id_Prov" => "required|integer",
            "Nombre_Prov" => "required|string",
            "Telefono_Prov" => "required|string",
            "Correo_Prov" => "required|email"
        ]);

        $item = Proveedor::find($request->Id_Prov);

        if($item){
            try{
                $item->update([
                    "nombre_proveedor" => $request->Nombre_Prov,
                    "telefono_proveedor" => $request->Telefono_Prov,
                    "correo_proveedor" => $request->Correo_Prov
                ]);
                return redirect()->back()->with(['Proveedor_Actualizado'=>'Actualizado']);

            }catch(Exception $e){
                Log::error($e->getMessage());
                return redirect()->back()->with(['Error'=>'Error']);
            }
        }else{
            Log::info("No se encontro el proveedor con el id: ".$request->Id_Prov);
        }
    }
}
