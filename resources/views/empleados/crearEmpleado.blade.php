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
                <input type="password" class="form-control" name="clave" value="" required autofocus>
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


{{-- <!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Vista provisional</title>
  </head>
  <body>
    <h2>Crear empleados</h2>
    <form class="" action="/empleados" method="post">
      {{ csrf_field() }}
      <label for="cedula">Cédula del empleado</label><br>
      <input type="number" name="cedula" value="{{old('cedula')}}"><br>
      <label for="celular">Celular del empleado</label><br>
      <input type="text" name="celular" value="{{old('celular')}}"><br>
      <label for="email">Email del empleado</label><br>
      <input type="text" name="email" value="{{old('email')}}"><br>
      <label for="clave">Contraseña del empleado</label><br>
      <input type="password" name="clave" value=""><br>
      <label for="clave">Confirmar contraseña</label><br>
      <input type="password" name="clave_confirmation" value=""><br>
      <label for="genero">Genero del empleado</label><br>
      <select class="" name="genero">
        <option value="m">Masculino</option>
        <option value="f">Femenino</option>
        <option value="o">Otro</option>
      </select><br>
      <label for="direccion">Dirección del empleado</label><br>
      <input type="text" name="direccion" value="{{old('direccion')}}"><br>
      <label for="nombre">Nombre del empleado</label><br>
      <input type="text" name="nombre" value="{{old('nombre')}}"><br>
      <label for="apellido">Apellido del empleado</label><br>
      <input type="text" name="apellido" value="{{old('apellido')}}"><br>
      <label for="privilegio">Cargo</label><br>
      <select class="" name="privilegio">
        <option value="a">Administrador</option>
        <option value="g">Gerente</option>
        <option value="e" selected>Empleado</option>
      </select><br>
      <input type="submit" name="" value="Enviar">
    </form>
  </body>
</html> --}}
