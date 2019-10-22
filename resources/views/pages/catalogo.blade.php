@extends('layouts.main')

@section('stylesheets')
  {{-- <link rel="stylesheet" href="{{asset('css/diamonds.css')}}"> --}}
  <link rel="stylesheet" href="{{asset('css/catalogo.css')}}">
@endsection

@section('content')
  <p>Nota: La búsqueda y filtros están en fase de desarrollo, por lo tanto,
  actualmente no funcionan.</p>
  <form class="key-search">
      <input class="form-control" type="search" placeholder="Busca por palabra clave...">
      <button class="btn btn-mod btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>

  <div class="filters">
    <div class="filters-hidden">Filtrar</div>
    <div class="filters-container">
      <span><i class="fas fa-times fa-lg"></i></span>
      <div class="filter__column">
        <h3 class="filter__title">Género</h3>

        <div class="checkbox"><label><input type="checkbox" rel=""/> Mujer</label></div>
        <div class="checkbox"><label><input type="checkbox" rel=""/> Hombre</label></div>
        <div class="checkbox"><label><input type="checkbox" rel=""/> Niño</label></div>

      </div>
      <div class="filter__column">
        <h3 class="filter__title">Tipo de prenda</h3>

        <div class="two-column">
          <div class="checkbox"><label><input type="checkbox" rel=""/> Vestido</label></div>
          <div class="checkbox"><label><input type="checkbox" rel=""/> Falda</label></div>
          <div class="checkbox"><label><input type="checkbox" rel=""/> Blusa</label></div>
          <div class="checkbox"><label><input type="checkbox" rel=""/> Pantalón</label></div>
          <div class="checkbox"><label><input type="checkbox" rel=""/> Camisa</label></div>
          <div class="checkbox"><label><input type="checkbox" rel=""/> Traje</label></div>
          <div class="checkbox"><label><input type="checkbox" rel=""/> Accesorios</label></div>
        </div>

      </div>
      <div class="filter__column">
        <h3 class="filter__title">Talla</h3>

        <div class="two-column">
          <div class="checkbox"><label><input type="checkbox" rel=""/> XS</label></div>
          <div class="checkbox"><label><input type="checkbox" rel=""/> S</label></div>
          <div class="checkbox"><label><input type="checkbox" rel=""/> M</label></div>
          <div class="checkbox"><label><input type="checkbox" rel=""/> L</label></div>
          <div class="checkbox"><label><input type="checkbox" rel=""/> XL</label></div>
          <div class="checkbox"><label><input type="checkbox" rel=""/> XXL</label></div>
        </div>

      </div>
      <div class="filter__column">
        <h3 class="filter__title">Filtrar por</h3>

        <div class="checkbox"><label><input type="checkbox" rel=""/> Popular</label></div>
        <div class="checkbox"><label><input type="checkbox" rel=""/> Nuevo</label></div>
        <div class="checkbox"><label><input type="checkbox" rel=""/> Ver Todo</label></div>

        <button type="button" name="button">Desmarcar todo</button>

      </div>

    </div><!--END OF FILTERS-CONTAINER-->
  </div><!--END OF FILTERS-->

  <div class="container-fluid mt-4">
    <div class="row justify-content-center">
      @if (count($prendas)>0)
        @foreach ($prendas as $prenda)
          <div class="col-auto mb-3">
            <div class="card" style="width: 18rem;">
              <img src="{{asset('storage/'.$prenda->getFotoPrincipal()->fop_link)}}" class="card-img-top">
              <div class="card-body">
                <h5 class="card-title">{{$prenda->pre_nombre}}</h5>
                <p class="card-text">{{$prenda->pre_descripcion}}</p>
                <a href="/prendas/{{$prenda->pk_prenda}}" class="btn btn-primary">Ir a detalles</a>
              </div>
            </div>
          </div>
        @endforeach
      @else
        <div class="">
          <p>No hay prendas disponibles en este momento.</p>
        </div>
      @endif

    </div>
    <div class="filters">
      {{ $prendas->render()}}
    </div>
  </div>

@endsection

@section('scripts')
  {{-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="{{ asset('js/jquery-diamonds.js') }}" defer></script>
  <script>
    $(function(){
      $(".diamond-grid").diamonds({
      size : 250, // Size of diamonds in pixels. Both width and height.
      gap : 8, // Pixels between each square.
      hideIncompleteRow : false, // Hide last row if there are not enough items to fill it completely.
      autoRedraw : true, // Auto redraw diamonds when it detects resizing.
      itemSelector : ".item" // the css selector to use to select diamonds-items.
      });
    });

    $(function(){
      var gridMargin = function(){
        if(($('.diamond-row-lower').last().children().length) > 0){
          $('.diamond-grid').css('margin-bottom', '8rem');
        }
        else{
          $('.diamond-grid').css('margin-bottom', '0');
        }
      };

      gridMargin();

      $(window).resize(function() {
          gridMargin();
      });
    });
  </script> --}}
@endsection
