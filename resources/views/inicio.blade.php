<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Gozu</title>
    <link rel="icon" href="{{ asset('static/iconoHotel.ico') }}"/>
    <link rel="stylesheet" href="{{ asset('static/login.css') }}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
          integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
</head>
<body>
<form class="login" method="post" action="{{route("login")}}">
    @csrf
    <div class="login-box">
        <h1 class="loginTitle">Bienvenido</h1>
        <div class="text-box">
            <i class="fa-solid fa-user"></i>
            <input name="usuario" placeholder="Ingrese usuario"/>
        </div>
        @error("usuario")
        <span>Campo obligatorio</span>
        @enderror
        <div class="text-box">
            <i class="fa-solid fa-lock"></i>
            <input name="password" placeholder="Ingrese password" type="password"/>
        </div>
        @error("password")
        <span>Campo obligatorio</span>
        @enderror
        @error("validador")
        <span>Datos incorrectos, intente nuevamente</span>
        @enderror
        <button class="btn">Iniciar Sesión</button>
    </div>

</form>

</body>
</html>
