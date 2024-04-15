<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NegocioConroller extends Controller
{
    public function agregarNegocio(){
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
        $guardarNegocio = Http::post('http://localhost:8081/api/negocio/crear',[
            'nombre'=>$request->nombreNegocio,
            'telefono'=>$request->telefonoNegocio,
            'hora_apertura'=>$request->horaApertura,
            'hora_cierre'=>$request->horaCierre,
            'latitud'=>$request->latitud,
            'longitud'=>$request->longitud,
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

        var_dump($guardarNegocio->json());
        exit;

        if($guardarNegocio){
            return redirect('MenuAdministrador');
        }else {
            return view('CrearNegocio.blade');
        };
    }
    
}
