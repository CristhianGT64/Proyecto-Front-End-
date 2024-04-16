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
        // var_dump($UsusarioActivo);
        // exit;

        //Con este dependiedo de que tipo de usuario sea lo enviara a su vista
        if($UsusarioActivo['roles']["idrol"] === 1){
            return view('MenuAdministrador', compact('UsusarioActivo'));
        }
        else if($UsusarioActivo['roles']["idrol"] === 2){
            return view('MenuRepartido', compact('UsusarioActivo'));
        }
        elseif($UsusarioActivo['roles']["idrol"] === 3){
            return view('MenuUsuario', compact('UsusarioActivo'));
        }
        elseif($UsusarioActivo['roles']["idrol"] === 4){
            return $this->NegocioAdministrador($UsusarioActivo);
        }
        return redirect('/');
    }

    public function NegocioAdministrador($UsusarioActivo){
        session_start(); //Super Glbal Para inicio de sesion
        $_SESSION["idUsuario"] = $UsusarioActivo['idusuario'];
        $negocio = Http::get('http://localhost:8081/api/negocio/TraerNegocio', [
            "idUsuario" => $UsusarioActivo['idusuario']
        ]);
        $negocioUsuario = $negocio->json();
        return view('MenuAdministradorTienda', compact('negocioUsuario'));
    }

    public function CrearUsusarioNuevo(){
        return view('UsuarioNuevo');
    }

    public function GuardarUsuario(Request $request){
        $guardarUsuario =  Http::post('http://localhost:8081/api/Ususario/CrearUsuario', [
            "personas"=>[
                "primernombre"=>$request->primerNombre,
                "segundonombre"=>$request->segundoNombre,
                "primerapellido"=>$request->primerApellido,
                "segundoapellido"=>$request->segundoApellido
            ],
            "email"=>$request->email,
            "contrasena"=>$request->contrasena,
            "telefono"=>$request->telefono,
            "latitud"=>$request->latitud,
            "longitud"=>$request->longitud
        ]);

        if ($guardarUsuario){
            return redirect('/');
        }
        return view('UsuarioNuevo');
    }

    
}
