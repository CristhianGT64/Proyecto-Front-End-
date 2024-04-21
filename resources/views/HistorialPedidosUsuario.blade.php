<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #btnCancelar{
            display: flex;
            align-content: center;
            align-items: center;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="{{route('negocio.mostrarNegocios')}}">Inicio <span class="sr-only">(current)</span></a>
              </li>
      
            </ul>
      
             <!-- Agregar el nombre de usuario -->
            <span class="navbar-text">
              Usuario: {{$_SESSION['nombre']}}
            </span>
          </div>
        </div>
      </nav>

    <div class="container">

        <h1 class="text-center mt-5">Mis Pedidos</h1>

        @foreach ($pedidos as $pedido)
        
        <div class="card mb-3" style="max-width: 1000px;">
            <div class="row g-0">
              <div class="col-md-2">
                <img src="/imagenesNegocios/{{$pedido['imagenNegocio']}}" class="rounded-start" height="100px" alt="...">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                    <div class="d-flex justify-content-around">
                        <div >
                            <h6 class="font-weight-bold">{{$pedido['nombreNegocio']}}</h6>
                            <p class="card-text">L{{$pedido['total']}} </p>
                        </div>
                        <div>
                            @if ($pedido['estado']== null)
                                <h6 class="text-body-secondary">En Curso</h6>
                            @else
                                <h6 class="text-body-secondary">{{$pedido['estado']}}</h6>
                            @endif

                            <?php
                                $Cantidad=0;

                                foreach ($pedido['producto'] as $detalle) {
                                    $Cantidad= $Cantidad + $detalle['cantidad'];
                                }
                            ?>
                            <p>{{$Cantidad}} Productos</p>
                        </div>
                        <div>
                            <h6><small class="text-body-secondary">{{$pedido['fecha']}}</small></h6>
                            <p><small class="text-body-secondary">{{$pedido['hora']}}</small></p>
                        </div>
                    </div>
                </div>
              </div>
              <div id="btnCancelar" class="col-md-2">
                <a href="{{route('pedido.cancelarPedido', $pedido['idPedido'])}}" type="buttom" class="btn btn-danger" @if ($pedido['estado'] != null)
                    style="display: none;"
                @endif>Cancelar</a>
            </div>
            </div>
        </div>
        @endforeach
        

    </div>

</body>
</html>