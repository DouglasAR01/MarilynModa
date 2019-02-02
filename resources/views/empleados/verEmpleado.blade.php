@extends('layouts.tabs')

@section('styles')
  <link rel="stylesheet" href="/css/db-tables.css">
@endsection

@section('db-tab')
  <h2>Lista de empleados en {{env('APP_NAME')}}</h2>
  <table class="db-table" border="1">
    <tr>
      <th>Cédula</th>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Celular</th>
      <th>Email</th>
      <th>Direccion</th>
      @switch($infoAdicional['priv'])
        @case(2)
          <th>Cargo</th>
        @case(1)
          <th>Opciones</th>
          @break
      @endswitch
    </tr>
    @foreach ($empleados as $empleado)
      <tr>
        <td>{{$empleado->pk_emp_cedula}}</td>
        <td>{{$empleado->emp_nombre}}</td>
        <td>{{$empleado->emp_apellido}}</td>
        <td>{{$empleado->emp_celular}}</td>
        <td>{{$empleado->emp_email}}</td>
        <td>{{$empleado->emp_direccion}}</td>
        @switch($infoAdicional['priv'])
          @case(2)
            <td>
              @switch($empleado->emp_privilegio)
                @case('a')
                  <b>Administrador</b>
                  @break
                @case('g')
                  <b>Gerente</b>
                  @break
                @case('e')
                  Empleado
                  @break
                @default
                  <b>Hacker</b>
              @endswitch
            </td>
          @case(1)
          <td style="text-align:center"><button class="db-more"><i class="fas fa-ellipsis-v"></i></button></td>
            @break
        @endswitch
      </tr>
    @endforeach
  </table>
@endsection
