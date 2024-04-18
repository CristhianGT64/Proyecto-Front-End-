<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css"> <!-- Enlace al archivo de estilos CSS personalizado -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <title>Actualiza Producto</title>
</head>
<body>
    <br>
    <a href="{{route('negocio.menuPrincipal')}}" class="btn btn-primary">Volver</a>
    <br>
    <h1>Actualizar Producto</h1>
    <div>
    <div class="border border-success p-2 mb-2 border-opacity-50  px-4">
        <form class="row g-3 border-5 px-4 " action="{{route('producto.GuardarCambios', ['idnegocio'=> $producto['negocio']['idnegocio'] , 'idproducto'=> $producto['idproducto']])}}"  method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="col-md-6">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" value="{{$producto['nombre']}}" class="form-control" placeholder="Nombre del prodcuto" name="nombre">
            </div>
            <div class="col-md-6">
    
            <label for="descripcion" class="form-label">Descripcion</label>
            <input type="text"  value="{{$producto['descripcion']}}" class="form-control" placeholder="Descripcion" name="descripcion">
    
            </div>
            <div class="col-md-4">
    
                <label for="precio" class="form-label">Precio</label>
                <input type="number" value="{{$producto['precio']}}" min="1" max="5000" class="form-control" placeholder="Precio" name="precio">
                
            </div>
    
            <div class="col-md-4">
    
                <label class="form-label" for="cantidad">Cantidad Disponible</label>
                <input min="0" value="{{$producto['cantidad']}}"  class="form-control" type="number" step="any" placeholder="Cantidad Disponible" name="cantidad">
              </div>
    
            <div class="col-md-4">
            <label class="form-label" for="categorias">Categorias:</label>
            <select name="categoria" class="form-select" id="categorias">
                <option value="{{$producto['categoria']['idcategoria']}}">{{$producto['categoria']['nombre']}}</option>
                @foreach ($categorias as $categoria)
                    <option value="{{$categoria['idcategoria']}}">{{$categoria['nombre']}}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">

                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" class="form-control" name="imagen" id="imagen" accept="image/jpeg, image/png, image/jpg">
              </div>
              <div>
                <img width="150" src="/imagenesProductos/{{$producto['imagen']}}" alt="Imagen de producto {{$producto['nombre']}}">
                <input type="hidden" value="{{$producto['imagen']}}" name="imagenAct">
            </div>
            <div class="col-12">
              <input type="submit" class="btn btn-success" value="Guardar Producto">
            </div>
          </form>
    </div>
</body>
</html>