<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Sucursal;
use App\Models\Tipo_Usuario;
use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Administrador_Controller extends Controller
{
    public function Inicio(){
        //Llama la instancia de los datos de Sesión y los guarda en una variable
        $usuario = Auth::user();

        // Verifica si el tipo de usuario no es el que esperas (por ejemplo, si el tipo_usuario_id no es igual a 1, O si no hay un tipo de usuario)
        if (!$usuario || $usuario->tipo_usuario_id !== 1) {
            // Redirige a otra página (por ejemplo, la página de inicio)
            return redirect()->route('Pagina_Error')->withErrors(['error' => 'No tienes permiso para acceder a esta página.', 'Titulo'=>'Acceso Denegado']);
        }
        //Si hay un tipo de usuario y si es igual a 1 ejecuta el código de la vista
        else{
            $Productos = Producto::join('categorias', 'productos.categoria_id', '=', 'categorias.id_categoria')
            ->join('stocks', 'productos.id_producto', '=', 'stocks.producto_id')
            ->join('sucursales', 'sucursales.id_sucursal', '=', 'stocks.sucursal_id')
            ->select('productos.*', 'stocks.cantidad as cantidad', 'sucursales.nombre_sucursal as sucursal', 'sucursales.id_sucursal as suc', 'categorias.nombre_categoria as categoria')
            ->get();
            return view('Admin_Inicio', compact('Productos'));
        }
    }

    public function Agregar_Productos_Vista(){
        $usuario = Auth::user();

        // Verifica si el tipo de usuario no es el que esperas (por ejemplo, tipo_usuario_id = 1)
        if (!$usuario || $usuario->tipo_usuario_id !== 1) {
            // Redirige a otra página (por ejemplo, la página de inicio)
            return redirect()->route('Pagina_Error');
        }else{

            $Proveedores = Proveedor::all();
            $Sucursales = Sucursal::all();
            $Categorias = Categoria::all();
            return view('Agregar_Productos', compact('Categorias','Sucursales', 'Proveedores'));
        }
    }

    public function Agregar_Usuarios_Vista(){
        $usuario = Auth::user();

        // Verifica si el tipo de usuario no es el que esperas (por ejemplo, tipo_usuario_id = 1)
        if (!$usuario || $usuario->tipo_usuario_id !== 1) {
            // Redirige a otra página (por ejemplo, la página de inicio)
            return redirect()->route('Pagina_Error');
        }else{
            $Sucursales = Sucursal::all();
            $Tipos_Usuarios = Tipo_Usuario::all();

            $datos_usuarios = Usuario::join('personas','personas.usuario_id','=','usuarios.id_usuario')
            ->join('sucursales', 'usuarios.sucursal_id', '=', 'sucursales.id_sucursal')
            ->join('tipos_usuarios', 'tipos_usuarios.id_tipo_usuario', '=', 'usuarios.tipo_usuario_id')
            ->select('personas.*', 'usuarios.*', 'sucursales.*', 'tipos_usuarios.*')
            ->get();

            return view('Agregar_Usuarios', compact('Sucursales', 'Tipos_Usuarios', 'datos_usuarios'));
        }
    }

    public function Modificar_producto($id, $suc){
        $usuario = Auth::user();
        
        if( !$usuario || $usuario->tipo_usuario_id !== 1){
            return redirect()->route('Pagina_Error');
        }else{
            

            $datos_producto = Producto::join('stocks', 'stocks.producto_id', '=', 'productos.id_producto')
            ->join('sucursales', 'sucursales.id_sucursal', '=', 'stocks.sucursal_id')
            ->where('productos.id_producto', $id)
            ->where('sucursales.id_sucursal', $suc)
            ->select('productos.*', 'stocks.cantidad as cantidad', 'sucursales.nombre_sucursal as sucursal')
            ->first();

            return view('Modificar_Producto', compact('datos_producto'));
        }
    }

    public function Mostrar_Pedidos(){
        $usuario = Auth::user();
        
        if( !$usuario || $usuario->tipo_usuario_id !== 1){
            return redirect()->route('Pagina_Error');
        }else{
            $Datos = Pedido::join('productos_pedidos', 'productos_pedidos.pedido_id', '=', 'pedidos.id_pedido')
            ->join('productos', 'productos.id_producto', '=', 'productos_pedidos.producto_id')
            ->join('personas', 'personas.usuario_id', '=', 'pedidos.usuario_id')
            ->where('pedidos.estado_pedido', 'Por Entregar')
            ->select('productos.*', 'productos_pedidos.*', 'pedidos.*', 'personas.*')
            ->get();

            $Datos2 = Pedido::join('productos_pedidos', 'productos_pedidos.pedido_id', '=', 'pedidos.id_pedido')
            ->join('productos', 'productos.id_producto', '=', 'productos_pedidos.producto_id')
            ->join('personas', 'personas.usuario_id', '=', 'pedidos.usuario_id')
            ->where('pedidos.estado_pedido', 'Entregado')
            ->whereDate('pedidos.fecha_pedido', '>=', Carbon::now()->subDays(30))  // Filtrar pedidos de los últimos 30 días
            ->select('productos.*', 'productos_pedidos.*', 'pedidos.*', 'personas.*')
            ->get();

            $total_mes = Pedido::where('estado_pedido', 'Entregado')
            ->whereDate('fecha_pedido', '>=', Carbon::now()->subDays(30))  // Filtrar pedidos de los últimos 30 días
            ->sum('monto_pedido'); 

            return view('Pedidos', compact('Datos', 'Datos2', 'total_mes'));
        }
        
    }

    public function Vista_Reportes(){
        $usuario = Auth::user();
        
        if( !$usuario || $usuario->tipo_usuario_id !== 1){
            return redirect()->route('Pagina_Error');
        }else{
            $Sucursales = Sucursal::all();
            return view('Reportes', compact('Sucursales'));
        }
    }

    public function Vista_Sucursales(){
        $usuario = Auth::user();

        // Verifica si el tipo de usuario no es el que esperas (por ejemplo, tipo_usuario_id = 1)
        if (!$usuario || $usuario->tipo_usuario_id !== 1) {
            // Redirige a otra página (por ejemplo, la página de inicio)
            return redirect()->route('Pagina_Error');
        }else{
            $Sucursales = Sucursal::all();
            return view('Administrar_Sucursales', compact('Sucursales'));
        }
    }

    public function Modificar_Sucursal($id){
        $usuario = Auth::user();

        // Verifica si el tipo de usuario no es el que esperas (por ejemplo, tipo_usuario_id = 1)
        if (!$usuario || $usuario->tipo_usuario_id !== 1) {
            // Redirige a otra página (por ejemplo, la página de inicio)
            return redirect()->route('Pagina_Error');
        }else{
            $Sucursal = Sucursal::find($id);
            return view('Modificar_Sucursal', compact('Sucursal'));
        }
    }

    public function Modificar_Usuario($id){
        $usuario = Auth::user();

        // Verifica si el tipo de usuario no es el que esperas (por ejemplo, tipo_usuario_id = 1)
        if (!$usuario || $usuario->tipo_usuario_id !== 1) {
            // Redirige a otra página (por ejemplo, la página de inicio)
            return redirect()->route('Pagina_Error');
        }else{
            $Tipos_Usuarios = Tipo_Usuario::all();

            $Datos = Usuario::join('personas','personas.usuario_id','=','usuarios.id_usuario')
            ->join('tipos_usuarios', 'tipos_usuarios.id_tipo_usuario', '=', 'usuarios.tipo_usuario_id')
            ->where('usuarios.id_usuario', $id)
            ->select('personas.*', 'usuarios.*', 'tipos_usuarios.*')
            ->first();

            return view('Modificar_Usuario', compact('Datos', 'Tipos_Usuarios'));
        }
    }

    public function Modificar_Proveedor($id){
        $usuario = Auth::user();

        // Verifica si el tipo de usuario no es el que esperas (por ejemplo, tipo_usuario_id = 1)
        if (!$usuario || $usuario->tipo_usuario_id !== 1) {
            // Redirige a otra página (por ejemplo, la página de inicio)
            return redirect()->route('Pagina_Error');
        }else{
            $Proveedor = Proveedor::find($id);
            return view('Modificar_Proveedor', compact('Proveedor'));
        }
    }

    public function Mostrar_Proveedores(){

        $usuario = Auth::user();

        // Verifica si el tipo de usuario no es el que esperas (por ejemplo, tipo_usuario_id = 1)
        if (!$usuario || $usuario->tipo_usuario_id !== 1) {
            // Redirige a otra página (por ejemplo, la página de inicio)
            return redirect()->route('Pagina_Error');
        }else{
            $Proveedores =  Proveedor::all();
        return view('Mostrar_Proveedores', compact('Proveedores'));
        }
        
    }

    public function Movimientos_Vista(){
        $usuario = Auth::user();

        // Verifica si el tipo de usuario no es el que esperas (por ejemplo, tipo_usuario_id = 1)
        if (!$usuario || $usuario->tipo_usuario_id !== 1) {
            // Redirige a otra página (por ejemplo, la página de inicio)
            return redirect()->route('Pagina_Error');
        }else{
            $movimientos = Producto::join('stocks', 'productos.id_producto', '=', 'stocks.producto_id')
                ->join('sucursales', 'sucursales.id_sucursal', '=', 'stocks.sucursal_id')
                ->join('movimientos', 'stocks.id_stock', '=', 'movimientos.stock_id')
                ->select('productos.*', 'movimientos.created_at as fecha', 'movimientos.tipo_movimiento as movimiento', 'movimientos.cantidad as cantidad', 'sucursales.nombre_sucursal as sucursal')
                ->get();
            return view('Movimientos', compact('movimientos'));
        }
    }
}
