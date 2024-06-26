<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css"> <!-- Enlace al archivo de estilos CSS personalizado -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      .detalle-entrega,
      .resumen {
        border: 1px solid #ccc;
        padding: 20px;
      }
    </style>
    <title>Repartidor</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand display-8" href="#">Bienvenido {{$_SESSION['nombre']}} es un gusto tenerte aqui!</a>
          <a class="nav-link" href="#"></a>
      
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
      
            </ul>
             <!-- Agregar el nombre de usuario -->
             <span class="navbar-text">
              <a href="{{route('negocio.cerrarSesionAdminENegocio')}}" class="btn btn-outline-secondary">Cerrar Sesion</a>
            </span>
            <span class="navbar-text">
            </span>
          </div>
        </div>
      </nav>


      {{-- Detalles de envio --}}
      <br>
    @if ($pedidoNuevo === null)
        <center><h2>No hay encargos pendientes</h2></center>
    @else
    <center><h2>¡Tienes un nuevo encargo pendiente!</h2></center>
      <br>
      <div class="card text-center">
        <div class="card-header">
          Detalles de envio. Numero de referencia de pedido: {{$pedidoNuevo['idPedido']}}
        </div>
        <div class="card-body">
          <h3 class="card-title">Descripcion del Cliente:</h3>
          <h5 class="card-text">Nombre: {{$pedidoNuevo['nombreUsuario']}} --- Telefono: {{$pedidoNuevo['telefono']}}. --- Ubicacion: lat:  {{$pedidoNuevo['latitud']}}
                lng: {{$pedidoNuevo['longitud']}}</h5>
                <br>
          <h3 class="card-title">Productos a entregar:</h3>
            <div class="container">
              <div class="row">
                @foreach ($pedidoNuevo['producto'] as $producto)
                <div class="col-md-4">
                  <div class="card">
                    <img  src="/imagenesProductos/{{$producto['imagen']}}" height="250" class="card-img-top" alt="Producto">
                    <div class="card-body">
                      <h5 class="card-title fw-bold" >{{$producto['nombre']}}</h5>
                      <p class="card-text">{{$producto['descripcion']}}</p>
                      <p class="card-text">Precio: L. {{$producto['precio']}}</p>
                      <p class="card-text">Cantidad: {{$producto['cantidad']}}</p>
                    </div>
                  </div>
                  <br>
                </div>
                @endforeach
              </div>
            </div>
          </section>
          <a href="{{route('pedido.EntregarPedido', $pedidoNuevo['idPedido'])}}" class="btn btn-primary">Producto Entregado</a>
        </div>
        <div class="card-footer text-body-secondary">
        
    @endif
          
        </div>
      </div>
    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>