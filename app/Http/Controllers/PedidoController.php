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



    public function agregarProductoApedido($idProducto){
        session_start();

        $producto1 = Http::get('http://localhost:8081/api/producto/BuscarProducto',[
            "idProducto"=> $idProducto,
        ]);

        $producto= $producto1->json();

        //var_dump($producto);
        //exit;

        //Creando y searilizando el arreglo que se va a guardar en la cookie
        $ProductoCarrito=["nombre"=>$producto['nombre'], "idUsuario"=>$_SESSION['idUsuario'],"idProducto"=>$producto['idproducto'],
                         "idNegocio"=>$producto['negocio']['idnegocio'],"imagen"=>$producto['imagen']

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
            }
        }

        if (empty($productosXusuario)) {
            setcookie($nameCookie,$Productoguardar,$expiracion,$ruta);
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
}
