<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio de sesión</title>
</head>
<body>
    <h1>Inicio de sesión</h1>

    <div>
        <form action="{{route('usuario.Login')}}" method="POST">
            {{-- //Usamos el metodo post para que no se vea la informacion en la url --}}
            @csrf
            <div>
                <label for="email">Email</label>
                <input type="email" placeholder="Correo Electronico" name="email">
            </div>
            <div>
                <label for="contrasena">Contraseña</label>
                <input type="password" placeholder="Contraseña" name="contrasena">
            </div>

            <div>
                <input type="submit" value="Iniciar Sesión" >
            </div>
        </form>
    </div>
</body>
<script src="/js/script.js"></script>
</html>