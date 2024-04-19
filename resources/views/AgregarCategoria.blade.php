<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css"> <!-- Enlace al archivo de estilos CSS personalizado -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Agregar Categoria</title>
</head>
<body>
    <br>
    <a href="{{route('usuario.MenuAdministrador')}}" class="btn btn-primary">Volver</a>
    <br>
    <br>
    <h1>Agregar Nueva Categoria</h1>
    <div class="border p-2 mb-2 border-opacity-50  px-4">
        <form class="row g-3 border-5 px-4" action="{{route('categoria.guardarCategoria')}}" method="POST" enctype="multipart/form-data"> {{-- Fomrulario de creacion de negocio --}}
            @csrf
            <hr class="border border-primary border-3 opacity-75">
            <div  class="col-md-3">
                <label class="form-label" for="nombre">Nombre</label>
                <input class="form-control" type="text" placeholder="Nombre de la categoria" name="nombre">
            </div>
            <div class="col-12">
                <input type="submit" class="btn btn-success" value="Guardar Producto">
            </div>
    </div>


</body>
</html>