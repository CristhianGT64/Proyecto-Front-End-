<?php

use App\Http\Controllers\NegocioConroller;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Login');
})->name("Login");

//Usuarios
Route::post('/Login', [UsuarioController::class,'IniciarSesion'])->name('usuario.Login');
Route::get('/Usuario/CrearUsuario', [UsuarioController::class,'CrearUsusarioNuevo'])->name('usuario.CrearUsusario');
Route::post('/Usuario/GuardarUsuario', [UsuarioController::class,'GuardarUsuario'])->name('usuario.GuardarUsuario');


//Pruebas de vistas
Route::get('/prueba/MapaMarcadores', function () {
    return view('PruebaMapaMarcadores');
})->name("Login");


//Negocios =====================================================================
Route::get('/negocio/agregarNegocio',[NegocioConroller::class, 'agregarNegocio'])->name('negocio.agregarNegocio');
Route::post('/negocio/guardarNegocio', [NegocioConroller::class, 'guardarNegocio'])->name('negocio.guardarNegocio');


