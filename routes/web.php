<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Login');
})->name("Login");

//Usuarios
Route::post('/Login', [UsuarioController::class,'IniciarSesion'])->name('usuario.Login');
Route::get('/Usuario/Administrador', [UsuarioController::class,'MenuAdministrador'])->name('usuario.Administrador');

