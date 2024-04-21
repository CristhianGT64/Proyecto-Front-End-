<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css"> <!-- Enlace al archivo de estilos CSS personalizado -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Filtro por Categoria</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
          <a class="navbar-brand" href="#">Delivery</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="{{route('usuario.MenuAdministrador')}}">Inicio<span class="sr-only">(current)</span></a>
              </li>
      
            </ul>
      
            <a class="btn btn-outline-secondary mx-3" href="{{route('Login')}}">Cerrar Cesion </a>
             <!-- Agregar el nombre de usuario -->
            <span class="navbar-text">
              Usuario: {{$_SESSION['nombre']}}
            </span>
          </div>
        </div>
      </nav>
      <br>

{{--       //================= mostrar Reportes --}}

      
      <table class="table  table-hover table align-middle text-center" >
        <thead class="table-dark">
            <tr>
                <th scope="col">idReporte</th>
                <th scope="col">Estado Pedido</th>
                <th scope="col">Negocio</th>
                <th scope="col">Productos</th>
                <th scope="col">Repartidor</th>
                <th scope="col">Cliente</th>
                <th scope="col"></th>

            </tr>
        </thead>

        <tbody>

            @foreach($pedidos as $pedido)
                <tr class="text-center">
                    <td>{{$pedido['idPedido']}}</td>
                    <td>

                        @if (!$pedido['estado'])
                            En curso
                        @else
                            {{$pedido['estado']}}
                        @endif

                    </td>
                    <td>{{$pedido['nombreNegocio']}}</td>
                    <td>
                    
                        @foreach ($pedido['producto'] as $producto)
                            <p>{{$producto['nombre']}}</p>
                        @endforeach

                    </td>
                    <td>{{$pedido['nombreRepartidor']}}</td>
                    <td>{{$pedido['nombreUsuario']}}</td>
                    <td><a href="{{route('Reporte.GenerarReportePedido', ['idPedido'=> $pedido['idPedido']] )}}" type="button" class="btn btn-primary">Ver Reporte</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>