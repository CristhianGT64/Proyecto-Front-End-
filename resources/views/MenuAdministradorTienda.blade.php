<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tienda: </title>
</head>
<body>
    <h1>Negocio:{{$negocioUsuario['nombre']}} </h1>
    <div>
        @php
            var_dump($UsusarioActivo);
        @endphp
    </div>
    <br>
    <div>
        @php
            var_dump($negocioUsuario);
        @endphp
    </div>
    <br>
    <a href="#">Agregar nuevo producto</a>
</body>
</html>