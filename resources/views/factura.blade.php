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
                <p>Nombre: John</p>
                <p>Apellido: Doe</p>
              </div>
              <div class="col-md-4">
                <h5>Datos del Repartidor:</h5>
                <p>Nombre: Repartidor</p>
              </div>
              <div class="col-md-4">
                <h5>Fecha de emision:</h5>
                <p>15-04-2024</p>
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
                <tr>
                  <td>1</td>
                  <td>Producto 1</td>
                  <td>2</td>
                  <td>$10.00</td>
                  <td>$20.00</td>
                </tr>

              </tbody>
            </table>
            <div class="row justify-content-end">
              <div class="col-md-4">
                <p><strong>Total a Pagar:</strong> $40.00</p>
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
