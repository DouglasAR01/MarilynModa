<!DOCTYPE html>
<html lang="en">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS and other CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    @yield('stylesheets')

    <!-- Scripts -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/sticky.js') }}" defer></script>

    <script>
    function dropdownToggle() {
      document.getElementById("dropdown").classList.toggle("show");
    }
    </script>

    <script>
    $(function(){
      $(".dropdown").hover(function(){
        $(".dropdown-content").toggle('slow');
      });
    });
    </script>

    <title>Marilyn Moda</title>
  </head>

  <body id="bootstrap-overrides">
    <div class="container-fluid">

      @yield('header')

      <!--NAVIGATION-->
      <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-laravel">
          <div class="container">
              <a class="navbar-brand" href="{{ url('/') }}">
                  {{-- {{ config('app.name', 'Laravel') }} --}}
                  MarilynModa
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                  <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <!-- Left Side Of Navbar -->
                  <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav_item"><a href="/" class="nav_link">Inicio</a></li>

                    <!--DROPDOWN-->
                    <li class="nav_item">
                      <div class="dropdown">
                        <a href="catalogo" class="no-after-hover">Catálogo</a>

                        <div id="dropdown" class="dropdown-content">
                          <div class="drop-wrap">
                            <div class="drop_column drop_column_first">
                              <ul class="drop__menu">
                                <li><a href="#" class="drop__link drop-cat">Mujer</a></li>
                                <li><a href="#" class="drop__link drop-cat">Hombre</a></li>
                                <li><a href="#" class="drop__link drop-cat">Popular</a></li>
                                <li><a href="#" class="drop__link drop-cat">Nuevo</a></li>
                                <li><a href="#" class="drop__link drop-cat">Ver Todo</a></li>
                              </ul>
                            </div>
                            <div class="drop_column">
                              <ul class="drop__menu">
                                <li><a href="#" class="drop__link drop-cat">Ropa</a>
                                  <ul class="drop__submenu">
                                    <li><a href="#" class="drop__link">Vestidos</a></li>
                                    <li><a href="#" class="drop__link">Blusas</a></li>
                                    <li><a href="#" class="drop__link">Faldas</a></li>
                                    <li><a href="#" class="drop__link">Pantalones</a></li>
                                    <li><a href="#" class="drop__link">Chaquetas</a></li>
                                  </ul>
                                </li>
                              </ul>
                            </div>
                            <div class="drop_column">
                              <ul class="drop__menu">
                                <li><a href="#" class="drop__link drop-cat">Accesorios</a>
                                  <ul class="drop__submenu">
                                    <li><a href="#" class="drop__link">Bufandas</a></li>
                                    <li><a href="#" class="drop__link">Collares</a></li>
                                    <li><a href="#" class="drop__link">Bolsos</a></li>
                                    <li><a href="#" class="drop__link">Otros Accesorios</a></li>
                                  </ul>
                                </li>
                                <li><a href="#" class="drop__link drop-cat">Zapatos</a></li>
                                <li><a href="#" class="drop__link drop-cat">Nuevo</a></li>
                              </ul>
                            </div>
                          </div>
                        </div>
                    </li>




                  </ul>
                  <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                  </form>

                  <!-- Right Side Of Navbar -->
                  <ul id="nav-right" class="navbar-nav mt-2 mt-lg-0">
                      <!-- Authentication Links -->
                      @guest
                          <li class="nav_item">
                              <a class="nav_link" href="{{ route('login') }}">{{ __('Login') }}</a>
                          </li>
                          @if (Route::has('register'))
                              <li class="nav_item">
                                  <a class="nav_link" href="{{ route('register') }}">{{ __('Register') }}</a>
                              </li>
                          @endif
                      @else
                          <li class="nav_item dropdown">
                              <a id="navbarDropdown" class="nav_link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  {{ Auth::user()->name }} <span class="caret"></span>
                              </a>

                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                      @endguest
                  </ul>
              </div>
          </div>
      </nav>
      <!--DROPDOWN-->
      {{-- <div class="drop-wrap">
        <div class="drop_column drop_column_first">
          <ul class="drop__menu">
            <li><a href="#" class="drop__link subtitulos-cat">Mujer</a></li>
            <li><a href="#" class="drop__link subtitulos-cat">Hombre</a></li>
            <li><a href="#" class="drop__link subtitulos-cat">Popular</a></li>
            <li><a href="#" class="drop__link subtitulos-cat">Nuevo</a></li>
            <li><a href="#" class="drop__link subtitulos-cat">Ver Todo</a></li>
          </ul>
        </div><!--END OF FIRST COLUMN-->
        <div class="drop_column">
          <ul class="drop__menu">
            <li><a href="#" class="drop__link icon-font subtitulos-cat">Ropa</a>
              <ul class="site-nav__sub-submenu">
                <li><a href="#" class="drop__link">Vestidos</a></li>
                <li><a href="#" class="drop__link">Blusas</a></li>
                <li><a href="#" class="drop__link">Faldas</a></li>
                <li><a href="#" class="drop__link">Pantalones</a></li>
                <li><a href="#" class="drop__link"Chaquetas</a></li>
              </ul>
            </li>
          </ul>
        </div><!--END OF SECOND COLUMN-->
        <div class="drop_column">
          <ul class="drop__menu">
            <li><a href="#" class="drop__link icon-font subtitulos-cat">Accesorios</a>
              <ul class="site-nav__sub-submenu">
                <li><a href="#" class="drop__link">Bufandas</a></li>
                <li><a href="#" class="drop__link">Collares</a></li>
                <li><a href="#" class="drop__link">Bolsos</a></li>
                <li><a href="#" class="drop__link">Otros Accesorios</a></li>
              </ul>
            </li>
            <li><a href="#" class="drop__link icon-font subtitulos-cat">Zapatos</a></li>
            <li><a href="#" class="drop__link icon-font subtitulos-cat">Nuevo</a></li>
          </ul>
        </div><!--END OF THIRD COLUMN-->
      </div><!--END OF DROPDOWN--> --}}


      <!--CONTENT-->
      <div class="row content">
        @yield('content')
      </div> <!--END OF CONTENT-->

      <!--FOOTER-->

      <footer class="row text-center">
        <div class="footer-grid">
          <ul class="footer-grid__item f_row f_row_ul">
            <li><a href="#" >Volver Arriba</a></li>
            <li><a href="#" class="fa fa-facebook"></a><a href="#" class="fa fa-twitter"></a><a href="#" class="fa fa-google"></a><a href="#" class="fa fa-youtube"></a></li>
          </ul>

          <div class="footer-nav footer-grid__item f_middle">
            <h6 class="footer-nav__title">Nosotros</h6>
            <ul class="footer-nav__submenu">
              <li><a class="footer-nav__link" href="#">Acerca de nosotros</a></li>
              <li><a class="footer-nav__link" href="#">Trabaja con nosotros</a></li>
              <li><a class="footer-nav__link" href="#">Contáctanos</a></li>
            </ul>
          </div>

          <div class="footer-nav footer-grid__item f_middle">
            <h6 class="footer-nav__title">Información</h6>
            <ul class="footer-nav__submenu">
              <li><a class="footer-nav__link" href="#">Preguntas frecuentes</a></li>
              <li><a class="footer-nav__link" href="#">Políticas de alquiles y venta</a></li>
              <li><a class="footer-nav__link" href="#">Términos y condiciones</a></li>
            </ul>
          </div>

          <div class="footer-nav footer-grid__item f_middle">
            <h6 class="footer-nav__title">Encuéntranos</h6>
            <pre>Cll 00 #0-00, local #0
CC STUFF, Bucaramanga</pre>
            <a href="#" class="footer-misc__tiendas">
              <i class="fas fa-map-marker-alt"></i>
              <span> Localiza nuestra tienda</span>
            </a>
          </div>

  			  <div class="footer-grid__item f_row">© <span class="footer-creditos__year">2019 &nbsp</span>  Marilyn Moda S.A.</div>

        </div> <!--END FOOTER-GRID-->
      </footer>

    </div> <!--END OF CONTAINER-FLUID-->

  </body>
</html>
