<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use function Laravel\Prompts\alert;

class PedidoController extends Controller
{
    public function verPedido(){
        session_start();

        $Productos = array();
        foreach ($_COOKIE as $name => $value) {
            //echo "$name : $value <br>";
            if ($name!="laravel_session" && $name!="XSRF-TOKEN" && $name !="PHPSESSID") {
                $nuevo=unserialize($_COOKIE[$name]);

                if ($nuevo['idUsuario']== $_SESSION['idUsuario']) {
                    $Productos[] = $nuevo;
                }
            }
        }

        //print_r($Productos);
        //exit;
        return view('carrito', compact('Productos'));
    }



    public function agregarProductoApedido($idProducto, Request $request){
        session_start();

        $producto1 = Http::get('http://localhost:8081/api/producto/BuscarProducto',[
            "idProducto"=> $idProducto,
        ]);

        $producto= $producto1->json();

        //var_dump($producto);
        //exit;

        //Creando y searilizando el arreglo que se va a guardar en la cookie
        $ProductoCarrito=["nombre"=>$producto['nombre'], "idUsuario"=>$_SESSION['idUsuario'],"idProducto"=>$producto['idproducto'],
                         "idNegocio"=>$producto['negocio']['idnegocio'],"Precio"=>$producto['precio'],"imagen"=>$producto['imagen'],
                         "Cantidad"=>$request->cantidad

        ];
        $Productoguardar = serialize($ProductoCarrito);

        $expiracion = time() + 3600;
        $ruta = "/";
        $nameCookie =md5(uniqid(rand(), true));
        $numCookies = count($_COOKIE);

        $productosXusuario = array();
        //Haciendo las validaciones para guardar una cookie
        foreach ($_COOKIE as $name => $value) {
            //echo "$name : $value <br>";
            if ($numCookies>3) {

                if ($name!="laravel_session" && $name!="XSRF-TOKEN" && $name !="PHPSESSID") {
                    $nuevo=unserialize($_COOKIE[$name]);

                    if (($nuevo['idUsuario'] == $_SESSION['idUsuario'])) {

                        $productosXusuario[] = $nuevo; 
                    }
                }
            }else {
                setcookie($nameCookie,$Productoguardar,$expiracion,$ruta);
                return redirect('/pedido/verDetalles');
            }
        }

        if (empty($productosXusuario)) {
            setcookie($nameCookie,$Productoguardar,$expiracion,$ruta);

            return redirect('/pedido/verDetalles');
        }else {
            $buscarProducto = $this->validarProductoCarrito($productosXusuario, $producto);
            if (!$buscarProducto) {
                foreach ($productosXusuario as $productoUsuario) {

                    if (($productoUsuario['idNegocio'] == $producto['negocio']['idnegocio']) ) {
                        setcookie($nameCookie,$Productoguardar,$expiracion,$ruta);
                    } 
                }
                return redirect('/pedido/verDetalles');
            }
            $urlRedireccion="/pedido/verDetalles";
            echo "<script>alert('El producto ya existe en el pedido'); window.location.href='$urlRedireccion';</script>";
        }


    }

    public function validarProductoCarrito($ProductosValidar, $productoBuscado){

        $valorEncontrado = false;
        foreach ($ProductosValidar as $productoValidar) {
            if ($productoValidar['nombre']== $productoBuscado['nombre']) {
                $valorEncontrado= true;
                return $valorEncontrado;
            }
        }
        return $valorEncontrado;
    }

    public function vaciarCarrito(){
        session_start();

        foreach ($_COOKIE as $nombre => $valor) {

            if ($nombre!="laravel_session" && $nombre!="XSRF-TOKEN" && $nombre !="PHPSESSID") {
                $nuevo=unserialize($_COOKIE[$nombre]);

                if ($nuevo['idUsuario'] == $_SESSION['idUsuario']) {
                    setcookie($nombre, '', time() - 3600, '/');
                }
            }
        }
        return redirect('/pedido/verDetalles');
    }



    public function eliminarProductoCarrito($nombreProducto){
        session_start();

        foreach ($_COOKIE as $nombre => $valor) {
            if ($nombre!="laravel_session" && $nombre!="XSRF-TOKEN" && $nombre !="PHPSESSID") {
                $nuevo=unserialize($_COOKIE[$nombre]);

                if (($nuevo['idUsuario'] == $_SESSION['idUsuario']) and ($nuevo['nombre'] == $nombreProducto)) {
                    setcookie($nombre, '', time() - 3600, '/');
                }
            }
        }

        return redirect('/pedido/verDetalles');

    }

