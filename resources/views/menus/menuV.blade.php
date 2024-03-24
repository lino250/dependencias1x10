<header class="navbar nav-horiz sticky-top flex-md-nowrap" data-bs-theme="dark">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="{{'dashboard'}}"><img src="{{asset('img/amoW.png')}}" alt=""></a>

        {{-- <span>{{ Auth::user()->name }}</span> --}}
        @if(Auth::user()->dependencia)
          <h3> {{ Auth::user()->dependencia->nombre }}</h3>
        @else
          <h3>ADMIN</h3>
        @endif              
    
  <ul class="navbar-nav flex-row d-md-none">
    <li class="nav-item text-nowrap">
      <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </li>
  </ul>
</header>
    <div class="sidebar border-right col-md-3 col-lg-2 nav-vertical">
      <div class="offcanvas-md offcanvas-end nav-vertical" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header justify-content-center">
          <h5 class="offcanvas-title " id="sidebarMenuLabel">Alcaldia 1X10</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="{{route('representante.index')}}">
                Representante
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="#">
                Registro 1x10
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" href="{{ route('reporte.index') }}">
                Reporte
              </a>
            </li>
          </ul>
          <ul class="nav flex-column mb-auto">
          <hr class="my-3">
            <li class="nav-item">
                @if (Auth::check())
                  <!-- Si el usuario está autenticado, mostrar el enlace o botón de cierre de sesión -->
                  <form method="POST" action="{{ route('logout') }}">
                      @csrf
                      <button class="nav-link d-flex align-items-center gap-2" type="submit">Cerrar sesión</button>
                  </form>
                @endif
            </li>
          </ul>
        </div>
      </div>
    </div>