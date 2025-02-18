<?php

namespace App\Http\Controllers;

use App\Models\Movimiento;
use App\Models\Producto;
use App\Models\Stock;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Productos_Controller extends Controller
{
    public function Agregar(Request $request)
    {
        try{
            $request->validate([
                'nombre'=>'required|string',
                'Descripcion'=>'required|string',
                'Precio' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
                'Codigo'=>'required|string',
                'T_Categoria'=>'required|int',
                'Proveedor_P' =>'required|int',
                'Foto'=>'required|string'
            ]);
        } catch(Exception $e){
            Log::error("Error en la validación: " . $e->getMessage());
        }

        // Guardar la ruta en la base de datos
        $item = new Producto();
        $item->nombre_producto = $request->nombre;
        $item->descripcion_producto = $request->Descripcion;
        $item->foto_producto = $request->Foto;
        $item->codigo_producto = $request->Codigo;
        $item->precio_producto = $request->Precio;
        $item->categoria_id = $request->T_Categoria;
        $item->proveedor_id = $request->Proveedor_P;

        $item->save();

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with(['success' => 'Producto Registrado']);

        /*
        if ($request->hasFile('Foto')) {
            // Obtener el archivo
            $file = $request->file('Foto');

            // Generar un nombre único para la imagen
            $nombreImagen = time() . '_' . $file->getClientOriginalName();

            // Mover la imagen a la carpeta 'public/img'
            //$file->move(public_path('Img/Productos'), $nombreImagen);

            Log::info("Imagen subida correctamente: {$nombreImagen}");

            
        }

        return redirect()->back()->withErrors(['Imagen_error' => 'No se agrego']);*/
    }

    public function Repartir_Productos(Request $request){
        try{
            $request->validate([
                'Cantidad'=>'required|integer',
                'Prod_Id'=>'required|integer',
                'Sucursal_Id'=>'required|integer'
            ]);
        } catch(Exception $e){
            Log::error("Error en la validación: " . $e->getMessage());
        }

        $buscar = Stock::where('producto_id', $request->Prod_Id)
        ->where('sucursal_id', $request->Sucursal_Id)
        ->first();

        if(!$buscar){
            try{
                $Repartir = new Stock();
                $Repartir->cantidad = $request->Cantidad;
                $Repartir->producto_id = $request->Prod_Id;
                $Repartir->sucursal_id = $request->Sucursal_Id;
                $Repartir->save();

                $Stock_Id = $Repartir->id_stock;

                $Movimiento = new Movimiento();
                $Movimiento->cantidad = $request->Cantidad;
                $Movimiento->tipo_movimiento = 'Entrada de mercancia';
                $Movimiento->stock_id = $Stock_Id;
                $Movimiento->save();
            }catch(Exception $e){
                Log::error("Error en al registrar movimiento: " . $e->getMessage());
            }
        }else{
            $cantidad_nueva = $buscar->cantidad + $request->Cantidad;

            $buscar->update(['cantidad' => $cantidad_nueva]);
            $Movimiento = new Movimiento();
            $Movimiento->cantidad = $request->Cantidad;
            $Movimiento->tipo_movimiento = 'Entrada de mercancia';
            $Movimiento->stock_id = $buscar->id_stock;
            $Movimiento->save();
        }

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with(['Repartido' => 'Producto Repartido']);
    }

    public function Modificar_Producto(Request $request){
        $request->validate([
            'Id_prod'=>'required|integer',
            'Nombre'=>'required|string',
            'Cantidad'=>'required|integer',
            'Precio'=>'required|numeric|regex:/^\d+(\.\d{1,2})?$/',
            'Descripcion'=>'required|string',
            'Codigo'=>'required|string',
        ]);

        try{
            $Producto = Producto::find($request->Id_prod);
            $Producto->update([
                'nombre_producto' => $request->Nombre,
                'precio_producto' => $request->Precio,
                'descripcion_producto' => $request->Descripcion,
                'codigo_producto' => $request->Codigo
            ]);

            Stock::where('producto_id',$request->Id_prod)->update(['cantidad' => $request->Cantidad]);

        }catch(Exception $e){
            return redirect()->back()->withErrors(['Error_Actualizar' => 'No se actualizo']);
        }

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with(['Actualizado' => 'Producto Actualizado']);
    }

    public function quitar_producto($id){
        $producto = Producto::find($id); // Buscar el producto por su ID

        if ($producto) {
            $producto->delete();
            return back()->with('success', 'Producto eliminado del carrito');
        }
    }
    

}
