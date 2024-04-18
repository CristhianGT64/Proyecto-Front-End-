<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProductoController extends Controller
{
    public function crearProducto($idNegocio){
        session_start();//Mantiene la seccion activa
        $TraerCategorias = Http::get('http://localhost:8081/api/Categoria/TraerCategorias');
        $categorias = $TraerCategorias->json();
        return view("CrearProducto", compact('idNegocio', 'categorias'));
    }


    public function GuardarProducto($idNegocio ,Request $request){
        session_start();

        $image = ($_FILES['imagen']['tmp_name']); //$_FILES ES UNA SUPER GLOBAL
        //UNA SUBER GLOBAL ES AQUELLA QUE ESTA DISPONIBLE EN CUALQUIER LUGAR DEL SCRIPT

        //creacion de carpeta donde se guardaran las 
        $carpetaImagenesProductos = "../public/imagenesProductos";

        //Le pondremos un nombre aleatorio para que no se repitan y sean remplazados
        $nombreImagen = md5(uniqid(rand(), true)).'.jpg'; //Nuevo nombre generado para la imagen
        // $UbicionmasNombre = $carpetaImagenesProductos.'/'.$nombreImagen;

        //Validamos que si la carpeta no existe la cree
        if (!is_dir($carpetaImagenesProductos)){
            mkdir($carpetaImagenesProductos);  //Creamos el directorio de imagenes
        }


        $guadarProducto = Http::post('http://localhost:8081/api/Producto/GuardarProducto', [
            "categoria"=>[
                "idcategoria"=>$request->categoria,
            ],
            "negocio"=>[
                "idnegocio"=>$idNegocio,
            ],
            "nombre"=>$request->nombre,
            "descripcion"=>$request->descripcion,
            "precio"=>$request->precio,
            "cantidad"=>$request->categoria,
            "imagen"=>$nombreImagen
        ]);
        
        
        //Subir las imagenes al sistemas
        move_uploaded_file($image , $carpetaImagenesProductos.'/'.$nombreImagen);
        // Guardar Producto en base de datos

        
        if($guadarProducto->json()){
            return  $this->NegocioAdministrador();
        }
        return redirect('/product/crearProducto', $idNegocio);
    }

    public function NegocioAdministrador(){

        $negocio = Http::get('http://localhost:8081/api/negocio/TraerNegocio', [
            "idUsuario" => $_SESSION['idUsuario']
        ]);

        $negocioUsuario = $negocio->json();

        $proucductosNegocio = Http::get('http://localhost:8081/api/Producto/ProductoxNegocio',[
            "idNegocio" => $negocioUsuario['idnegocio'],
        ]);
        $productos = $proucductosNegocio->json();


        return view('MenuAdministradorTienda', compact('negocioUsuario', 'productos'));
    }

    public function ActualizarProducto($idProducto, Request $request){
        session_start();
        
        $TraerProducto = Http::get('http://localhost:8081/api/producto/BuscarProducto',[
            'idProducto'=> $idProducto,
        ]);
        $producto = $TraerProducto->json();
        $TraerCategorias = Http::get('http://localhost:8081/api/Categoria/TraerCategorias');
        $categorias = $TraerCategorias->json();
        return view('ActualizarProducto', compact('producto', 'categorias'));
    }


    public function GuardarCambiosProductos(Request $request, $idNegocio, $idProducto ){
        session_start();


            if(($image = ($_FILES['imagen']['tmp_name']) != "")){

                //$_FILES ES UNA SUPER GLOBAL
            //UNA SUBER GLOBAL ES AQUELLA QUE ESTA DISPONIBLE EN CUALQUIER LUGAR DEL SCRIPT

            //creacion de carpeta donde se guardaran las 
            $carpetaImagenesProductos = "../public/imagenesProductos";

            //Le pondremos un nombre aleatorio para que no se repitan y sean remplazados
            $nombreImagen = md5(uniqid(rand(), true)).'.jpg'; //Nuevo nombre generado para la imagen
            // $UbicionmasNombre = $carpetaImagenesProductos.'/'.$nombreImagen;

            //Validamos que si la carpeta no existe la cree
            if (!is_dir($carpetaImagenesProductos)){
                mkdir($carpetaImagenesProductos);  //Creamos el directorio de imagenes
                
            }

            }else{
                $nombreImagen = $request->imagenAct;
            }

            $guadarProducto = Http::put('http://localhost:8081/api/producto/ActualizarProducto', [
                "idproducto"=>$idProducto,
                "categoria"=>[
                    "idcategoria"=>$request->categoria,
                ],
                "negocio"=>[
                    "idnegocio"=>$idNegocio,
                ],
                "nombre"=>$request->nombre,
                "descripcion"=>$request->descripcion,
                "precio"=>$request->precio,
                "cantidad"=>$request->cantidad,
                "imagen"=>$nombreImagen
            ]);



            if($image){
                //Subir las imagenes al sistemas
                move_uploaded_file($_FILES['imagen']['tmp_name'], $carpetaImagenesProductos.'/'.$nombreImagen);
                // Guardar Producto en base de datos
            }
            
            if($guadarProducto->json()){
                return  $this->NegocioAdministrador();
            }
            return redirect('/product/crearProducto', $idNegocio);

        } 

    public function ConsultaEliminarProducto($idProducto){

        session_start();

        $TraerProducto = Http::get('http://localhost:8081/api/producto/BuscarProducto',[
            'idProducto'=> $idProducto,
        ]);
        $producto = $TraerProducto->json();

        return view('EliminarProducto', compact('producto'));
    }

    public function EliminarProducto($idProducto){
        session_start();


        Http::get('http://localhost:8081/api/producto/Eliminar',[
            'idProducto'=> $idProducto
        ]);

        return $this->NegocioAdministrador();

    }

    public function regresarMenuPrincipal(){
        session_start();
        return $this->NegocioAdministrador(); 
    }

}
