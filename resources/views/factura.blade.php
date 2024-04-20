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
            <h3 class="invoice-heading">Factura</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-4">
                <h5>Datos del Usuario:</h5>
                <p>{{$_SESSION['nombre']}}</p>
              </div>
              <div class="col-md-4">
                <h5>Datos del Repartidor:</h5>
                <p>Nombre: {{$nombreRepartidor}}</p>
              </div>
              <div class="col-md-4">
                <h5>Fecha de emision:</h5>
                <p>{{$fecha}}</p>
              </div>
            </div>
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Descripción</th>
                  <th>Cantidad</th>
                  <th>Precio Unitario</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($productosXusuario as $producto)
                <tr>
                  <td>1</td>
                  <td>{{$producto['nombre']}}</td>
                  <td>{{$producto['Cantidad']}}</td>
                  <td>{{$producto['Precio']}}</td>
                  <td>{{$producto['Cantidad']*$producto['Precio']}}</td>
                </tr>
                @endforeach

              </tbody>
            </table>
            <div class="row justify-content-end">
              <div class="col-md-4">
                <p><strong>Total a Pagar:</strong>{{$totalPagar}}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
