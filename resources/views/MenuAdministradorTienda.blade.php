<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$negocioUsuario['nombre']}} Administrador</title>
</head>
<body>
    <h1>Bienvenido a  {{$negocioUsuario['nombre']}} </h1>
    <br>
    <a href="{{route('producto.CrearProducto')}}">Agregar nuevo producto</a>
</body>
</html>