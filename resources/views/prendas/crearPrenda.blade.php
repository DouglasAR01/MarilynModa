@extends('layouts.main')

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
              <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>
              <div class="col-md-6">
                <input type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{ old('nombre') }}" required autofocus>
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
                <input type="text" class="form-control{{ $errors->has('descripcion') ? ' is-invalid' : '' }}" name="descripcion" value="{{ old('descripcion') }}" autofocus requiered>
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
                <select class="custom-select" name="talla" selected="{{old('talla')}}" required>
                  <option value="XS">XS</option>
                  <option value="S">S</option>
                  <option value="M">M</option>
                  <option value="L">L</option>
                  <option value="XL">XL</option>
                  <option value="XXL">XXL</option>
                </select>
              </div>
            </div>

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
              <label for="cantidad" class="col-md-4 col-form-label text-md-right">Cantidad Inicial Disponible</label>
              <div class="col-md-6">
                <input type="number" class="form-control{{ $errors->has('cantidad') ? ' is-invalid' : '' }}" name="cantidad" value="1" min="0" required autofocus>
                @if ($errors->has('cantidad'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('cantidad') }}</strong>
                    </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="precio" class="col-md-4 col-form-label text-md-right">Precio Sugerido</label>
              <div class="col-md-6">
                <input type="number" class="form-control{{ $errors->has('precio') ? ' is-invalid' : '' }}" name="precio" value="{{ old('precio') }}" min="0" autofocus required>
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
                <input type="date" class="form-control{{ $errors->has('fecha') ? ' is-invalid' : '' }}" name="fecha" value="{{old('fecha')}}" required autofocus>
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
                <input type="checkbox" class="form-check" name="visible"  value="" autofocus>
              </div>
            </div>

            <div class="form-group row">
              <label for="foto" class="col-md-4 col-form-label text-md-right">Foto Principal</label>
              <div class="col-md-6">
                <input type="file" class="form-control{{ $errors->has('foto') ? ' is-invalid' : '' }}" name="foto" value="" required autofocus>
                @if ($errors->has('foto'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('foto') }}</strong>
                    </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="visible" class="col-md-4 col-form-label text-md-right">Palabras clave, separadas por ";"</label>
              <div class="col-md-6">
                <textarea name="palabrasclave" rows="2" class="form-control {{ $errors->has('palabrasclave') ? ' is-invalid' : '' }}">{{ $errors->has('palabrasclave') ? old('palabrasclave'): 'fiesta;noche' }}</textarea>
                @if ($errors->has('palabrasclave'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('palabrasclave') }}</strong>
                    </span>
                @endif
              </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-mod btn-primary">Enviar</button>
                    <button type="button" class="btn btn-danger"><a href="javascript:history.back()" class="btn-link-2">Cancelar</a></button>
                </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
