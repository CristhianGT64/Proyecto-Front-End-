<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NegocioConroller extends Controller
{
    public function agregarNegocio(){
        return view("CrearNegocio");
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
