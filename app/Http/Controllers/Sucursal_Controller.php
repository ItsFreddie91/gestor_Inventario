<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Sucursal_Controller extends Controller
{
    public function Agregar_Ubicacion(Request $request){
        $request->validate([
            'Nombre_Suc' => 'required|string',
            'Direccion_Suc' => 'required|string'
        ]);

        $item = new Sucursal();
        $item->nombre_sucursal = $request->Nombre_Suc;
        $item->ubicacion_sucursal = $request->Direccion_Suc;
        $item->save();

        return redirect()->back()->with(['Ubicacion_Agregada'=>'Agregado']);
    }

    public function Eliminar_Sucursal($id){
        $sucursal = Sucursal::find($id);

        if ($sucursal) {
            $sucursal->delete();
            return back()->with('success', 'La sucursal se elimino');
        }
    }

    public function Actualizar_Suc(Request $request){
        $request->validate([
            'Id_Suc' => 'required|integer',
            'Nombre_Suc' => 'required|string',
            'Direccion_Suc' => 'required|string'
        ]);

        Log::info("Datos de la sucursal: " . json_encode($request->all()));

        try{
            $sucursal = Sucursal::find($request->Id_Suc);
            $sucursal->update([
                'nombre_sucursal' => $request->Nombre_Suc,
                'ubicacion_sucursal' => $request->Direccion_Suc
            ]);
            return redirect()->back()->with('success', 'La sucursal se actualizo');

        }catch(Exception $e){
            Log::error("Error al actualizar: " . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'No se pudo actualizar la sucursal']);
        }
        
    }
}
