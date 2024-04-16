<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menú de Productos</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css"> <!-- Enlace al archivo de estilos CSS personalizado -->
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">Nombre del Negocio</a>
    <a class="nav-link" href="#">Pedidos </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
       
          <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
        </li>

      </ul>
       <!-- Agregar el nombre de usuario -->
       <span class="navbar-text">
        Usuario: Juan
      </span>
    </div>
  </div>
</nav>

<section id="productos" class="py-5">
  <div class="container">
    <h2 class="text-center mb-5">Nuestros Productos</h2>
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <img src="producto1.jpg" class="card-img-top" alt="Producto 1">
          <div class="card-body">
            <h5 class="card-title">Producto 1</h5>
            <p class="card-text">Descripción del producto 3.</p>
            <p class="card-text">Precio: $100</p>
            <a href="#" class="btn btn-primary">Ordenar</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <img src="producto2.jpg" class="card-img-top" alt="Producto 2">
          <div class="card-body">
            <h5 class="card-title">Producto 2</h5>
            <p class="card-text">Descripción del producto 3.</p>
            <p class="card-text">Precio: $100</p>
            <a href="#" class="btn btn-primary">Ordenar</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <img src="producto3.jpg" class="card-img-top" alt="Producto 3">
          <div class="card-body">
            <h5 class="card-title">Producto 3</h5>
            <p class="card-text">Descripción del producto 3.</p>
            <p class="card-text">Precio: $100</p>
            <a href="#" class="btn btn-primary">Ordenar</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>
