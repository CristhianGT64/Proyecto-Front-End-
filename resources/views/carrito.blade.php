<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pedido</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{route('negocio.negocioProductos', $_SESSION['idNegocio'])}}">{{$_SESSION['nombreNegocio']}}</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link"  href="{{route('negocio.mostrarNegocios')}}">Inicio</a>
              </li>
            </ul>
            <span class="navbar-text">
              Usuario: {{$_SESSION['nombre']}}
            </span>
          </div>
        </div>
      </nav>

    <div>
        <h1 class="text-center mb-5">Carrito de compras</h1><br><br>

        <div>
            <a href="{{route('pedido.realizarPedido')}}" type="button" class="btn btn-success mx-4">Procesar Pedido</a>
            <a href="{{route('pedido.vaciarPedido')}}" type="button" class="btn btn-danger mx-4">Vaciar Carrito</a>
        </div><br>
        <div class="table-responsive">

            <table class="table  table-hover table align-middle" >
                <thead class="table-dark">
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Precio</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
    
                <tbody>
    
                    @foreach($Productos as $Producto)
                        <tr>
                            <td><img width="80px" height="80px" src="/imagenesProductos/{{$Producto['imagen']}}" alt="Hamburguesa"></td>
                            <td>{{$Producto['nombre']}}</td>
                            <td>{{$Producto['Cantidad']}}</td>
                            <td>{{$Producto['Precio']}}</td>
                            <td><a href="{{route('pedido.eliminarProducto', $Producto['nombre'])}}" type="button" class="btn btn-outline-danger">Eliminar</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    <div>
</body>
</html>

