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
      <h4 id="head__desc">Lorem ipsum dolor sit amet.</h4>
    </div>
  </div>
@endsection

@section('content')
<div class="populares">

  <div class=" populares__text">
    <h1 class="populares__title">Los más alquilados</h1>
    <p class="populares__desc">Mira nuestros artículos más populares</p>
  </div>

  <div class="portfolio">
    <div class="portfolio-item tall" style="background-image:url('https://picsum.photos/200')">one</div>
    <div class="portfolio-item large" style="background-image:url('https://picsum.photos/201')">two</div>
    <div class="portfolio-item slim" style="background-image:url('https://picsum.photos/202')">three</div>
    <div class="portfolio-item long" style="background-image:url('https://picsum.photos/203')">four</div>
    <div class="portfolio-item small" style="background-image:url('https://picsum.photos/204')">five</div>
    <div class="portfolio-item wide" style="background-image:url('https://picsum.photos/205')">six</div>
  </div>

</div>

@endsection
