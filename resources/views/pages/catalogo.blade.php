@extends('layouts.main')

@section('stylesheets')
  {{-- <link rel="stylesheet" href="{{asset('css/diamonds.css')}}"> --}}
  <link rel="stylesheet" href="{{asset('css/catalogo.css')}}">
@endsection

@section('content')
  <div class="container">
    <div class="card">
      <img src="https://picsum.photos/500/500" alt="" class="card__img">
      <h3 class="card__title">Vestidos de Novia</h3>
    </div>
    <div class="card">
      <img src="https://picsum.photos/500/501" alt="" class="card__img">
      <h3 class="card__title">Vestidos de Fiesta</h3>
    </div>
    <div class="card">
      <img src="https://picsum.photos/501/500" alt="" class="card__img">
      <h3 class="card__title">Vestidos de Gala</h3>
    </div>
    <div class="card">
      <img src="https://picsum.photos/501/501" alt="" class="card__img">
      <h3 class="card__title">Trajes de Caballero</h3>
    </div>
    <div class="card">
      <img src="https://picsum.photos/250/252" alt="" class="card__img">
      <h3 class="card__title">Trajes de Niño</h3>
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
