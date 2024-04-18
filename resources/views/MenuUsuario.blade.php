<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>menu</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
          <a class="nav-link" href="#"><span class="sr-only">(current)</span></a>
        </li>

      </ul>
       <!-- Agregar el nombre de usuario -->
       <span class="navbar-text">
        Usuario: Juan
      </span>
    </div>
  </div>
</nav>

 <!-- Barra de búsqueda -->
 <form class="mt-4">
      <div class="form-group">
        <label for="busquedaNegocios">Buscar negocios:</label>
        <input type="text" class="form-control" id="busquedaNegocios" placeholder="Que deseas pedir hoy?">
      </div>
      <button type="submit" class="btn btn-primary">Buscar</button>
    </form>
    
<div class="container">
    <h1 class="text-center mt-5">Locales</h1>
    <div class="row mt-5">
      @foreach ($negocios as $negocio)
      <div class="col-md-4 ">
        <div class="card">
          <img src="/imagenesNegocios/{{$negocio['imagen']}}" class="card-img-top" alt="{{$negocio['nombre']}}"  height="200">
          <div class="card-body">
            <h5 class="card-title">{{$negocio['nombre']}}</h5>
            <p class="card-text">{{$negocio['descripcion']}}</p>
            <a href="{{route('negocio.negocioProductos', $negocio['idnegocio'])}}" class="btn btn-primary col-12" >Ordenar</a>
          </div>
        </div><br>
      </div>
      @endforeach
      
      


</body>
</html>