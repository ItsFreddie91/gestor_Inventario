<?php

use App\Http\Controllers\Administrador_Controller;
use App\Http\Controllers\Almacenista_Controller;
use App\Http\Controllers\Categoria_Controller;
use App\Http\Controllers\Error_Controller;
use App\Http\Controllers\Gerente_Controller;
use App\Http\Controllers\Login_Controller;
use App\Http\Controllers\Productos_Controller;
use App\Http\Controllers\Proveedor_Controller;
use App\Http\Controllers\Reporte_Controller;
use App\Http\Controllers\Sucursal_Controller;
use App\Http\Controllers\Tienda_Controller;
use App\Http\Controllers\Usuario_Controller;
use Illuminate\Support\Facades\Route;

#----Rutas del Cliente----#
Route::get('/', [Tienda_Controller::class,'Tienda'])->name('Index');
Route::get('/Details/{id}', [Tienda_Controller::class, 'Details'])->name('Details');
Route::get('/Cart', [Tienda_Controller::class, 'View_Cart'])->name('Cart');
Route::get('/Checkout', [Tienda_Controller::class, 'View_Checkout'])->name('View_Checkout');
Route::post('/Add_Carrito/{id}', [Tienda_Controller::class, 'agregar_carrito'])->name('add_carrito');
Route::delete('/Remove_Carrito/{id}', [Tienda_Controller::class, 'quitar_carrito'])->name('remove_carrito');
Route::patch('/Actualizar_Carrito/{rowId}',[Tienda_Controller::class, 'actualizar_carrito'])->name('update_carrito');
Route::get('/Mis_compras', [Tienda_Controller::class, 'Historial'])->name('Mis_compras');
Route::post('/Crear_Pedido', [Tienda_Controller::class, 'Crear_Pedido'])->name('Crear_Pedido');
Route::get('/search', [Tienda_Controller::class, 'Busqueda'])->name('Buscar_Producto');
Route::get('/profile', [Tienda_Controller::class, 'Vista_perfil'])->name('Perfil');

#----Rutas del Administrador----#
Route::get('/Admin_Inicio', [Administrador_Controller::class, 'Inicio'])->name('Admin_Inicio');
Route::get('/Agregar_Productos', [Administrador_Controller::class,'Agregar_Productos_Vista'])->name('Agregar_Productos');
Route::get('/Agregar_Usuarios', [Administrador_Controller::class, 'Agregar_Usuarios_Vista'])->name('Agregar_Usuarios');
Route::get('/Modificar_Vista/{id}/{Suc}', [Administrador_Controller::class, 'Modificar_producto'])->name('Modificar_p_vista');
Route::get('/Pedidos', [Administrador_Controller::class, 'Mostrar_Pedidos'])->name('Pedidos');
Route::get('/Report_View', [Administrador_Controller::class, 'Vista_Reportes'])->name('Vista_Reportes');
Route::get('/Sucursales',[Administrador_Controller::class, 'Vista_Sucursales'])->name('Vista_Sucursales');
Route::get('/Modificar_Suc/{id}', [Administrador_Controller::class, 'Modificar_Sucursal'])->name('Modificar_Sucursal');
Route::get('/Modificar_Usuario/{id}', [Administrador_Controller::class, 'Modificar_Usuario'])->name('Modificar_Usuario');
Route::get('/Modificar_Proveedor/{id}', [Administrador_Controller::class, 'Modificar_Proveedor'])->name('Modificar_Proveedor');
Route::get('/Proveedores', [Administrador_Controller::class, 'Mostrar_Proveedores'])->name('Mostrar_Proveedores');
Route::get('/Movimientos', [Administrador_Controller::class, 'Movimientos_Vista'])->name('Movimientos');

#----Rutas del Almacenista----#
Route::get('/Almacenista_Inicio', [Almacenista_Controller::class, 'Inicio'])->name('Almacenista_Inicio');

