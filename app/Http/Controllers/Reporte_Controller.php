<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Producto;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Reporte_Controller extends Controller
{
    public function Reporte_Productos(Request $request)
    {
        $id = $request->Sucursal;
        // Ejecutar la consulta para obtener los productos
        $productos = Producto::join('categorias', 'productos.categoria_id', '=', 'categorias.id_categoria')
            ->join('stocks', 'productos.id_producto', '=', 'stocks.producto_id')
            ->join('sucursales', 'sucursales.id_sucursal', '=', 'stocks.sucursal_id')
            ->where('sucursales.id_sucursal', $id)
            ->select('productos.*', 'stocks.cantidad as cantidad', 'sucursales.nombre_sucursal as sucursal', 'categorias.nombre_categoria as categoria')
            ->get();

        // Cargar la vista y pasar los datos
        $pdf = Pdf::loadView('Reportes/Reporte_Productos', ['data' => $productos]);
        
        // Retornar el PDF para visualizar o descargar
        return $pdf->stream('reporte_productos.pdf'); // Para mostrar en el navegador
    }

    public function Reporte_Productos_Movimientos(Request $request){
        $id_sucursal = $request->Sucursal_1;
        // Ajustar las fechas
        
        $fecha_inicio = Carbon::parse($request->Fecha_inicio)->startOfDay(); // Inicio del día
        $fecha_fin = Carbon::parse($request->Fecha_fin)->endOfDay();       // Final del día
        $productos = [];
        if ($request->Movimiento == 3) {
            $productos = Producto::join('stocks', 'productos.id_producto', '=', 'stocks.producto_id')
                ->join('sucursales', 'sucursales.id_sucursal', '=', 'stocks.sucursal_id')
                ->join('movimientos', 'stocks.id_stock', '=', 'movimientos.stock_id')
                ->where('sucursales.id_sucursal', $id_sucursal)
                ->whereBetween('movimientos.created_at', [$fecha_inicio, $fecha_fin])
                ->select('productos.*', 'movimientos.created_at as fecha', 'movimientos.tipo_movimiento as movimiento', 'movimientos.cantidad as cantidad', 'sucursales.nombre_sucursal as sucursal')
                ->get();
        } elseif ($request->Movimiento == 2) {
            $productos = Producto::join('stocks', 'productos.id_producto', '=', 'stocks.producto_id')
                ->join('sucursales', 'sucursales.id_sucursal', '=', 'stocks.sucursal_id')
                ->join('movimientos', 'stocks.id_stock', '=', 'movimientos.stock_id')
                ->where('sucursales.id_sucursal', $id_sucursal)
                ->where('movimientos.tipo_movimiento', 'Salida de mercancia')
                ->whereBetween('movimientos.created_at', [$fecha_inicio, $fecha_fin])
                ->select('productos.*', 'movimientos.created_at as fecha', 'movimientos.tipo_movimiento as movimiento', 'movimientos.cantidad as cantidad', 'sucursales.nombre_sucursal as sucursal')
                ->get();
        } elseif ($request->Movimiento == 1) {
            $productos = Producto::join('stocks', 'productos.id_producto', '=', 'stocks.producto_id')
                ->join('sucursales', 'sucursales.id_sucursal', '=', 'stocks.sucursal_id')
                ->join('movimientos', 'stocks.id_stock', '=', 'movimientos.stock_id')
                ->where('sucursales.id_sucursal', $id_sucursal)
                ->where('movimientos.tipo_movimiento', 'Entrada de mercancia')
                ->whereBetween('movimientos.created_at', [$fecha_inicio, $fecha_fin])
                ->select('productos.*', 'movimientos.created_at as fecha', 'movimientos.tipo_movimiento as movimiento', 'movimientos.cantidad as cantidad', 'sucursales.nombre_sucursal as sucursal')
                ->get();
        }
        $pdf = Pdf::loadView('Reportes/Reporte_Productos_Movimientos', ['data' => $productos]);
        return $pdf->stream('reportes_movimientos.pdf');
    }

    public function Reporte_Ventas(Request $request){
        $request->validate([
            'Sucursal_2' => 'required|integer|exists:sucursales,id_sucursal',
            'Fecha_inicio_ventas' => 'required|date',
            'Fecha_fin_ventas' => 'required|date|after_or_equal:Fecha_inicio_ventas',
        ]);

        Log::info($request->all());
        $id_sucursal = $request->Sucursal_2;
    
        // Ajustar las fechas
        $fecha_inicio = Carbon::parse($request->Fecha_inicio_ventas)->startOfDay(); // Inicio del día
        $fecha_fin = Carbon::parse($request->Fecha_fin_ventas)->endOfDay();       // Final del día
    
        try{
            $ventas = Producto::join('stocks', 'productos.id_producto', '=', 'stocks.producto_id')
            ->join('sucursales', 'sucursales.id_sucursal', '=', 'stocks.sucursal_id')
            ->join('movimientos', 'stocks.id_stock', '=', 'movimientos.stock_id')
            ->where('sucursales.id_sucursal', $id_sucursal)
            ->where('movimientos.tipo_movimiento', 'Salida de mercancia')
            ->whereBetween('movimientos.created_at', [$fecha_inicio, $fecha_fin])
            ->get();

            Log::info($ventas);
    
            $pdf = Pdf::loadView('Reportes/Reporte_Ventas', ['data' => $ventas]);
        
            return $pdf->stream('reportes_ventas.pdf');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('Vista_Reportes')->with('error', 'Error al generar el reporte de ventas');
        }
    }
}
