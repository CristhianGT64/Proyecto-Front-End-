<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CategoriaController extends Controller
{
    public function agregarCategoria(){
        session_start();
        return view("AgregarCategoria");
    }

    public function guardarCategoria(Request $request){
        session_start();
        

        $guardarCategoria = Http::post("http://localhost:8081/api/Categoria/CrearCategoria",[
            "nombre"=> $request->nombre
        ]);


        if($guardarCategoria){
            return view('MenuAdministrador');
        }else{
            return view('AgregarCategoria');
        }
    }
}
