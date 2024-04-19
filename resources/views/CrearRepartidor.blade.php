<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="/css/Mapa.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css"> <!-- Enlace al archivo de estilos CSS personalizado -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <title>Document</title>
</head>
<body>

    <br>
    <h1>Agregar Repartidor</h1>
    <br>
    <a href="{{route('usuario.MenuAdministrador')}}" class="btn btn-primary">Volver</a>
    <br>

    <div class="border p-2 mb-2 border-opacity-50  px-4">
        <form class="row g-3 border-5 px-4" action="{{route('usuario.GuardarRepartidor')}}" method="POST" enctype="multipart/form-data"> {{-- Fomrulario de creacion de negocio --}}
            @csrf
                <hr class="border border-primary border-3 opacity-75">
                <h3>Datos del Repartidor</h3>


                    <legend>Datos Personal</legend>
                        <div  class="col-md-3">
                            <label class="form-label" for="primerNombre">Primer Nombre</label>
                            <input  class="form-control" type="text" placeholder="Primer Nombre" name="primerNombre">
                        </div>
                        <div  class="col-md-3">
                            <label class="form-label" for="segundoNombre">Segundo Nombre</label>
                            <input  class="form-control" type="text" placeholder="Segundo Nombre" name="segundoNombre">
                        </div>
                        <div  class="col-md-3">
                            <label class="form-label" for="primerApellido">Primer Apellido</label>
                            <input  class="form-control" type="text" placeholder="Primer Apellido" name="primerApellido">
                        </div>
                        <div  class="col-md-3">
                            <label class="form-label" for="segundoApellido">Segundo Apellido</label>
                            <input  class="form-control" type="text" placeholder="Segundo Apellido" name="segundoApellido">
                        </div>


                    <legend>Datos Generales</legend>
                            <div class="col-md-3">
                                <label class="form-label" for="email">E-mail</label>
                                <input type="email" pl class="form-control" aceholder="E-mail" name="email">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="contrasena">Contraseña</label>
                                <input type="password" class="form-control"  placeholder="Contraseña" name="contrasena">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="contrasenaConfirmed">Confirmar Contraseña</label>
                                <input type="password" class="form-control"  placeholder="Confirmar Contraseña">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="telefono">Telefono</label>
                                <input type="tel" plac class="form-control" placeholder="Telefono" name="telefonoUsuario" min="1" max="10">
                            </div>

                            
                    <legend>Informacion de Vehiculo</legend>
                    <div  class="col-md-3">
                        <label class="form-label" for="marca">Marca</label>
                        <input  class="form-control" type="text" placeholder="Marca" name="marca">
                    </div>
                    <div  class="col-md-3">
                        <label class="form-label" for="modelo">Modelo</label>
                        <input  class="form-control" type="text" placeholder="Modelo" name="modelo">
                    </div>
                    <div  class="col-md-3">
                        <label class="form-label" for="placa">Placa</label>
                        <input  class="form-control" type="text" placeholder="Placa" name="placa">
                    </div>

                    <hr class="border border-primary border-3 opacity-75">

                    <div  class="d-grid gap-2 col-6 mx-auto">
                        <input type="submit" class="btn btn-primary" value="Agregar Repartidor"><br>
                    </div>
        </div>
        <hr class="border border-primary border-3 opacity-75">
        </form> {{-- Fin del formulario --}}
    </div>
</body>
</html>