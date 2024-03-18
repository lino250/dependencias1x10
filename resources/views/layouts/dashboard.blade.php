<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{asset('img/icono.png')}}" type="image/png">
    <title>@yield('title')</title>    <!--Estilos y js-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        var baseUrl = "{{ url('/') }}";
    </script>
    @vite(['resources/sass/app.scss','resources/js/app.js'])
  
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            @include('menus.menuV')
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 pt-3">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>