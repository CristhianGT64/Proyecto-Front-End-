<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\NegocioConroller;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

Route::get('/', function () {
    session_abort();
    // exit;
    return view('Login');
})->name("Login");

//Usuarios ================================================
Route::post('/Login', [UsuarioController::class,'IniciarSesion'])->name('usuario.Login');
Route::get('/Usuario/CrearUsuario', [UsuarioController::class,'CrearUsusarioNuevo'])->name('usuario.CrearUsusario');
Route::post('/Usuario/GuardarUsuario', [UsuarioController::class,'GuardarUsuario'])->name('usuario.GuardarUsuario');
Route::get('/Usuario/UsuarioAdministradorMenu', [UsuarioController::class,'VolverMenuAdministrador'])->name('usuario.MenuAdministrador');
Route::get('/Usuario/CrearRepartidor', [UsuarioController::class,'CrearRepartidor'])->name('usuario.CrearRepartidor');
Route::post('/Usuario/GuardarRepartidor', [UsuarioController::class,'GuardarRepartidor'])->name('usuario.GuardarRepartidor');


//Pruebas de vistas
// Route::get('/prueba/MapaMarcadores', function () {
//     $obtenerRepartidores = Http::get('http://localhost:8081/api/Usuario/TraerRepartidores');
//     $repartidores = $obtenerRepartidores->json();
//     return view('PruebaMapaMarcadores', compact('repartidores'));
// })->name("Login");


//Negocios =====================================================================
Route::get('/negocio/agregarNegocio',[NegocioConroller::class, 'agregarNegocio'])->name('negocio.agregarNegocio');
Route::post('/negocio/guardarNegocio', [NegocioConroller::class, 'guardarNegocio'])->name('negocio.guardarNegocio');
Route::get('/negocio/VerMapa', [NegocioConroller::class, 'verMapa'])->name('negocio.mapa');
Route::get('/negocio/VerProductos/{idnegocio}',[NegocioConroller::class, 'traerProductosXnegocio'])->name('negocio.negocioProductos');
Route::get('/negocio/MostrarNegocios',[NegocioConroller::class, 'mostrarNegocios'])->name('negocio.mostrarNegocios');

//Producto ======================================================================
Route::get('/product/crearProducto/{idNegocio}',[ProductoController::class, 'CrearProducto'])->name('producto.CrearProducto');
Route::post('/product/GuardarProducto/{idNegocio}',[ProductoController::class, 'GuardarProducto'])->name('producto.GradarProducto');
Route::get('/product/ActualizarProducto/{idProducto}',[ProductoController::class, 'ActualizarProducto'])->name('producto.ActualizaProducto');
Route::put('/product/GuadarCambiosProducto/{idnegocio}/{idproducto}',[ProductoController::class, 'GuardarCambiosProductos'])->name('producto.GuardarCambios');
Route::get('/product/ConsultaEliminarProducto/{idProducto}',[ProductoController::class, 'ConsultaEliminarProducto'])->name('producto.consEliminarProducto');
Route::get('/product/EliminarProducto/{idProducto}',[ProductoController::class, 'EliminarProducto'])->name('producto.EliminarProducto');
Route::get('/product/MenuPrincipal',[ProductoController::class, 'regresarMenuPrincipal'])->name('negocio.menuPrincipal');
Route::get('/product/CerrarSesion',[ProductoController::class, 'cerrarSesion'])->name('negocio.cerrarSesionAdminENegocio');



//Categoria =====================================================================
Route::get('/categoria/crearCategoria', [CategoriaController::class, 'agregarCategoria'])->name('categoria.agregarCategoria');
Route::Post('/categoria/guardarCategoria', [CategoriaController::class, 'guardarCategoria'])->name('categoria.guardarCategoria');



//Pedido =============================================================================

Route::get('/pedidido/agregarProductoApedido/{idProducto}', [PedidoController::class, 'agregarProductoApedido'])->name('pedido.agregarProductoCarrito');
Route::get('/pedido/verDetalles', [PedidoController::class, 'verPedido'])->name('pedido.verPedido');
