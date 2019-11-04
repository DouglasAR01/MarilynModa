@extends('layouts.main')

@section('stylesheets')
<style>
  .empty-fotos{
    width: 100%;
    /* background-color: rgba(231, 192, 81, 0.52); */
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
  }
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
                <input type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{$prenda->pre_nombre}}" required autofocus>
                @if ($errors->has('nombre'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('nombre') }}</strong>
                    </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripcion</label>
              <div class="col-md-6">
                <input type="text" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" name="descripcion" value="{{$prenda->pre_descripcion}}" autofocus>
                @if ($errors->has('descripcion'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('descripcion') }}</strong>
                    </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="talla" class="col-md-4 col-form-label text-md-right">Talla</label>
              <div class="col-md-6">
                <select class="custom-select" name="talla" required>
                  <option value="XS" {{ $prenda->pre_talla=='XS' ? 'selected': '' }}>XS</option>
                  <option value="S" {{ $prenda->pre_talla=='S' ? 'selected': '' }}>S</option>
                  <option value="M" {{ $prenda->pre_talla=='M' ? 'selected': '' }}>M</option>
                  <option value="L" {{ $prenda->pre_talla=='L' ? 'selected': '' }}>L</option>
                  <option value="XL" {{ $prenda->pre_talla=='XL' ? 'selected': '' }}>XL</option>
                  <option value="XXL" {{ $prenda->pre_talla=='XXL' ? 'selected': '' }}>XXL</option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="categoria" class="col-md-4 col-form-label text-md-right">Categoría</label>
              <div class="col-md-6">
                <select class="custom-select" value="{{$prenda->pre_fk_categoria}}" name="categoria">
                  @foreach ($categorias as $categoria)
                    <option value="{{$categoria->pk_categoria}}" {{ $prenda->pre_fk_categoria==$categoria->pk_categoria ? 'selected': '' }}>{{$categoria->cat_nombre}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="cantidad" class="col-md-4 col-form-label text-md-right">Cantidad Inicial Disponible</label>
              <div class="col-md-6">
                <input type="number" class="form-control{{ $errors->has('cantidad') ? ' is-invalid' : '' }}" name="cantidad" value="{{$prenda->pre_cantidad}}" required autofocus>
                @if ($errors->has('cantidad'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('cantidad') }}</strong>
                    </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="precio" class="col-md-4 col-form-label text-md-right">Precio de alquiler sugerido</label>
              <div class="col-md-6">
                <input type="text" class="form-control{{ $errors->has('precio') ? ' is-invalid' : '' }}" name="precio" value="{{$prenda->pre_precio_sugerido}}" autofocus required>
                @if ($errors->has('precio'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('precio') }}</strong>
                    </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="fecha" class="col-md-4 col-form-label text-md-right">Fecha de Compra</label>
              <div class="col-md-6">
                <input type="date" class="form-control{{ $errors->has('fecha') ? ' is-invalid' : '' }}" name="fecha" value="{{$prenda->pre_fecha_compra}}" required autofocus>
                @if ($errors->has('fecha'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('fecha') }}</strong>
                    </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="visible" class="col-md-4 col-form-label text-md-right">Disponible al público</label>
              <div class="col-md-6">
                <input type="checkbox" class="form-check" name="visible" @if ($prenda->pre_visible) checked @endif autofocus>
              </div>
            </div>

            <div class="form-group row">
              <label for="foto" class="col-md-3 col-form-label text-md-right">Fotos</label>
              <div class="col-md-7 empty-fotos">
                @include('prendas.fotos.fotos')
              </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-mod btn-primary">Enviar</button>
                    <a href="/prendas" class="btn-link-2"><button type="button" class="btn btn-danger">Cancelar</button></a>
                </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
