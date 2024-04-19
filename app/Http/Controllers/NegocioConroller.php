<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NegocioConroller extends Controller
{
    public function agregarNegocio(){
        session_start();
        return view("CrearNegocio");
    }

    public function verMapa(){
        $obtenerRepartidores = Http::get('http://localhost:8081/api/Usuario/TraerRepartidores');
        $repartidores = $obtenerRepartidores->json();

        $obtenerNegocios = Http::get('http://localhost:8081/api/negocio/TodosNegocios');
        $negocios = $obtenerNegocios->json();

        return view('MapaAdministrador', compact('repartidores', 'negocios'));
    }

    public function guardarNegocio(Request $request){
        session_start();

        $image = ($_FILES['imagen']['tmp_name']);

        $carpetaImagenesNegocios = "../public/imagenesNegocios";

        $nombreImagen = md5(uniqid(rand(), true)).'.jpg';

        if (!is_dir($carpetaImagenesNegocios)){
            mkdir($carpetaImagenesNegocios);  //Creamos el directorio de imagenes
        }

        $guardarNegocio = Http::post('http://localhost:8081/api/negocio/crear',[
            'nombre'=>$request->nombreNegocio,
            'telefono'=>$request->telefonoNegocio,
            'hora_apertura'=>$request->horaApertura,
            'hora_cierre'=>$request->horaCierre,
            'latitud'=>$request->latitud,
            'longitud'=>$request->longitud,
            'descripcion'=>$request->descripcion,
            'imagen'=>$nombreImagen,
            'usuarios'=>[
                "email"=>$request->email,
                "contrasena"=>$request->contrasena,
                "telefono"=>$request->telefonoUsuario,
                "personas"=>[
                    "primernombre"=>$request->primerNombre,
                    "segundonombre"=>$request->segundoNombre,
                    "primerapellido"=>$request->primerApellido,
                    "segundoapellido"=>$request->segundoApellido
                ]
            ]

        ]);

        move_uploaded_file($image , $carpetaImagenesNegocios.'/'.$nombreImagen);

        if($guardarNegocio){
            return view('MenuAdministrador');
        }else {
            return redirect('/negocio/agregarNegocio');
        };
    }

    public function traerProductosXnegocio($idnegocio){

        $productosNegocio = Http::get('http://localhost:8081/api/Producto/ProductoxNegocio',[
            "idNegocio" => $idnegocio,
        ]);

        $productos  = $productosNegocio->json();
        return view('menuProductosNegocios', compact('productos'));
    }

    public function mostrarNegocios(){
        $negocios1 = Http::get('http://localhost:8081/api/negocio/TodosNegocios');
        $negocios = $negocios1->json();

        return view('MenuUsuario', compact('negocios'));
    }
    
}
