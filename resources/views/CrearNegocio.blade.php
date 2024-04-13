<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel="stylesheet" type="text/css" href="/css/Mapa.css" />
    {{-- <script type="module" src="/js/mapa.js"></script> --}}
    <title>Agregar Negocio</title>
</head>
<body>

    <h1>Agregar Negocio</h1>
    <div>
        <form action="{{route('negocio.guardarNegocio')}}" method="POST"> {{-- Fomrulario de creacion de usuario --}}
            @csrf
            <div>
                <fieldset>
                    <legend>Informacion del negocio</legend>
                    <label for="nombre">Nombre:</label><br>
                    <input type="text" id="nombre" name="nombreNegocio" required><br><br>
    
                    <label for="telefono">Teléfono:</label><br>
                    <input type="tel" id="telefono" name="telefonoNegocio" required pattern="[0-9]{4}-[0-9]{4}" placeholder="Formato: 1234-5678"><br><br>
    
                    <label for="hora_apertura">Hora de Apertura:</label><br>
                    <input type="time" id="hora_apertura" name="horaApertura" required><br><br>
    
                    <label for="hora_cierre">Hora de Cierre:</label><br>
                    <input type="time" id="hora_cierre" name="horaCierre" required><br><br>
                    </fieldset>
                <br>

                <h3>Datos del administrador</h3>
                <fieldset>
                    <legend>Datos Personal</legend>
                    <div>
                        <div>
                            <label for="primerNombre">Primer Nombre</label>
                            <input type="text" placeholder="Primer Nombre" name="primerNombre">
                        </div>
                        <div>
                            <label for="segundoNombre">Segundo Nombre</label>
                            <input type="text" placeholder="Segundo Nombre" name="segundoNombre">
                        </div>
                        <div>
                            <label for="primerApellido">Primer Apellido</label>
                            <input type="text" placeholder="Primer Apellido" name="primerApellido">
                        </div>
                        <div>
                            <label for="segundoApellido">Segundo Apellido</label>
                            <input type="text" placeholder="Segundo Apellido" name="segundoApellido">
                        </div>
                    </div>
                </fieldset>
                <br>

                <fieldset>
                    <legend>Datos Generales</legend>
                        <div>
                            <div>
                                <label for="email">E-mail</label>
                                <input type="email" placeholder="E-mail" name="email">
                            </div>
                            <div>
                                <label for="contrasena">Contraseña</label>
                                <input type="password" placeholder="Contraseña" name="contrasena">
                            </div>
                            <div>
                                <label for="contrasenaConfirmed">Confirmar Contraseña</label>
                                <input type="password" placeholder="Confirmar Contraseña">
                            </div>
                            <div>
                                <label for="telefono">Telefono</label>
                                <input type="tel" placeholder="Telefono" name="telefonoUsuario" min="1" max="10">
                            </div>
                        </div>
                </fieldset>
            </div>
        </div>

                {{-- Comienzo del mapa --}}

                <h3>¿Cual es la direccion del negocio?</h3>
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
                <div>
                    <input type="submit" value="Agregar negocio"><br>
                </div>
    </form> {{-- Fin del formulario --}}
    </div>


    {{-- <script src="/js/mapa.js"></script> --}}
    <script src="/js/PosicionActualUsuario.js"></script>

</body>
</html>