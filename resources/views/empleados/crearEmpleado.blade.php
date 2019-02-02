@extends('layouts.main')

@section('stylesheets')
  <link rel="stylesheet" href="/css/db-tables.css">
@endsection

@section('content')
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
@endsection
