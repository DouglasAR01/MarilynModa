<div class="container">
  @if(auth(session('cargo'))->user())
    <span><i class="fas fa-grip-horizontal fa-lg"></i></span>
  @endif
  <a id="nav-brand" class="navbar-brand" href="{{ url('/') }}">
      {{-- {{ config('app.name', 'Laravel') }} --}}
      Marilyn<span>Moda</span>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
      <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <!-- Left Side Of Navbar -->
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav_item"><a href="/" class="nav_link">Inicio</a><div class="square"></div></li>
      <!--DROPDOWN-->
      <li class="nav_item">
        <a href="/catalogo" class="nav_link">Catálogo</a><div class="square"></div>
        {{-- Dropdown deshabilitado hasta que estén habilitados los filtros --}}
        {{-- <div class="dropdown">
          <button class=" dropdown-toggle nav_btn_link" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span>Catálogo</span>
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item drop__link" href="/catalogo">Ver todo</a>
            <a class="dropdown-item drop__link" href="/catalogo">Vestidos de Boda</a>
            <a class="dropdown-item drop__link" href="/catalogo">Vestidos de Fiesta</a>
            <a class="dropdown-item drop__link" href="/catalogo">Vestidos de Gala</a>
            <a class="dropdown-item drop__link" href="/catalogo">Trajes de Caballero</a>
            <a class="dropdown-item drop__link" href="/catalogo">Trajes de Niño</a>
            <a class="dropdown-item drop__link" href="/catalogo">Accesorios</a>
          </div>
        </div> --}}
        {{-- <div class="dpdwn">
          <button class="nav_link">Catálogo</button>
          @include('partials.navbarDropdown')

        </div> <!--END OF DROPDOWN--> --}}
      </li>

    </ul>

      <!-- Right Side Of Navbar -->
    <ul id="nav-right" class="navbar-nav mt-2 mt-lg-0">
        <!-- Authentication Links -->
        @if(empty(auth(session('cargo'))->user()))
            <li class="nav-item">
                <a class="nav_link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
        @else
            <li class="nav_item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{auth(session('cargo'))->user()->emp_nombre }}<span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="/home">Home</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endif
  </ul>
  </div><!--END OF COLLAPSE-->
</div><!--END OF CONTAINER-->
