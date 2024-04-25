<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{asset('img/icono.png')}}" type="image/png">
    <title>@yield('title')</title>
    <!--Estilos y js-->
    @vite(['resources/sass/app.scss','resources/js/app.js'])
</head>
<body>
@include('auth.menu')
    @yield('content')
</body>
</html>