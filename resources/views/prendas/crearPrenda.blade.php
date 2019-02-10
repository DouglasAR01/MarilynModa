@extends('layouts.main')
@extends('layouts.errors')

@section('stylesheets')
  <link rel="stylesheet" href="/css/db-tables.css">
@endsection

@section('content')
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Crear prenda</div>

        <div class="card-body">
          <form class="" action="/prendas" method="post" enctype="multipart/form-data">
            {{-- {{ csrf_field() }} --}}
            @csrf

            <div class="form-group row">
              <label for="categoria" class="col-md-4 col-form-label text-md-right">Categoría</label>
              <div class="col-md-6">
                <select class="custom-select" name="categoria">
                  @foreach ($categorias as $categoria)
                    <option value="{{$categoria->pk_categoria}}">{{$categoria->cat_nombre}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="visible" class="col-md-4 col-form-label text-md-right">Disponible al público</label>
              <div class="col-md-6">
                <input type="checkbox" class="form-check" name="visible" value="1" autofocus>
              </div>
            </div>

            <div class="form-group row">
              <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" required autofocus>
              </div>
            </div>

            <div class="form-group row">
              <label for="descripcion" class="col-md-4 col-form-label text-md-right">Descripcion</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="descripcion" value="{{ old('descripcion') }}" autofocus>
              </div>
            </div>

            <div class="form-group row">
              <label for="talla" class="col-md-4 col-form-label text-md-right">Talla</label>
              <div class="col-md-6">
                  <input type="text" class="form-control" name="talla" value="{{ old('talla') }}" required autofocus>
              </div>
            </div>


            <div class="form-group row">
              <label for="cantidad" class="col-md-4 col-form-label text-md-right">Cantidad Inicial Disponible</label>
              <div class="col-md-6">
                <input type="number" class="form-control" name="cantidad" value="{{ old('cantidad') }}" required autofocus>
              </div>
            </div>

            <div class="form-group row">
              <label for="precio" class="col-md-4 col-form-label text-md-right">Precio Sugerido</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="precio" value="{{ old('precio') }}" autofocus>
              </div>
            </div>

            <div class="form-group row">
              <label for="fecha" class="col-md-4 col-form-label text-md-right">Fecha de Compra</label>
              <div class="col-md-6">
                <input type="date" class="form-control" name="fecha" value="{{old('fecha')}}" required autofocus>
              </div>
            </div>

            <div class="form-group row">
              <label for="foto" class="col-md-4 col-form-label text-md-right">Foto Principal</label>
              <div class="col-md-6">
                <input type="file" class="form-control" name="foto" value="" required autofocus>
              </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-mod btn-primary">Enviar</button>
                    <button type="submit" class="btn btn-danger"><a href="javascript:history.back()" class="btn-link-2">Cancelar</a></button>
                </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
