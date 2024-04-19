<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel="stylesheet" type="text/css" href="/css/Mapa.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css"> <!-- Enlace al archivo de estilos CSS personalizado -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <title>Agregar Negocio</title>
</head>
<body>
    <br>
    <h1>Agregar Negocio</h1>
    <br>
    <a href="{{route('usuario.MenuAdministrador')}}" class="btn btn-primary">Volver</a>
    <br>
    <div class="border p-2 mb-2 border-opacity-50  px-4">
        <form class="row g-3 border-5 px-4" action="{{route('negocio.guardarNegocio')}}" method="POST" enctype="multipart/form-data"> {{-- Fomrulario de creacion de negocio --}}
            @csrf
                     <hr class="border border-primary border-3 opacity-75">
                    <legend>Informacion del negocio</legend>
                   

                    <div  class="col-md-3">
                        <label  class="form-label" for="nombre">Nombre:</label>
                        <input class="form-control" type="text" id="nombre" name="nombreNegocio" required>
                    </div>
                    
                    <div  class="col-md-3">
                        <label  class="form-label" for="telefono">Teléfono:</label>
                        <input class="form-control" type="tel" id="telefono" name="telefonoNegocio" required pattern="[0-9]{4}-[0-9]{4}" placeholder="Formato: 1234-5678">
        
                    </div>
                    
                    <div  class="col-md-3">
                        <label  class="form-label" for="hora_apertura">Hora de Apertura:</label>
                        <input class="form-control" type="time" id="hora_apertura" name="horaApertura" required>
        
                    </div>
                    <div  class="col-md-3">
                    <label  class="form-label" for="hora_cierre">Hora de Cierre:</label>
                    <input class="form-control" type="time" id="hora_cierre" name="horaCierre" required>
                    </div>

                    <div class="mb-3">
                    <label  class="form-label" for="descripcion">Descripcion:</label>
                    <textarea class="form-control" name="descripcion" id="descripcion" cols="40" rows="3"></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label" for="imagen">Imagen</label>
                        <input type="file" class="form-control" name="imagen" id="imagen" accept="image/jpeg, image/png, image/jpg">
                    </div>
                <br>

                <hr class="border border-primary border-3 opacity-75">
                <h3>Datos del administrador</h3>


                    <legend>Datos Personal</legend>
                        <div  class="col-md-3">
                            <label class="form-label" for="primerNombre">Primer Nombre</label>
                            <input  class="form-control type="text" placeholder="Primer Nombre" name="primerNombre">
                        </div>
                        <div  class="col-md-3">
                            <label class="form-label" for="segundoNombre">Segundo Nombre</label>
                            <input  class="form-control type="text" placeholder="Segundo Nombre" name="segundoNombre">
                        </div>
                        <div  class="col-md-3">
                            <label class="form-label" for="primerApellido">Primer Apellido</label>
                            <input  class="form-control type="text" placeholder="Primer Apellido" name="primerApellido">
                        </div>
                        <div  class="col-md-3">
                            <label class="form-label" for="segundoApellido">Segundo Apellido</label>
                            <input  class="form-control type="text" placeholder="Segundo Apellido" name="segundoApellido">
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
        </div>
        <hr class="border border-primary border-3 opacity-75">

                {{-- Comienzo del mapa --}}

                <center> <h3 class="centro">¿Cual es la direccion del negocio?</h3> </center>
                <!--The div element for the map -->
                <div id="map"></div>
            
                <!-- prettier-ignore -->
                {{-- Script unico para marcar la ubicaion actual--}}
                <script
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAZ62cymsGJJcaJV7jZoQyacAuEmP60NE8&callback=initMap&v=weekly"
                defer
                ></script>


                {{-- Fin del mapa --}}

                <br>
                <div>{{-- Latitud y Longitud --}}
                    <input type="hidden" name="latitud" id="latitud" > {{-- Hidden para que no sea visible en el formulario --}}
                    <input type="hidden" name="longitud" id="longitud" >
                </div> {{-- Latitud y Longitud --}}
                <div  class="d-grid gap-2 col-6 mx-auto">
                    <input type="submit" class="btn btn-primary" value="Agregar negocio"><br>
                </div>
        </form> {{-- Fin del formulario --}}
    </div>

    {{-- <script src="/js/mapa.js"></script> --}}
    <script src="/js/PosicionActualUsuario.js"></script>

</body>
</html>