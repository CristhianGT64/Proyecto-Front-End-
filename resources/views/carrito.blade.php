<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pedido</title>
</head>
<body>

    <div>
        <h1>Carrito de compras</h1><br><br>

        <div>
            <button type="button" class="btn btn-success mx-4">Finalizar Compra</button>
            <button type="button" class="btn btn-danger mx-4">Vaciar Carrito</button>
        </div><br>
        <div class="table-responsive">

            <table class="table  table-hover table align-middle" >
                <thead class="table-dark">
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Nombre</th>
                        <th scope="col">idUsuario</th>
                        <th scope="col">idNegocio</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
    
                <tbody>
    
                    @foreach($Productos as $Producto)
                        <tr>
                            <td><img width="80px" height="80px" src="/imagenesProductos/{{$Producto['imagen']}}" alt="Hamburguesa"></td>
                            <td>{{$Producto['nombre']}}</td>
                            <td>{{$Producto['idUsuario']}}</td>
                            <td>{{$Producto['idNegocio']}}</td>
                            <td><button type="button" class="btn btn-outline-danger">Eliminar</button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    <div>
</body>
</html>

