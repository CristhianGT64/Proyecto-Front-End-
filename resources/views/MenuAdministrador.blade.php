<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css"> <!-- Enlace al archivo de estilos CSS personalizado -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Administrador</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand display-8" href="#">Bienvenido {{$_SESSION['nombre']}} es un gusto tenerte aqui!</a>
      <a class="nav-link" href="#"></a>
  
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
  
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
  
        </ul>
         <!-- Agregar el nombre de usuario -->
         <span class="navbar-text">
          <a href="{{route('negocio.cerrarSesionAdminENegocio')}}" class="btn btn-outline-secondary">Cerrar Sesion</a>
        </span>
        <span class="navbar-text">
        </span>
      </div>
    </div>
  </nav>

    <section  class="py-5">
        <div class="container">
          <div class="row">
            <div class="col-md-4">
              <div class="card">
                <img  src="/Imagenes/NuevoNegocio.jpeg" height="250" class="card-img-top" alt="Producto">
                <div class="card-body">
                  <h5 class="card-title fw-bold" >Agregar Negocio</h5>
                  <p class="card-text">Agrega un nuevo negocio a la aplicacion Delivery.
                    llena por parametros solicitados como datos generales del negocio, nombre
                    y correo del encargado de dicho negocio como su localizacion geografica.
                  </p>
                  <a href="{{route('negocio.agregarNegocio')}}" class="btn btn-primary">Crear Nuevo Negocio</a>
                </div>
              </div>
              <br>
            </div>

            <div class="col-md-4">
                <div class="card">
                  <img  src="/Imagenes/VerMapa.jpeg" height="250" class="card-img-top" alt="Producto">
                  <div class="card-body">
                    <h5 class="card-title fw-bold">Mapa General</h5>
                    <p class="card-text">Observa el mapa para tener una visision global de la ubicacion
                        de los repartidores como la ubicacion de los negocios de la app de Delivery.</p>
                        <a href="{{route('negocio.mapa')}}" class="btn btn-primary">Ver mapa</a>
                  </div>
                </div>
                <br>
              </div>

              <div class="col-md-4">
                <div class="card">
                  <img  src="/Imagenes/Categorias.jpeg" height="250" class="card-img-top" alt="Producto">
                  <div class="card-body">
                    <h5 class="card-title fw-bold" >Nueva Categoria</h5>
                    <p class="card-text">Cada Negocio ofrecen productos que pertenecen a
                        una categoria en especifico, con este el delivery decide que nombre
                        tendra la categoria y cuales debera de manejar el usuario</p>
                        <a class="btn btn-primary" href="{{route('categoria.agregarCategoria')}}">Agregar Categoria</a>
                  </div>
                </div>
                <br>
              </div>
          </div>
        </div>
      </section>
</body>
</html>