    public function EntregarPedido($idPedido){
        session_start();
        //Entregar el producto
        $Cambiar = Http::get('http://localhost:8081/api/Pedido/EntregarPedido', [
            "idPedido"=>$idPedido,
        ]);


        if($Cambiar->json() === true){
            //Traer Informacion del pedido que se proceso
            //Buscamos el id del pedido
            $BuscarPedido = Http::get('http://localhost:8081/api/Pedido/ReportePedidoEspecifico', [
                "idPedido"=>$idPedido,
                ]);

            $pedido = $BuscarPedido->json(); //Ya tenemos el pedido fragmentado

            //Guardar Factura
            Http::post('http://localhost:8081/api/Factura/GuardarFactura',[
                "idpedido"=>$pedido['idPedido'],
                "nombreusuario"=>$pedido['nombreUsuario'],
                "nombrerapartidor"=>$pedido['nombreRepartidor'],
                "fechaemision"=>$pedido['fecha'],
                "totalpagar"=>$pedido['total'],
            ]);
        }

        //Consumo de la Api para traer iformacion si existe un pedido en ejecucion
        $BuscarPedido = Http::get('http://localhost:8081/api/Pedido/TraerPedidosRepartidor', [
            "idRepartidor" =>  $_SESSION["idUsuario"],
        ]);

        $pedidoNuevo = $BuscarPedido->json();

        return view('MenuRepartido', compact('pedidoNuevo'));
    }


    public function realizarPedido(){
        session_start();

        //Obteniendo los productos del usuario 
        foreach ($_COOKIE as $name => $valor) {

            if ($name!="laravel_session" && $name!="XSRF-TOKEN" && $name !="PHPSESSID") {
                $nuevo=unserialize($_COOKIE[$name]);

                if (($nuevo['idUsuario'] == $_SESSION['idUsuario'])) {

                    $productosXusuario[] = $nuevo; 
                }
            }
        }

        //Validando que el usuario tenga productos en el pedido, de ser asi entonces se crea el pedido
        if (empty($productosXusuario)) {
            $urlRedireccion="/negocio/MostrarNegocios";
            echo "<script>alert('Pedido vacio, agreagar productos para realizar pedido'); window.location.href='$urlRedireccion';</script>";
        }else {
            $cantidadTotalProductos=0;
            $totalXproducto=0;
            $totalTodosProductos=0;

            foreach ($productosXusuario as $producto) {
                $cantidadTotalProductos = $cantidadTotalProductos + ($producto['Cantidad']);
                $totalXproducto = ($producto['Cantidad']) * ($producto['Precio']);
                $totalTodosProductos = $totalTodosProductos + $totalXproducto;
            }

            $distancia1= Http::get ('http://localhost:8081/api/Pedido/DistanciaNegocioRepartidor',[
                "idNegocio" => $_SESSION['idNegocio'],
                "idUsuario" => $_SESSION['idUsuario'],
            ]);

            $envio = 15;
            $distancia= $distancia1->json();
            $nombreRepartidor = $distancia['nombre'];
            $tarifa = 5*$distancia['distanciaTotal'];
            $tarifaCobrar = number_format($tarifa,2);
            $totalPagar= $totalTodosProductos + $tarifaCobrar;
    
            //Creando el pedido en la base de datos
            $pedido = Http::post ('http://localhost:8081/api/Pedido/CrearPedido',[
                "total"=> $totalPagar,
                "usuario"=>[
                    "idusuario"=> $_SESSION['idUsuario'],
                ],
                "repartidor"=>[
                    "idusuario"=> $distancia['idRepartidor'],
                ],
                "negocio"=>[
                    "idnegocio"=> $_SESSION['idNegocio']
                ]
            ]);

            $pedido1 = $pedido->json();
            

            //Creando el detalle de pedido
            foreach ($productosXusuario as $productoUsuario) {
                $detallePedido = Http::post('http://localhost:8081/api/detallePedido/crear',[
                    "cantidad"=> $productoUsuario['Cantidad'],
                    "preciounitario"=> $productoUsuario['Precio'],
                    "pedido"=>[
                        "idpedido"=> $pedido1,
                    ],
                    "producto"=> [
                        "idproducto"=> $productoUsuario['idProducto'],
                    ],
                ]);
            }

            foreach ($_COOKIE as $nombre => $valor) {

                if ($nombre!="laravel_session" && $nombre!="XSRF-TOKEN" && $nombre !="PHPSESSID") {
                    $nuevo=unserialize($_COOKIE[$nombre]);
    
                    if ($nuevo['idUsuario'] == $_SESSION['idUsuario']) {
                        setcookie($nombre, '', time() - 3600, '/');
                    }
                }
            }

            $fecha = date("Y-m-d");
            $num = 0;

            return view('factura', compact('productosXusuario', 'totalPagar', 'nombreRepartidor', 'fecha', 'num'));
        }


    }

    public function cancelarPedido($idPedido){

        Http::get ('http://localhost:8081/api/Pedido/CancelarPedido', [
            "idPedido"=> $idPedido,
        ]);
        return redirect("/Reporte/historialPedidosUsuario");
    }
    
}
