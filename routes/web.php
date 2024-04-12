<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Login');
})->name("Login");

//Usuarios
Route::post('/Login', [UsuarioController::class,'IniciarSesion'])->name('usuario.Login');
Route::get('/Usuario/CrearUsuario', [UsuarioController::class,'CrearUsusarioNuevo'])->name('usuario.CrearUsusario');
Route::post('/Usuario/GuardarUsuario', [UsuarioController::class,'GuardarUsuario'])->name('usuario.GuardarUsuario');



