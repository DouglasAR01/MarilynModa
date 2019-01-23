<div class="container">
  <a class="navbar-brand" href="{{ url('/') }}">
      {{-- {{ config('app.name', 'Laravel') }} --}}
      Marilyn<span>Moda</span>
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
        <div class="dpdwn">
          <a href="catalogo" class="no-after-hover">Catálogo</a>
          @include('partials.navbarDropdown')

        </div> <!--END OF DROPDOWN-->
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
            <li class="nav-item">
                <a class="nav_link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
        @else
            <li class="nav_item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{auth()->user()->emp_nombre }}<span class="caret"></span>
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
  </div><!--END OF COLLAPSE-->
</div><!--END OF CONTAINER-->
