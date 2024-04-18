<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Eliminar Producto</title>
</head>
<body>
        <section id="productos" class="py-5">
            <div class="container">
              <h2 class="text-center mb-5">¿Deseas Eliminar de este producto?</h2>
              <div class="row">
                <div class="col">
                    
                  </div>
                <div class="col-md-4">
                  <div class="card">
                    <img  src="/imagenesProductos/{{$producto['imagen']}}" height="250" class="card-img-top" alt="Producto">
                    <div class="card-body">
                      <h5 class="card-title fw-bold" >{{$producto['nombre']}}</h5>
                      <p class="card-text">{{$producto['descripcion']}}</p>
                      <p class="card-text">Precio: L. {{$producto['precio']}}</p>
                      <p class="card-text">Cantidad: {{$producto['cantidad']}}</p>
                      <a href="{{route('negocio.menuPrincipal')}}" class="btn btn-primary">Regresar</a>
                      <a href="{{route('producto.EliminarProducto', $producto['idproducto'])}}" class="btn btn-danger">Eliminar</a>
                    </div>
                  </div>
                  <br>
                </div>  
                <div class="col">
                    
                  </div>
              
              </div>
            </div>
          </section>
</body>
</html>