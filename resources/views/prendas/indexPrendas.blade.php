@extends('layouts.tabs')


@section('styles')
  <link rel="stylesheet" href="/css/prenda.css">
@endsection

@section('search-head')
  <form class="key-search search-right">
    <input class="form-control" type="search" placeholder="Buscar...">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form>
@endsection

@section('db-tab')
<div class="prendas-container">
  @foreach ($prendas as $prenda)
    <div class="prenda">

      <div class="prenda__head center">
        <span>#{{$prenda->pk_prenda}}</span>
        <span>@include('partials.elipseOptions')</span>

        <p>{{$prenda->pre_nombre}}</p>
      </div>

      <ul class="prenda__info">
        <div class="foto-prinicipal">
          <img src="{{asset('storage/'.$prenda->getFotoPrincipal()->fop_link)}}" alt="" height="160" width="84">
        </div>
        <li><b>Talla:</b> {{$prenda->pre_talla}}</li>
        <li><b>Categoría:</b> {{$prenda->categoria->cat_nombre}}</li>
        <li><b>Cantidad:</b> {{$prenda->pre_cantidad}}</li>
        <li><b>Precio de alquiler sugerido:</b> {{$prenda->pre_precio_sugerido}}</li>
      </ul>
    </div>
  @endforeach
</div>
{{$prendas->render()}}
@endsection

@section('bottom')
  <div class="bottom-container">
    <a class="btn btn-mod btn-primary" href="/prendas/crear">Nueva Prenda</a>
    <span> resultados</span>
  </div>
@endsection
