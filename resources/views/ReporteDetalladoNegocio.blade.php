<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Factura</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="">
  <style>

    .container {
      margin-top: 50px;
    }
    .invoice-heading {
      margin-bottom: 20px;
    }
    .table thead th {
      vertical-align: middle;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <h3 class="invoice-heading">Reporte pedido numero: {{$pedido['idPedido']}} Estado:  @if (!$pedido['estado'])
                En curso
            @else
            {{$pedido['estado']}}
            @endif 
        </h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                <h5>Datos del Usuario:</h5>
                <p>{{$pedido['nombreUsuario']}}</p>
              </div>
              <div class="col-md-4">
                <h5>Datos del Repartidor:</h5>
                <p>Nombre: {{$pedido['nombreRepartidor']}}</p>
              </div>
              <div class="col-md-4">
                <h5>Fecha y hora de emision:</h5>
                <p>{{$pedido['fecha']}}  {{$pedido['hora']}}</p>
              </div>
            </div>
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre Productos</th>
                  <th>Cantidad</th>
                  <th>Precio Unitario</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($pedido['producto'] as $detalle)
                <tr>
                  <td>--></td>
                  <td>{{$detalle['nombre']}}</td>
                  <td>{{$detalle['cantidad']}}</td>
                  <td>{{$detalle['precio']}}</td>
                    <td>{{$detalle['precio'] * $detalle['cantidad']}}</td>
                @endforeach 

                </tr>

              </tbody>
            </table>
            <div class="row justify-content-end">
              <div class="col-md-4">
                <p><strong>Total Pagado:</strong>{{$pedido['total']}}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div><br><br>

    <div class="row justify-content-center">
      <a href="{{route('Reporte.ListaTodosPedidosNegocio', $idNegocio )}}" type="button" class="btn btn-primary">Regresar</a>
    </div>
  </div>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
