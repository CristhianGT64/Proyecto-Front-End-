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
            "descripción"=>$request->descripcion,
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
}
