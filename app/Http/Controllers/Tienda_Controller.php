<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Movimiento;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Producto_Pedido;
use App\Models\Stock;
use App\Models\Usuario;
use Exception;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Tienda_Controller extends Controller
{
    public function Tienda(){
        $Productos = Producto::join('stocks', 'stocks.producto_id', '=', 'productos.id_producto')
        ->join('sucursales', 'sucursales.id_sucursal', '=', 'stocks.sucursal_id')
        ->where('sucursales.nombre_sucursal', 'Online')
        ->select('productos.*')
        ->paginate(8);
        return view('Index', compact('Productos'));
    }

    public function Busqueda(Request $request){
        $buscar = $request->busqueda;

        $Productos = Producto::join('stocks', 'stocks.producto_id', '=', 'productos.id_producto')
        ->join('sucursales', 'sucursales.id_sucursal', '=', 'stocks.sucursal_id')
        ->where('sucursales.nombre_sucursal', 'Online')
        ->when($buscar, function ($q) use ($buscar) {
                $q->where(function ($subQuery) use ($buscar) {
                $subQuery->where('productos.nombre_producto', 'like', '%' . $buscar . '%');
            });
        })
        ->select('productos.*')
        ->paginate(8);

        $total = $Productos->count();
        return view('Buscar', compact('Productos', 'total'));
    }

    public function Details($id){
        $datos_producto = Producto::find($id);

        $otros = Producto::where('categoria_id', $datos_producto->categoria_id)
        ->where('id_producto', '!=', $datos_producto->id_producto)
        ->limit(5)
        ->get();

        $categoria = Categoria::where('id_categoria', '=', $datos_producto->categoria_id)->first();

        return view('Detalles_Producto', compact('datos_producto', 'otros', 'categoria'));
    }

    public function View_Cart(){
        $usuario = Auth::user();
        if(!$usuario){
            return redirect()->route('Login');
        }elseif($usuario->tipo_usuario_id !== 4){
            return redirect()->route('Pagina_Error')->withErrors(['error' => 'No tienes permiso para acceder a esta página.', 'Titulo'=>'Acceso Denegado']);
        }else{
            return view('Cart');
        }
    }

    public function View_Checkout(){
        $usuario = Auth::user();
        if(!$usuario){
            return redirect()->route('Login');
        }elseif($usuario->tipo_usuario_id !== 4){
            return redirect()->route('Pagina_Error')->withErrors(['error' => 'No tienes permiso para acceder a esta página.', 'Titulo'=>'Acceso Denegado']);
        }else{
            return view('Checkout');
        }
    }

    public function Historial(){
        $usuario = Auth::user();
        if(!$usuario){
            return redirect()->route('Login');
        }elseif($usuario->tipo_usuario_id !== 4){
            return redirect()->route('Pagina_Error')->withErrors(['error' => 'No tienes permiso para acceder a esta página.', 'Titulo'=>'Acceso Denegado']);
        }else{
            $Datos = Pedido::join('productos_pedidos', 'productos_pedidos.pedido_id', '=', 'pedidos.id_pedido')
            ->join('productos', 'productos.id_producto', '=', 'productos_pedidos.producto_id')
            ->join('usuarios', 'usuarios.id_usuario', '=', 'pedidos.usuario_id')
            ->select('productos.*', 'productos_pedidos.*', 'pedidos.*')
            ->where('usuarios.id_usuario', '=', Auth::user()->id_usuario)
            ->orderBy('pedidos.id_pedido', 'desc')
            ->get();
            return view('Historial_Compras', compact('Datos'));
        }
    }

    public function agregar_carrito($id){
        $producto = Producto::join('categorias', 'productos.categoria_id', '=', 'categorias.id_categoria')
        ->select('productos.*', 'categorias.nombre_categoria as categoria')
        ->where('productos.id_producto', $id)
        ->firstOrFail();
        Cart::add(
            $producto->id_producto,           // ID del producto
            $producto->nombre_producto,       // Nombre del producto
            1,                                // Cantidad (por defecto 1)
            $producto->precio_producto,       // Precio del producto
            [
                'foto'=>$producto->foto_producto,
                'categoria'=>$producto->categoria
            ]
        );

        return back()->with('success', 'Producto añadido al carrito');
    }

    public function quitar_carrito($id){
        Cart::remove($id);
        return back()->with('success', 'Producto se quito del carrito');
    }

    public function actualizar_carrito(Request $request, $rowId){
        // Validar la cantidad para evitar valores inválidos
        $validar = $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        Cart::update($rowId, $request->quantity);

        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Cantidad actualizada correctamente.',
            ]);
        }

        return back()->with('success', 'Cantidad actualizada correctamente.');
    }

    public function Crear_Pedido(){
        $total = 0;

        foreach(Cart::content() as $producto){
            $total += $producto->qty * $producto->price;
        }

        $pedido = new Pedido();
        $pedido->fecha_pedido = now();
        $pedido->estado_pedido = 'Por Entregar';
        $pedido->monto_pedido = $total;
        $pedido->usuario_id = Auth::id();
        $pedido->save();

        $pedido_id = $pedido->id_pedido;
        
        // Guardar los productos del carrito en productos_pedidos
        foreach (Cart::content() as $item) {
            $Producto_Pedido = new Producto_Pedido();
            $Producto_Pedido->cantidad_producto_pedido= $item->qty;
            $Producto_Pedido->pedido_id = $pedido_id;
            $Producto_Pedido->producto_id = $item->id;
            $Producto_Pedido->save();

            $id_stock = Stock::where('producto_id', $item->id)
            ->where('sucursal_id', '=', 1)
            ->first();

            $movimiento = new Movimiento();
            $movimiento->cantidad = $item->qty;
            $movimiento->tipo_movimiento = 'Salida de mercancia';
            $movimiento->stock_id = $id_stock->id_stock;
            $movimiento->save();

            $nueva_cantidad = $id_stock->cantidad - $item->qty;

            Stock::where('id_stock',$id_stock->id_stock)->update(['cantidad' => $nueva_cantidad]);
        }

        //Vaciar el carrito despues de guardar los datos en la base
        session()->forget('cart');

        return redirect()->route('Mis_compras')->with('success', 'Pedido guardado exitosamente.');
    }

    public function Entregar_Pedido($id){
        $pedido = Pedido::find($id);

        if($pedido){
            try{
                $pedido->update([
                    'estado_pedido' => 'Entregado'
                ]);
                return back()->with('success', 'Pedido entregado correctamente.');
            }catch(Exception $e){
                Log::info("Error al actualizar: " . $e->getMessage());
                return back()->with('error', 'Error al actualizar el pedido.');
            }
        }
    }

    public function Vista_perfil(){
        $usuario = Auth::user();
        if(!$usuario){
            return redirect()->route('Login');
        }elseif($usuario->tipo_usuario_id !== 4){
            return redirect()->route('Pagina_Error')->withErrors(['error' => 'No tienes permiso para acceder a esta página.', 'Titulo'=>'Acceso Denegado']);
        }else{
            $datos = Usuario::join('personas', 'personas.usuario_id', '=', 'usuarios.id_usuario')
            ->where('usuarios.id_usuario', '=', Auth::user()->id_usuario)
            ->select('usuarios.*', 'personas.*')
            ->first();

            return view('Perfil', compact('datos'));
        }
    }
}
