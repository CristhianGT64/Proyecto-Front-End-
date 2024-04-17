<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agregar Categoria</title>
</head>
<body>
    
    <h1>Agregar Nueva Categoria</h1>
    <br>
    <br>
    <div>
        <form action="{{route('categoria.guardarCategoria')}}" method="POST">
            @csrf
            <div>
                <fieldset>
                    <legend>Nueva Categoria</legend>
    
                    <div>
                        <label for="nombre">Nombre</label>
                        <input type="text" placeholder="Nombre de la categoria" name="nombre">
                    </div><br>
                    <div>
                        <input type="submit" value="Guardar Categoria">
                    </div>
                </fieldset>
            </div>
        </form>
    </div>
</body>
</html>