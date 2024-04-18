<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Actualiza Producto</title>
</head>
<body>
    <h1>ActualizaR Prodcuto</h1>

    {{-- @php
        var_dump($producto['idproducto']);
        exit;
    @endphp --}}

    <div>
        <form action="{{route('producto.GuardarCambios', ['idnegocio'=> $producto['negocio']['idnegocio'] , 'idproducto'=> $producto['idproducto']])}}" method="POST" enctype="multipart/form-data"> {{-- Fomrulario de creacion de usuario --}}
            @method('PUT')
            @csrf
            <div>
                <fieldset>
                    <legend>Actualizar Producto</legend>
                    <div>
                        <div>
                            <label for="nombre">Nombre</label>
                            <input type="text" value="{{$producto['nombre']}}"  name="nombre">
                        </div>
                        <div>
                            <label for="descripcion">Descripcion</label>
                            <input type="text" value="{{$producto['descripción']}}"  name="descripcion">
                        </div>
                        <div>
                            <label for="precio">Precio</label>
                            <input type="number" value="{{$producto['precio']}}"  name="precio">
                        </div>
                        <div>
                            <label for="cantidad">Cantidad Disponible</label>
                            <input type="number" step="any" value="{{$producto['cantidad']}}"  name="cantidad">
                        </div>
                        <div>
                            <label for="categorias">Categorias:</label>
                            <select name="categoria" id="categorias">
                                <option value="{{$producto['categoria']['idcategoria']}}">{{$producto['categoria']['nombre']}}</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{$categoria['idcategoria']}}">{{$categoria['nombre']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="imagen">Imagen</label>
                            <input type="file" name="imagen" id="imagen" accept="image/jpeg, image/png, image/jpg">
                        </div>
                        <div>
                            <img width="150" src="/imagenesProductos/{{$producto['imagen']}}.jpg" alt="Imagen de producto {{$producto['nombre']}}">
                            <input type="hidden" value="{{$producto['imagen']}}" name="imagenAct">
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