<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ReporteController extends Controller
{   
    //Para el administrador
    public function VerListaReportes(){
        session_start();

        //Traer todos los pedidos que se ha generado
        $ListaReportes = Http::get('http://localhost:8081/api/Pedido/ReportesPeidosTodos');

        $pedidos = $ListaReportes->json();

        return view('ListaPedidos', compact('pedidos'));
    }

    public function GenerarReportePedido($idPedido){

        //Buscamos el id del pedido
        $BuscarPedido = Http::get('http://localhost:8081/api/Pedido/ReportePedidoEspecifico', [
            "idPedido"=>$idPedido,
        ]);

        $pedido = $BuscarPedido->json();

        return view('ReporteDetallado', compact('pedido'));
    }



    public function VerListaReportesNegocio($idNegocio){
        session_start();

        //Traer todos los pedidos que se ha generado
        $ListaReportes = Http::get('http://localhost:8081/api/Pedido/ReportesNegocio', [
            "idNegocio"=>$idNegocio,
        ]);

        $pedidos = $ListaReportes->json();

        return view('ListaPedidosNegocio', compact('pedidos', 'idNegocio'));
    }

    public function GenerarReportePedidoNegocio($idPedido, $idNegocio){

        //Buscamos el id del pedido
        $BuscarPedido = Http::get('http://localhost:8081/api/Pedido/ReportePedidoEspecifico', [
            "idPedido"=>$idPedido,
        ]);

        $pedido = $BuscarPedido->json();

        return view('ReporteDetalladoNegocio', compact('pedido', 'idNegocio'));
    }

    public function historialPedidosUsuario(){
        session_start();

        $RepostesUsuarios= Http::get('http://localhost:8081/api/Pedido/ReporteUsuario', [
            "idUsuario"=> $_SESSION['idUsuario'],
        ]);

        $pedidos1 = $RepostesUsuarios->json();

        $pedidos = array_reverse($pedidos1);

        return view('HistorialPedidosUsuario', compact('pedidos',));
    }


}
