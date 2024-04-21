<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$negocioUsuario['nombre']}} Administrador</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css"> <!-- Enlace al archivo de estilos CSS personalizado -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand display-8" href="#">{{$negocioUsuario['nombre']}}</a>
      <a class="nav-link" href="#"></a>
  
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
  
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{route('producto.CrearProducto', $negocioUsuario['idnegocio'])}}">Nuevo producto</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="{{route('Reporte.ListaTodosPedidosNegocio', $negocioUsuario['idnegocio'])}}">Ver Reportes</a>
          </li>
  
        </ul>
         <!-- Agregar el nombre de usuario -->
         <span class="navbar-text">
          <a href="{{route('negocio.cerrarSesionAdminENegocio')}}" class="btn btn-outline-secondary">Cerrar Sesion</a>

          <br>
          <br>
          Usuario: {{$negocioUsuario['usuarios']['personas']['primernombre']}} {{$negocioUsuario['usuarios']['personas']['primerapellido']}}

        </span>
        <span class="navbar-text">
        </span>
      </div>
    </div>
  </nav>

    <section id="productos" class="py-5">
        <div class="container">
          <h2 class="text-center mb-5">Productos de {{$negocioUsuario['nombre']}}</h2>
          <div class="row">
            @foreach ($productos as $producto)
            <div class="col-md-4">
              <div class="card">
                <img  src="/imagenesProductos/{{$producto['imagen']}}" height="250" class="card-img-top" alt="Producto">
                <div class="card-body">
                  <h5 class="card-title fw-bold" >{{$producto['nombre']}}</h5>
                  <p class="card-text">{{$producto['descripcion']}}</p>
                  <p class="card-text">Precio: L. {{$producto['precio']}}</p>
                  <p class="card-text">Cantidad: {{$producto['cantidad']}}</p>
                  <a href="{{route('producto.ActualizaProducto', $producto['idproducto'])}}" class="btn btn-primary">Actualizar</a>
                  <a href="{{route('producto.consEliminarProducto', $producto['idproducto'])}}" class="btn btn-danger">Eliminar</a>
                </div>
              </div>
              <br>
            </div>
            @endforeach
          </div>
        </div>
      </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>