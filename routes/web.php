<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\NegocioConroller;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;

Route::get('/', function () {
    return view('Login');
})->name("Login");

//Usuarios
Route::post('/Login', [UsuarioController::class,'IniciarSesion'])->name('usuario.Login');
Route::get('/Usuario/CrearUsuario', [UsuarioController::class,'CrearUsusarioNuevo'])->name('usuario.CrearUsusario');
Route::post('/Usuario/GuardarUsuario', [UsuarioController::class,'GuardarUsuario'])->name('usuario.GuardarUsuario');


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

//Producto ======================================================================
Route::get('/product/crearProducto/{idNegocio}',[ProductoController::class, 'CrearProducto'])->name('producto.CrearProducto');
Route::post('/product/GuardarProducto/{idNegocio}',[ProductoController::class, 'GuardarProducto'])->name('producto.GradarProducto');

//Categoria =====================================================================
Route::get('/categoria/crearCategoria', [CategoriaController::class, 'agregarCategoria'])->name('categoria.agregarCategoria');
Route::Post('/categoria/guardarCategoria', [CategoriaController::class, 'guardarCategoria'])->name('categoria.guardarCategoria');


