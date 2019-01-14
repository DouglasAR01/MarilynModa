@extends('layouts.main')

@section('stylesheets')
  <link rel="stylesheet" href="{{asset('css/catalogo.css')}}">
@endsection

@section('content')
  <div class="container">
    <div class="card">
      <img src="https://picsum.photos/300/300" alt="" class="card__img">
      <h3 class="card__title">fiesta</h3>
    </div>
    <div class="card">
      <img src="https://picsum.photos/300/301" alt="" class="card__img">
      <h3 class="card__title">bodas</h3>
    </div>
    <div class="card">
      <img src="https://picsum.photos/301/300" alt="" class="card__img">
      <h3 class="card__title">comunion</h3>
    </div>
    <div class="card">
      <img src="https://picsum.photos/301/301" alt="" class="card__img">
      <h3 class="card__title">cat4</h3>
    </div>
    <div class="card">
      <img src="https://picsum.photos/300/302" alt="" class="card__img">
      <h3 class="card__title">cat5</h3>
    </div>
    <div class="card">
      <img src="https://picsum.photos/302/300" alt="" class="card__img">
      <h3 class="card__title">cat6</h3>
    </div>
  </div>
@endsection
