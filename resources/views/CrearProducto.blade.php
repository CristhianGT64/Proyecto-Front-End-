<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Nuevo Prodcuto</h1>
    <div>
        <form action="{{route('producto.GradarProducto', $idNegocio)}}" method="POST" enctype="multipart/form-data"> {{-- Fomrulario de creacion de usuario --}}
            @csrf
            <div>
                <fieldset>
                    <legend>Nuevo Producto</legend>
                    <div>
                        <div>
                            <label for="nombre">Nombre</label>
                            <input type="text" placeholder="Nombre del prodcuto" name="nombre">
                        </div>
                        <div>
                            <label for="descripcion">Descripcion</label>
                            <input type="text" placeholder="Descripcion" name="descripcion">
                        </div>
                        <div>
                            <label for="precio">Precio</label>
                            <input type="number" placeholder="Precio" name="precio">
                        </div>
                        <div>
                            <label for="cantidad">Cantidad Disponible</label>
                            <input type="number" step="any" placeholder="Cantidad Disponible" name="cantidad">
                        </div>
                        <div>
                            <label for="categorias">Categorias:</label>
                            <select name="categoria" id="categorias">
                                <option value="" disabled selected> --- Elegir Categoria ---</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{$categoria['idcategoria']}}">{{$categoria['nombre']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="imagen">Imagen</label>
                            <input type="file" name="imagen" id="imagen" accept="image/jpeg, image/png">
                        </div>
                        <div>
                            <input type="submit" value="Guardar Producto">
                        </div>
                    </div>
                </fieldset>
                <br>
            </div>
        </div>
    </form> {{-- Fin del formulario --}}
</body>
</html>