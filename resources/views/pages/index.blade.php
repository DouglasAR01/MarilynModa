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
    <div class=" contenedor__text">
        <h1 class="contenedor__title">¡Bienvenido!</h1>
    </div>

    {{-- Slider --}}
    <div class="carousel-container">
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
            <a class="ctrl-left carousel-control-prev" href="#carruselPortada" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="ctrl-right carousel-control-next" href="#carruselPortada" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    {{--SUBTITLE--}}
    <div class=" contenedor__text">
        <h1 class="contenedor__subtitle">Para cada ocasión vístete...</h1>
    </div>

    {{-- Tarjeta 1 --}}
    <div class="my-card">
        <div class="card__image-container">
            <img src="{{asset('images/ESTILO.webp')}}" class="card__img" alt="...">
        </div>
        <div class="card__content">
            <h2 class="card__title">...con Estilo</h2>
            <p class="card__subtitle">Te verás sofisticada</p>
            <p class="card__desc">En tus fechas especiales te ayudamos a resaltar tu ESTILO, con elegancia, y un toque sofisticado. 💋</p>
        </div>
    </div>

    {{-- Tarjeta 2 --}}
    <div class="my-card">
        <div class="card__image-container">
            <img src="{{asset('images/GLAMOUR.webp')}}" class="card__img" alt="...">
        </div>
        <div class="card__content">
            <h2 class="card__title">...con Glamour</h2>
            <p class="card__subtitle">Serás inolvidable</p>
            <p class="card__desc">GLAMOUR es el toque mágico que te da Marilyn Moda, para que te veas elegantemente inolvidable.</p>
        </div>
    </div>

    {{-- Tarjeta 3 --}}
    <div class="my-card">
        <div class="card__image-container">
            <img src="{{asset('images/RADIANTE.webp')}}" class="card__img" alt="...">
        </div>
        <div class="card__content">
            <h2 class="card__title">...con Elegancia</h2>
            <p class="card__subtitle">Tu estilo será moderno</p>
            <p class="card__desc">Te aseguramos ser la persona más ELEGANTE en el evento gracias a nuestro inventario moderno.</p>
        </div>
    </div>
    {{-- Adicional --}}
    <div class=" contenedor__text">
        <h1 class="contenedor__title">¿Qué esperas?</h1>
        <p class="contenedor__desc">¡Mira nuestro catálogo!</p>
    </div>

    <div class="bottom-container" id="bottom-btn">
        <a class="btn btn-mod btn-primary" href="/catalogo">Ver catálogo</a>
    </div>

</div>

@endsection
