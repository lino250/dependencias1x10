<nav class="navbar navLogin navbar-expand-lg shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}"><img src="{{asset('img/amoW.png')}}" alt=""></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <a href="{{ url('dashboard') }}" class="nav-link ">Panel</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link ">Iniciar Sesión</a>
                        </li>
                        
                      
                    {{-- @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="nav-link ">Register</a>
                        @endif--}}
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>

