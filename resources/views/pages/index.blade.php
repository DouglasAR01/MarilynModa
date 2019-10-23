@extends('layouts.main')

@section('stylesheets')
  <link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('header')
  <!--HEADER-->
  <div class="row header">
    <div class="head__text text-center">
      <h1 id="head__title">Marylin Moda</h1>
      <hr id="head__line">
      <h4 id="head__desc">Alquiler de trajes y vestidos.</h4>
      <div class="arrow">
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
@endsection

@section('content')
  <div class="contenedor">
    <h1 class="contenedor__title">¡Bienvenido!</h1>
  </div>
  {{-- Slider --}}
  <div class="contenedor">
    <div id="carruselPortada" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carruselPortada" data-slide-to="0" class="active"></li>
        <li data-target="#carruselPortada" data-slide-to="1"></li>
        <li data-target="#carruselPortada" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block imgPortada" src="{{asset('images/portada_1.webp')}}" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block imgPortada" src="{{asset('images/portada_2.webp')}}" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block imgPortada" src="{{asset('images/portada_3.webp')}}" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carruselPortada" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carruselPortada" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
  {{-- Tarjetitas --}}
  <div class="contenedor">
    <h1 style="margin-bottom:50px;">Para cada ocasión vístete...</h1>
    {{-- Tarjeta 1 --}}
    <div class="card mb-3" style="max-width: 840px;">
      <div class="row no-gutters">
        <div class="col-md-3">
          <img src="{{asset('images/ESTILO.webp')}}" class="card-img" alt="...">
        </div>
        <div class="col-md-9">
          <div class="card-body">
            <h2 class="card-title">...con Estilo</h2>
            <p class="card-text">En tus fechas especiales te ayudamos a resaltar tu ESTILO, con elegancia, y un toque sofisticado. 💋</p>
            <p class="card-text"><small class="text-muted">Te verás como una persona sofisticada.</small></p>
          </div>
        </div>
      </div>
    </div>
    {{-- Tarjeta 2 --}}
    <div class="card mb-3" style="max-width: 840px;">
      <div class="row no-gutters">
        <div class="col-md-9">
          <div class="card-body">
            <h2 class="card-title">... con Glamour</h2>
            <p class="card-text">GLAMOUR es el toque mágico que te da Marilyn Moda, para que te veas elegantemente inolvidable.</p>
            <p class="card-text"><small class="text-muted">Serás la persona más inolvidable.</small></p>
          </div>
        </div>
          <div class="col-md-3">
            <img src="{{asset('images/GLAMOUR.webp')}}" class="card-img" alt="...">
          </div>
      </div>
    </div>
    {{-- Tarjeta 3 --}}
    <div class="card mb-3" style="max-width: 840px;">
      <div class="row no-gutters">
        <div class="col-md-3">
          <img src="{{asset('images/RADIANTE.webp')}}" class="card-img" alt="...">
        </div>
        <div class="col-md-9">
          <div class="card-body">
            <h2 class="card-title">... con Elegancia</h2>
            <p class="card-text">Te aseguramos ser la persona más ELEGANTE en el evento, gracias a nuestro inventario moderno.</p>
            <p class="card-text"><small class="text-muted">Tu estilo será moderno.</small></p>
          </div>
        </div>
      </div>
    </div>

  </div>
  {{-- Adicional --}}
  <div class="contenedor">

    <div class=" contenedor__text">
      <h1 class="contenedor__title">¿Qué esperas?</h1>
      <p class="contenedor__desc">¡Mira nuestro catálogo!</p>
    </div>
    <div class="bottom-container">
      <a class="btn btn-mod btn-primary" href="/catalogo">Ver catálogo</a>
    </div>

  </div>

@endsection
