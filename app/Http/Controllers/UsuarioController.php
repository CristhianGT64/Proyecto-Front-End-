<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UsuarioController extends Controller
{
    public function IniciarSesion(Request $request){
        //Consumo de la api
        $ususario = Http::get('http://localhost:8081/api/Ususario/IniciarSesion',[
            'correo'=>$request->email, //Parametros entre '' definidos en java el $request son las que manda la vista
            'contrasena'=>$request->contrasena
        ]);
        //Pasar de json a arreglo
        $UsusarioActivo = $ususario->json();

        //Validamos si existe el usuario y no sea null
        if($UsusarioActivo){
            //Si no es null comprobamos que tipo de usuario es
            return $this->ValidarTipoUsuario($UsusarioActivo);
        }

        //Si es null regresa al login
        return redirect('/');
    }

    public function ValidarTipoUsuario($UsusarioActivo){

        /* La siguiente linea se comento solo para que quede como ejemplo
        en ese var_dump demuestra como estan los datos en el arreglo y como
        los vamos a manipular, debido al json, los datos viajan con los mismos
        parametros que tenemos en la entidad en java */
        // var_dump($UsusarioActivo['idusuario']);
        // exit;

        //Con este dependiedo de que tipo de usuario sea lo enviara a su vista
        if($UsusarioActivo['idusuario'] === 1){
            return view('MenuAdministrador');
        }
        else if($UsusarioActivo['idusuario'] === 2){
            return view('MenuUsuario');
        }
        elseif($UsusarioActivo['idusuario'] === 3){
            return view('MenuRepartidor');
        }

        return redirect('/');
    }

    public function MenuAdministrador($UsusarioActivo){
        var_dump($UsusarioActivo);
        exit;
        return view('MenuAdministrador');
    }
    
}
