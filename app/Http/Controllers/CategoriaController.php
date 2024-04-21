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

    public function ProductoxCategoria(Request $request){
        session_start();
        $CategoriaProducto = Http::get('http://localhost:8081/api/producto.ProductosXcategoria', [
            "idCategoria"=>intval($request->categoria),
        ]);

        $productos = $CategoriaProducto->json();

        $TraerCategorias = Http::get('http://localhost:8081/api/Categoria/TraerCategorias');
        $categorias = $TraerCategorias->json();

        return view('FiltroProductosCategoria', compact('productos' , 'categorias'));

    }
}
