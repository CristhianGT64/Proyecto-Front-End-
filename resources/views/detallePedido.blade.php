<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detalle de Entrega y Resumen</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .detalle-entrega,
    .resumen {
      border: 1px solid #ccc;
      padding: 20px;
    }
  </style>
</head>



<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">Nombre del Negocio</a>


    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
     

      </ul>
       <!-- Agregar el nombre de usuario -->
       <span class="navbar-text">
        Usuario: Juan
      </span>
    </div>
  </div>
</nav>


  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="detalle-entrega">
          <h2>Detalle de Entrega</h2>
          <div class="mb-3">
            <label for="direccion">Dirección de Entrega:</label>
            <p>15-04-2024</p>
          </div>
          <div class="mb-3">
            <label for="delivery">Delivery:</label>
            <p>15-04-2024</p>
          </div>
          <div class="mb-3">
            <label for="envio">Envío:</label>
            <p>30</p>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="resumen">
          <h2>Resumen</h2>
          <div class="mb-3">
            <label for="productos">Productos:</label>
            <p>240</p>
          </div>
          <div class="mb-3">
            <label for="envio-resumen">Envío:</label>
            <p>30</p>
          </div>
          <div class="mb-3">
            <label for="tarifa">Tarifa:</label>
            <p>30</p>
          </div>
        
          <div class="mb-3">
            <label for="total">Total:</label>
            <p>30</p>
          </div>
          <button type="button" class="btn btn-success">Finalizar Compra</button>
        </div>
      </div>
    </div>
   
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
