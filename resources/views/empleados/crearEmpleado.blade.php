@extends('layouts.main')

@section('stylesheets')
  <link rel="stylesheet" href="/css/db-tables.css">
@endsection

@section('content')
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Crear empleado</div>

        <div class="card-body">
          <form class="" action="/empleados" method="post">
            {{-- {{ csrf_field() }} --}}
            @csrf

            <div class="form-group row">
              <label for="cedula" class="col-md-4 col-form-label text-md-right">Cédula</label>
              <div class="col-md-6">
                <input type="number" class="form-control" name="cedula" value="{{ old('cedula') }}" required autofocus>
              </div>
            </div>

            <div class="form-group row">
              <label for="celular" class="col-md-4 col-form-label text-md-right">Celular</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="celular" value="{{ old('celular') }}" required autofocus>
              </div>
            </div>

            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
              </div>
            </div>

            <div class="form-group row">
              <label for="clave" class="col-md-4 col-form-label text-md-right">Contraseña</label>
              <div class="col-md-6">
                <input type="password" class="form-control" name="clave" value="{{ old('clave') }}" required autofocus>
              </div>
            </div>

            <div class="form-group row">
              <label for="clave" class="col-md-4 col-form-label text-md-right">Confirmar Contraseña</label>
              <div class="col-md-6">
                <input type="password" class="form-control" name="clave_confirmation" value="" required autofocus>
              </div>
            </div>

            <div class="form-group row">
              <label for="genero" class="col-md-4 col-form-label text-md-right">Género</label>
              <div class="col-md-6">
                <select class="custom-select" name="genero">
                  <option value="m">Masculino</option>
                  <option value="f">Femenino</option>
                  <option value="o" selected>Otro</option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="direccion" class="col-md-4 col-form-label text-md-right">Dirección</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="direccion" value="{{ old('direccion') }}" required autofocus>
              </div>
            </div>

            <div class="form-group row">
              <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" required autofocus>
              </div>
            </div>

            <div class="form-group row">
              <label for="apellido" class="col-md-4 col-form-label text-md-right">Apellido</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="apellido" value="{{ old('apellido') }}" required autofocus>
              </div>
            </div>

            <div class="form-group row">
              <label for="privilegio" class="col-md-4 col-form-label text-md-right">Cargo</label>
              <div class="col-md-6">
                <select class="custom-select" name="privilegio">
                  <option value="a">Administrador</option>
                  <option value="g">Gerente</option>
                  <option value="e" selected>Empleado</option>
                </select>
              </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
