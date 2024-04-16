<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function crearProducto(){
        return view("CrearProducto");
    }

    public function GuardarProducto(Request $request){

        $image = ($_FILES['imagen']['tmp_name']); //$_FILES ES UNA SUPER GLOBAL
        //UNA SUBER GLOBAL ES AQUELLA QUE ESTA DISPONIBLE EN CUALQUIER LUGAR DEL SCRIPT

        //creacion de carpeta donde se guardaran las 
        $carpetaImagenesProductos = "../resources/imagenesProductos";

        //Le pondremos un nombre aleatorio para que no se repitan y sean remplazados
        $nombreImagen = md5(uniqid(rand(), true)).'.jpg'; //Nuevo nombre generado para la imagen
        $UbicionmasNombre = $carpetaImagenesProductos.'/'.$nombreImagen;

        // echo '<pre>';
        // var_dump($UbicionmasNombre);
        // echo '<pre>';

        //Validamos que si la carpeta no existe la cree
        if (!is_dir($carpetaImagenesProductos)){
            mkdir($carpetaImagenesProductos);  //Creamos el directorio de imagenes
        }

        //Subir las imagenes al sistemas
        move_uploaded_file($image, $UbicionmasNombre);

        // var_dump($request->image);
        exit;
    }
}
