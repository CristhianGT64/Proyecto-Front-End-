<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css"> <!-- Enlace al archivo de estilos CSS personalizado -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Filtro por Categoria</title>
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
                <a class="nav-link" href="{{route('negocio.mostrarNegocios')}}">Inicio<span class="sr-only">(current)</span></a>
              </li>
      
            </ul>
      
            <a class="btn btn-outline-secondary mx-3" href="{{route('Login')}}">Cerrar Cesion </a>
             <!-- Agregar el nombre de usuario -->
            <span class="navbar-text">
              Usuario: {{$_SESSION['nombre']}}
            </span>
          </div>
        </div>
      </nav>
      
       <!-- Barra de búsqueda -->
      
       <form action="{{route('categoria.ProductoxCategoria')}}" method="POST">
        @csrf
        <div class="input-group mt-4">
          <select name="categoria" class="form-select form-control" id="inputGroupSelect04" aria-label="Example select with button addon">
            <option disabled selected>Categoria</option>
            @foreach ($categorias as $categoria)
            <option value="{{$categoria['idcategoria']}}">{{$categoria['nombre']}}</option>
            @endforeach
          </select>
          <button class="btn btn-outline-secondary" type="submit">Buscar Categoria</button>
        </div>
      </form>

      <br>

{{--       //================= mostrar productps en base caregoria --}}

      
      <table class="table  table-hover table align-middle" >
        <thead class="table-dark">
            <tr>
                <th scope="col">Producto</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio</th>
                <th scope="col">Negocio</th>
                <th scope="col"></th>
            </tr>
        </thead>

        <tbody>

            @foreach($productos as $Producto)
                <tr>
                    <td><img width="80px" height="80px" src="/imagenesProductos/{{$Producto['imagen']}}" alt="Productos"></td>
                    <td>{{$Producto['nombre']}}</td>
                    <td>{{$Producto['precio']}}</td>
                    <td>{{$Producto['negocio']['nombre']}}</td>
                    <td><a href="{{route('negocio.negocioProductos', $Producto['negocio']['idnegocio'] )}}" type="button" class="btn btn-primary">Ir a Negocio</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>