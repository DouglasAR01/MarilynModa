@extends('layouts.main')
@extends('layouts.errors')

@section('stylesheets')
<style>
  .empty-fotos{
    width: 100%;
    /* background-color: rgba(231, 192, 81, 0.52); */
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
  }

  .miniature, .empty-miniature{
    display: block;
    height: 150px;
    width: 150px;
    margin: 5px;
    overflow-x: hidden;
    overflow-y: hidden;
    position: relative;
  }

  .empty-miniature{
    /* background-color: rgba(4, 128, 142, 0.41); */
    border: 3px dashed #777;
  }

  .min__img{
    min-width: 150px;
    width: 150px;
    height: 300px;
  }

  .min__text{
    position: absolute;
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    font-size: 1.2rem;
  }
  .min__text p{
    margin: 0;
  }

  #bootstrap-overrides input[type="file" i]{

    cursor: pointer !important;
    -webkit-cursor: pointer !important;
    align-self: stretch;
    display: block;
    /* -webkit-writing-mode: horizontal-tb !important; */
    position: absolute;
    line-height: 150px;
    max-width: 150px;
    height: 100%;
    opacity: 0;
    z-index: 105;
  }

  #bootstrap-overrides input[type="button" i], input[type="file" i]::-webkit-file-upload-button, button { cursor: pointer !important;}

</style>
@endsection

