<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('static/app.css') }}"/>
    <link rel="stylesheet" href="{{ asset('static/navBar.css') }}"/>
    <link rel="stylesheet" href="{{ asset('static/usuarios.css') }}"/>
    <link rel="stylesheet" href="{{ asset('static/habitacion.css') }}"/>
    <link rel="stylesheet" href="{{ asset('static/productos.css') }}"/>
    <link rel="stylesheet" href="{{ asset('static/ventas.css') }}"/>
    <link rel="icon" href="{{ asset('static/iconoHotel.ico') }}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
          integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <title>Principal</title>
</head>
<body>
<!--Opciones-->
<div class="container">
    <div class="navBar">
        <img class="logo" src="{{ asset('static/iconoHotel.png')}}" alt="logo">
        <ul class="navList">
            <li class="navListItem"><a href="{{route("dashboard")}}">Inicio - Alquiler</a></li>
            @if (auth() ->user() -> cargo == "administrador")
                <li class="navListItem"><a href="{{route("usuarios")}}">Usuarios</a></li>
                <li class="navListItem"><a href="{{route("listarhabitacion")}}">Habitación</a></li>
            @endif
            <li class="navListItem"><a href="{{route("listarProducto")}}">Productos</a></li>
            <li class="navListItem"><a href="{{route("ventas")}}">Reportes</a></li>
            <li class="navListItem"><a href="{{route("reporte")}}">Reportes</a></li>
            
        </ul>
    </div>
    <div class="containerRol">
        <div class="usuario">
            <!--Usuario agregar icono usuario-->
            <i class="fa-solid fa-user"></i>
            <p>{{auth()->user()->nombre." ".auth()->user()->apellido." (".auth()->user()->cargo.")"}}</p>
        </div>
        <div style="margin-top: 15px">
            <a style="display: inline-block; width: 100%; text-align: center; color: white;" href="{{route("cerrarSesion")}}">Cerrar sesión</a>
        </div>
    </div>

</div>
@yield("contenido")
</body>
</html>
