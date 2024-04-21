<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menú de Productos</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="styles.css"> <!-- Enlace al archivo de estilos CSS personalizado -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    .input-group {
        border: 2px solid #ccc;
        display: flex;
        align-items: center;
        width: 100px;
        border-radius: 3px;
    }
    
    input[type="text"] {
        border: transparent;
        width: 25px;
        padding: 8px;
        border-radius: 4px;
        margin-top: 5px;
        align-items: center;
        align-content:center;
        text-align: center;
    }
    
    .btn1 {
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        padding: 5px 10px;
        margin-left: 3px;
        margin-right: 3px;
        align-content: center;
    }
    
    .btn:hover {
        background-color: #0056b3;
    }
    .agregar-pedir{
        display: flex;
        flex-direction: row;
        justify-content:space-between
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="">{{$_SESSION['nombreNegocio']}}</a>
    <a class="nav-link" href="{{route('reporte.reporteUsuario')}}">Pedidos </a>

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
       <span>
        <a href="{{route('pedido.verPedido')}}" type="button" class="btn btn-secondary bi bi-cart3 mx-4"></a>
       </span>
       <span class="navbar-text">
        Usuario: {{$_SESSION['nombre']}}
      </span>
    </div>
  </div>
</nav>

<section id="productos" class="py-5">
  <div class="container">
    <h2 class="text-center mb-5">Nuestros Productos</h2>
    <div class="row">

      @foreach($productos as $producto) 
      <div class="col-md-4">
        <div class="card">
          <img src="/imagenesProductos/{{$producto['imagen']}}" class="card-img-top" alt="Producto 1" height="200">
          <div class="card-body">
            <h5 class="card-title">{{$producto['nombre']}}</h5>
            <p class="card-text">{{$producto['descripcion']}}</p>
            <p class="card-text">Precio: {{$producto['precio']}}</p>
            <form action="{{route('pedido.agregarProductoCarrito', $producto['idproducto']) }}">
              <div class="agregar-pedir">
                <div class="input-group">
                    <button type="button" class="btn1" onclick="decrement('cantidad{{$producto['nombre']}}') ">-</button>
                    <input type="text" id="cantidad{{$producto['nombre']}}" name="cantidad" value="1" readonly>
                    <button type="button" class="btn1" onclick="increment('cantidad{{$producto['nombre']}}')">+</button>
                </div>
                <input type="submit" class="btn1 btn-primary" value="Pedir">
            </div>
            </form>
          </div>
        </div>
      </div>
      @endforeach
      
    </div>
  </div>
</section>

<script>
  function increment(inputId) {
      var input = document.getElementById(inputId);
      input.value = parseInt(input.value) + 1;
  }
  
  function decrement(inputId) {
      var input = document.getElementById(inputId);
      if (parseInt(input.value) > 1) {
          input.value = parseInt(input.value) - 1;
      }
  }
</script>

</body>
</html>