@section('content')
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Editar prenda {{$prenda->pk_prenda}}</div>

        <div class="card-body">
          <form class="" action="{{route('prendas.update',$prenda->pk_prenda)}}" method="post" enctype="multipart/form-data">
            {{-- {{ csrf_field() }} --}}
            @csrf
            {{ method_field('PUT')}}

            <div class="form-group row">
              <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="nombre" value="{{$prenda->pre_nombre}}" required autofocus>
              </div>
            </div>

            <div class="form-group row">
              <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripcion</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="descripcion" value="{{$prenda->pre_descripcion}}" autofocus>
              </div>
            </div>

            <div class="form-group row">
              <label for="talla" class="col-md-4 col-form-label text-md-right">Talla</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="talla" value="{{$prenda->pre_talla}}" required autofocus>
              </div>
            </div>

            <div class="form-group row">
              <label for="categoria" class="col-md-4 col-form-label text-md-right">Categoría</label>
              <div class="col-md-6">
                <select class="custom-select" value="{{$prenda->pre_fk_categoria}}" name="categoria">
                  @foreach ($categorias as $categoria)
                    <option value="{{$categoria->pk_categoria}}" selected>{{$categoria->cat_nombre}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="cantidad" class="col-md-4 col-form-label text-md-right">Cantidad Inicial Disponible</label>
              <div class="col-md-6">
                <input type="number" class="form-control" name="cantidad" value="{{$prenda->pre_cantidad}}" required autofocus>
              </div>
            </div>

            <div class="form-group row">
              <label for="precio" class="col-md-4 col-form-label text-md-right">Precio Sugerido</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="precio" value="{{$prenda->pre_precio}}" autofocus>
              </div>
            </div>

            <div class="form-group row">
              <label for="fecha" class="col-md-4 col-form-label text-md-right">Fecha de Compra</label>
              <div class="col-md-6">
                <input type="date" class="form-control" name="fecha" value="{{$prenda->pre_fecha_compra}}" required autofocus>
              </div>
            </div>

            <div class="form-group row">
              <label for="visible" class="col-md-4 col-form-label text-md-right">Disponible al público</label>
              <div class="col-md-6">
                <input type="checkbox" class="form-check" name="visible" value="{{$prenda->pre_visible}}" autofocus>
              </div>
            </div>

            <div class="form-group row">
              <label for="foto" class="col-md-3 col-form-label text-md-right">Fotos</label>
              <div class="col-md-8 empty-fotos">
                @if(count($prenda->fotos) < 6)
                  @foreach ($prenda->fotos as $foto)
                    <div class="miniature">
                      <img class="min__img" src="/storage/{{$foto->fop_link}}">
                    </div>
                  @endforeach
                  @for ($i=count($prenda->fotos); $i < 6; $i++)
                    <div class="empty-miniature">
                      <div class="min__text">
                        <p><i class="fas fa-plus fa-lg"></i></p>
                        <p>Añadir Foto</p>
                      </div>


                      <input type="file" class="cm-file-input" name="fotos[]">
                      <input type="hidden" name="links[]" value="{{$foto->fop_link}}">
                    </div>
                  @endfor
                @endif
              </div>
            </div>

            {{-- <div class="form-group row">
              <label for="foto" class="col-md-4 col-form-label text-md-right">Fotos</label>
              <div class="col-md-6 empty-fotos">
                <table border="1">
                  @foreach ($prenda->fotos as $foto)
                    <tr>
                      <td>
                        <img src="/storage/{{$foto->fop_link}}" alt="" height="200" width="200"><br>
                      </td>
                      <td>
                        <input type="file" name="fotos[]"> </input>
                        <input type="hidden" name="links[]" value="{{$foto->fop_link}}">
                      </td>
                      <td>
                        <input type="radio" @if ($foto->fop_principal) checked
                        @endif name="fotoPrincipal" value="{{$foto->fop_link}}">
                      </td>
                    </tr>
                  @endforeach
                </table>
              </div>
            </div> --}}

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-mod btn-primary">Enviar</button>
                    <a href="javascript:history.back()" class="btn-link-2"><button class="btn btn-danger">Cancelar</button></a>
                </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
{{-- <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Vista de edición povisional</title>
  </head>
  <body>
  <h1>Editar prenda {{$prenda->pk_prenda}}</h1>
  <div class="">
    <form class="" action="{{route('prendas.update',$prenda->pk_prenda)}}" enctype="multipart/form-data" method="post">
      {{ csrf_field() }}
      {{ method_field('PUT')}}
      <label for="nombre">Nombre de la prenda</label><br>
      <input type="text" name="nombre" value="{{$prenda->pre_nombre}}"><br>
      <label for="descripcion">Descripción de la prenda</label><br>
      <input type="text" name="descripcion" value="{{$prenda->pre_descripcion}}"><br>
      <label for="cantidad">Cantidad inicial disponible</label><br>
      <input type="number" name="cantidad" value="{{$prenda->pre_cantidad}}"><br>
      <label for="precio">Precio sugerido de alquilado</label><br>
      <input type="text" name="precio" value="{{$prenda->pre_cantidad}}"><br>
      <label for="fecha">Fecha estimada de compra</label><br>
      <input type="date" name="fecha" value="{{$prenda->pre_fecha_compra}}"><br>
      <label for="talla">Talla de la prenda</label><br>
      <input type="text" name="talla" value="{{$prenda->pre_talla}}"><br>
      <label for="categoria">Categoría</label><br>
      <select class="" value="{{$prenda->pre_fk_categoria}}" name="categoria">
        @foreach ($categorias as $categoria)
          <option value="{{$categoria->pk_categoria}}">{{$categoria->cat_nombre}}</option>
        @endforeach
      </select><br>
      <label for="visible">La prenda será visible al público</label><br>
      <input type="checkbox" name="visible" value="{{$prenda->pre_visible}}"><br>
      <label for="foto">Fotos</label><br>
      <table border="1">
          @foreach ($prenda->fotos as $foto)
            <tr>
              <td>
                <img src="/storage/{{$foto->fop_link}}" alt="" height="200" width="200"><br>
              </td>
              <td>
                <input type="file" name="fotos[]"> </input>
                <input type="hidden" name="links[]" value="{{$foto->fop_link}}">
              </td>
              <td>
                <input type="radio" @if ($foto->fop_principal)                 checked
                @endif name="fotoPrincipal" value="{{$foto->fop_link}}">
              </td>
            </tr>
          @endforeach
      </table>
      <input type="submit" name="" value="Enviar">
    </form>
  </div>
  @extends('layouts.errors')
  </body>
</html> --}}