#---Rutas del Gerente---#
Route::get('/Gerente_Inicio', [Gerente_Controller::class, 'Gerente_Vista'])->name('Gerente_Inicio');
Route::get('/Reportes_Gerentes', [Gerente_Controller::class, 'Reportes_gerentes'])->name('Reportes_Gerentes');

#----Rutas de Error----#
Route::get('/Pagina_Error', [Error_Controller::class, 'Pagina_Error'])->name('Pagina_Error');

#----Rutas de Categorias----#
Route::post('/store', [Categoria_Controller::class, 'store'])->name('store_categoria');
Route::get('/Productos', function(){
    return view('Productos');
});

#---Rutas de Sucursales---#
Route::post('/Agregar_Sucursal', [Sucursal_Controller::class, 'Agregar_Ubicacion'])->name('Agregar_Sucursal');
Route::delete('/Eliminar_Sucursal/{id}', [Sucursal_Controller::class, 'Eliminar_Sucursal'])->name('remove_sucursal');
Route::put('/Actualizar_Sucursal', [Sucursal_Controller::class, 'Actualizar_Suc'])->name('Actualizar_Sucursal');

#---Rutas de Proveedores---#
Route::post('/Agregar_Proveedor',[Proveedor_Controller::class, 'Agregar_Proveedor'])->name('Agregar_Proveedor');
Route::delete('/Eliminar_Proveedor/{id}', [Proveedor_Controller::class, 'Eliminar_Proveedor'])->name('Eliminar_Proveedor');
Route::put('/Actualizar_Proveedor', [Proveedor_Controller::class, 'Actualizar_Proveedor'])->name('Actualizar_Proveedor');
#----Rutas del Login----#
Route::get('/Cliente_Login',[Login_Controller::class,'Login'])->name('Login');
Route::post('/registrar',[Login_Controller::class,'registrar'])->name('registrar');
Route::post('/Iniciar_Sesion', [Login_Controller::class, 'Iniciar_Sesion'])->name('Iniciar_Sesion');
Route::post('/Logout', [Login_Controller::class, 'Logout'])->name('Logout');

#---Rutas de Productos---#
Route::post('/Registrar_Producto',[Productos_Controller::class, 'Agregar'])->name('Registrar_Producto');
Route::post('/Repartir_Producto', [Productos_Controller::class, 'repartir_Productos'])->name('Repartir_Productos');
Route::put('/actualizar_prod', [Productos_Controller::class, 'Modificar_Producto'])->name('Actualizar_Producto');
Route::delete('/remove_producto/{id}', [Productos_Controller::class, 'quitar_producto'])->name('remove_producto');

#---Reportes---#
Route::get('/reporte_productos/pdf', [Reporte_Controller::class, 'Reporte_Productos'])->name('reporte_productos.pdf');
Route::get('/reportes_prod_mov/pdf', [Reporte_Controller::class, 'Reporte_Productos_Movimientos'])->name('reportes_movimientos.pdf');
Route::get('/reportes_ventas/pdf', [Reporte_Controller::class, 'Reporte_Ventas'])->name('reporte_ventas.pdf');

#---Usuarios---#
Route::post('/registrar_usuario', [Usuario_Controller::class, 'Agregar_Usuarios'])->name('Registrar_Usuarios');
Route::delete('/eliminar_usuario/{id}', [Usuario_Controller::class, 'Borrar_Usuario'])->name('Eliminar_Usuario');
Route::put('/actualizar_usuario', [Usuario_Controller::class, 'Actualizar_Usuario'])->name('Actualizar_Usuario');
Route::put('/Cambiar_Contrasena', [Usuario_Controller::class, 'Actulizar_Contrasena'])->name('Cambiar_Contrasena');

#---Pedidos---#
Route::put('/Entregar_pedido/{id}', [Tienda_Controller::class, 'Entregar_Pedido'])->name('Entregar_Pedido');