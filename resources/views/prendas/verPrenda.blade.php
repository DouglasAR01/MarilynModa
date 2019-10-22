@extends('layouts.main')
@extends('layouts.errors')

@section('stylesheets')
  <link rel="stylesheet" href="/css/prenda.css">
@endsection

@section('content')
  <div class="row justify-content-center">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <span>Disponible</span><br>
          <span>Mod. última vez: {{$prenda->updated_at}}</span>
          <h2>#{{$prenda->pk_prenda}}</h2>
        </div>
        <div class="card-body">
          <div class="view-foto">
            <img src="{{asset('storage/'.$prenda->getFotoPrincipal()->fop_link)}}" alt="">
          </div>
          <ul class="prenda-info">
            <li><b>Nombre:</b> {{$prenda->pre_nombre}}</li>
            <li><b>Descripción:</b> {{$prenda->pre_descripcion}}</li>
            <li><b>Talla:</b> {{$prenda->pre_talla}}</li>
            <li><b>Categoría:</b> {{$prenda->categoria->cat_nombre}}</li>
            @if (auth(session('cargo'))->user())
              <li><b>Precio Sugerido:</b> ${{$prenda->pre_precio_sugerido}}</li>
              <li><b>Veces Alquilado:</b> {{$prenda->pre_veces_alquilado}}</li>
              <li>
                <b>Visible al público:</b>
                @if (!$prenda->pre_visible)
                  NO
                @else
                  SÍ
                @endif
              </li>
              <li><b>Cantidad disponible:</b> {{$prenda->pre_cantidad}}</li>
              <li><b>Fecha de Compra:</b> {{$prenda->pre_fecha_compra}}</li>
            @endif
            @if (count($prenda->palabrasClave)>0)
              <li><b>Palabras Clave:</b>
                @foreach ($prenda->palabrasClave as $palabra)
                  {{$palabra->pivot->pal_clave}}
                @endforeach
              </li>
            @endif
            <li><b>Fotos adicionales:</b></li>
          </ul>
          @if (count($prenda->fotos)>1)
            <div class="fotos">
              <img src="{{asset('storage/'.$prenda->getFotoPrincipal()->fop_link)}}" class="miniature">
              @foreach ($prenda->fotos as $foto)
                @if (!$foto->fop_principal)
                  <img src="{{asset('storage/'.$foto['fop_link'])}}" alt="Foto_secundaria" class="miniature">
                @endif
              @endforeach
            </div>
          @else
            <p>Esta prenda no tiene fotos adicionales.</p>
          @endif
        </div>
      </div>
      @if (auth(session('cargo'))->user())
        @if (auth(session('cargo'))->user()->emp_privilegio == 'a' ||
             auth(session('cargo'))->user()->emp_privilegio == 'g')
          <div class="card-btns">
             <a class="btn btn-info" href="/prendas/{{$prenda->pk_prenda}}/editar">Editar</a>
             <button class="btn btn-warning" href="#">Dar de baja</button>
             <form method="POST" action="/prendas/{{$prenda->pk_prenda}}">
               {{ csrf_field() }}
               {{ method_field('DELETE') }}
               <input type="submit" class="btn btn-danger delete-row" value="Eliminar">
             </form>
           </div>
        @endif
      @endif

    </div>
  </div>

@endsection


{{--

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ver prenda</title>
  </head>
  <body>
    <h2>{{$prenda->pre_nombre}}</h2><br>
    <img src="{{asset('storage/'.$prenda->getFotoPrincipal()->fop_link)}}" alt="" height="512" width="512"><br>
    @if (count($prenda->fotos)>1)
        <h4>Fotos adicionales</h4><br>
        @foreach ($prenda->fotos as $foto)
          @if (!$foto['fop_principal'])
            <img src="{{asset('storage/'.$foto['fop_link'])}}" alt="" height="256" width="256">
          @endif
        @endforeach
        <br>
    @endif
    <hr>
    <h3>Descripción</h3>
    <p>{{$prenda->pre_descripcion}}</p><br>
    <h3>Categoría:</h3>
    {{$prenda->getNombreCategoria()}}
    <!-- A partir de aquí solo lo ven los empleados -->
    @if(!empty(auth(session('cargo'))->user()))
      <hr>
      @if (!$prenda->pre_visible)
        <h3>Esta prenda no es visible al público</h3>
      @endif
      <table border="2">
        <tr>
          <th>Código</th>
          <th>Cantidad disponible</th>
          <th>Precio sugerido alquiler</th>
          <th>Fecha de compra</th>
          <th>Talla</th>
          <th># veces alquilado</th>
        </tr>
        <tr>
          <td>{{$prenda->pk_prenda}}</td>
          <td>{{$prenda->pre_cantidad}}</td>
          <td>{{$prenda->pre_precio_sugerido}}</td>
          <td>{{$prenda->pre_fecha_compra}}</td>
          <td>{{$prenda->pre_talla}}</td>
          <td>{{$prenda->pre_veces_alquilado}}</td>
        </tr>
        <tr>
          <td><b>Palabras clave:</b></td>
          <td colspan="5">
            @foreach ($prenda->palabrasClave as $palabra)
              {{$palabra->pivot->pal_clave}}
            @endforeach
          </td>
        </tr>
          @if (auth(session('cargo'))->user()->emp_privilegio == 'a' ||
               auth(session('cargo'))->user()->emp_privilegio == 'g')
             <tr>
               <td colspan="2"><a href="/prendas/{{$prenda->pk_prenda}}/editar">Editar</a></td>
               <td colspan="2">Añadir más fotos</td>
               <td colspan="2">Añadir palabras clave</td>
             </tr>
          @endif
      </table>
    @endif
  </body>
</html> --}}
