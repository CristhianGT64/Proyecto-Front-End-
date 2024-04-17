<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$negocioUsuario['nombre']}} Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h1>Bienvenido a  {{$negocioUsuario['nombre']}} </h1>
    <br>
    {{-- Enviamos la informacion de inicio de sesion a la vista --}}
    <a href="{{route('producto.CrearProducto', $negocioUsuario['idnegocio'])}}">Agregar nuevo producto</a>

    <section id="productos" class="py-5">
        <div class="container">
          <h2 class="text-center mb-5">Nuestros Productos</h2>
          <div class="row">
            @foreach ($productos as $producto)
            <div class="col-md-4">
              <div class="card">
                <img src="/imagenesProductos/926dc99b6509736b825b4b90438de996.jpg" class="card-img-top" alt="Producto">
                <div class="card-body">
                  <h5 class="card-title">Producto 1</h5>
                  <p class="card-text">Descripción del producto 3.</p>
                  <p class="card-text">Precio: $100</p>
                  <a href="#" class="btn btn-primary">Ordenar</a>
                </div>
              </div>

            </div>
            @endforeach
          </div>
        </div>
      </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>