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
            session_start(); //Super Glbal Para inicio de sesion
            $_SESSION["idUsuario"] = $UsusarioActivo['idusuario'];
            $_SESSION['idRol'] = $UsusarioActivo['roles']["idrol"];
            $_SESSION['nombre'] = $UsusarioActivo['personas']['primernombre'].' '.$UsusarioActivo['personas']['primerapellido'];
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
        if( $_SESSION['idRol'] === 1){
            return view('MenuAdministrador', compact('UsusarioActivo'));
        }
        else if( $_SESSION['idRol'] === 2){

            //Consumo de la Api para traer iformacion si existe un pedido en ejecucion
            $BuscarPedido = Http::get('http://localhost:8081/api/Pedido/TraerPedidosRepartidor', [
                "idRepartidor" =>  $_SESSION["idUsuario"],
            ]);

            $pedidoNuevo = $BuscarPedido->json();

            return view('MenuRepartido', compact('UsusarioActivo', 'pedidoNuevo'));
        }
        elseif( $_SESSION['idRol'] === 3){//Menu del usuario convencional
            
            return redirect('/negocio/MostrarNegocios');
        }
        elseif( $_SESSION['idRol'] === 4){
            return $this->NegocioAdministrador($UsusarioActivo);
        }
        return redirect('/');
    }
    //locastorage
    public function NegocioAdministrador($UsusarioActivo){
        //session_start(); //Super Glbal Para inicio de sesion
        //$_SESSION["idUsuario"] = $UsusarioActivo['idusuario'];
        $negocio = Http::get('http://localhost:8081/api/negocio/TraerNegocio', [
            "idUsuario" => $UsusarioActivo['idusuario']
        ]);
        $negocioUsuario = $negocio->json();
        $proucductosNegocio = Http::get('http://localhost:8081/api/Producto/ProductoxNegocio',[
            "idNegocio" => $negocioUsuario['idnegocio'],
        ]);
        $productos = $proucductosNegocio->json();

        return view('MenuAdministradorTienda', compact('negocioUsuario', 'productos'));
    }

    public function CrearRepartidor(){
        session_start();
        return view('CrearRepartidor');
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
            session_start();

            $ususario = Http::get('http://localhost:8081/api/Usuario/buscarPorEmail',[
                "email"=>$request->email, //Parametros entre '' definidos en java el $request son las que manda la vista
            ]);

            $UsusarioActivo = $ususario->json();

            $_SESSION["idUsuario"] = $UsusarioActivo['idusuario'];
            $_SESSION['idRol'] = $UsusarioActivo['roles']["idrol"];
            $_SESSION['nombre'] = $UsusarioActivo['personas']['primernombre'].' '.$UsusarioActivo['personas']['primerapellido'];

            return redirect('/negocio/MostrarNegocios');
        }
        return view('UsuarioNuevo');
    }

    public function VolverMenuAdministrador(){
        session_start();
        return view('MenuAdministrador');
    }

    public function GuardarRepartidor(Request $request){

        $GuardarRepartidor = Http::post('http://localhost:8081/api/Usuario/CrearRepartidor', [
            "personas"=>[
                "primernombre" => $request->primerNombre,
                "segundonombre" => $request->segundoNombre,
                "primerapellido"=> $request->primerApellido,
                "segundoapellido" => $request->segundoApellido,
            ],
            "email"=>$request->email,
            "contrasena"=>$request->contrasena,
            "telefono"=>$request->telefonoUsuario,
            "vehiculo"=>[
                "marca"=>$request->marca,
                "modelo"=>$request->modelo,
                "placa"=>$request->placa,
            ]
        ]);

        if($GuardarRepartidor->json()){
            return $this->VolverMenuAdministrador();
        }
        return $this->CrearRepartidor();

    }

    
}
