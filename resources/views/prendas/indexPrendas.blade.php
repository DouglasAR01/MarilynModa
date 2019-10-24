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
        <li><b>Categoría:</b> {{$prenda->pre_fk_categoria}}</li>
        <li><b>Cantidad:</b> {{$prenda->pre_cantidad}}</li>
        <li><b>Precio Sugerido:</b> {{$prenda->pre_precio_sugerido}}</li>
      </ul>
    </div>
  @endforeach

</div>

    {{-- Atributos
    -llave primaria -> pk_prenda
    -categoria -> pre_fk_categoria
    -visibilidad -> pre_visible ((( SE PUEDE USAR ESTE ATTRIB PARA MOSTRAR O NO UN ITEM.)))
    -nombre -> pre_nombre
    -descripción -> pre_descripcion
    -talla -> pre_talla
    -stock -> pre_cantidad
    -precio sugerido -> pre_precio_sugerido
    -fecha compra -> pre_fecha_compra
    -veces alquilado -> pre_veces_alquilado
     --}}
      {{-- <table class="db-table" border="1">
        <tr>
          <th>Foto</th>
          <th>Código</th>
          <th>Categoría</th>
          <th>Nombre</th>
          <th>Descripción</th>
          <th>Talla</th>
          <th>Cantidad disponible</th>
          <th>Veces alquilado</th>
          <th>Ver</th>
        </tr>
        @foreach ($prendas as $prenda)
          <tr>
            <td><img src="{{asset('storage/'.$prenda->getFotoPrincipal()->fop_link)}}" alt="" height="84" width="84"></td>
            <td>{{$prenda->pk_prenda}}</td>
            <td>{{$prenda->getNombreCategoria()}}</td>
            <td>{{$prenda->pre_nombre}}</td>
            <td>{{$prenda->pre_descripcion}}</td>
            <td>{{$prenda->pre_talla}}</td>
            <td>{{$prenda->pre_cantidad}}</td>
            <td>{{$prenda->pre_veces_alquilado}}</td>
            <td><a href="/prendas/{{$prenda->pk_prenda}}">Ver</a></td>
          </tr>
        @endforeach
      </table> --}}
@endsection

@section('bottom')
  <div class="bottom-container">
    <a class="btn btn-mod btn-primary" href="/prendas/crear">Nueva Prenda</a>
    <span> resultados</span>
  </div>
@endsection
