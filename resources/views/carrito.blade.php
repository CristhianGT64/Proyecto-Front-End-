<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="">
</head>
<body>

<style>
    body {
        font-family: Arial, sans-serif;
    }
    .table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }
    .table th,
    .table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    .table th {
        background-color: #f2f2f2;
    }
    .table th:first-child,
    .table td:first-child {
        text-align: center;
    }
    .table td {
        vertical-align: middle;
    }
    .btn-eliminar {
        background-color: #dc3545;
        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
    }
    .btn-eliminar:hover {
        background-color: #c82333;
    }
</style>









<h1>Pedido</h1>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Producto</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Precio</th>
      <th scope="col">Total</th>

      <th scope="col">Gestionar</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>nombreProducto</td>
      <td>1</td>
      <td>$100</td>
      <td>$100</td>
      <td><button type="button" class="btn btn-danger">Eliminar</button></td>
      
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>nombreProducto</td>
      <td>2</td>
      <td>$100</td>
      <td>$200</td>
      <td><button type="button" class="btn btn-danger">Eliminar</button></td>
    </tr>

  </tbody>
  </table>



  <button type="button" class="btn btn-danger">Cancelar Pedido</button>
  <button type="button" class="btn btn-primary">Ir a Pagar</button>




    
</body>
</html>

