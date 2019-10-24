@extends('layouts.main')

@section('stylesheets')
  <link rel="stylesheet" href="/css/empleados.css">
@endsection


@section('content')
  <div class="row justify-content-center">
    <div class="col-md-7">
      <div class="card">
        <div class="card-header">
          <span>Creado: {{$empleados[0]->created_at}}</span><br>
          <span>Mod. última vez: {{$empleados[0]->updated_at}}</span>
        </div>
        <div class="card-body">
          <ul class="empleado-info">
            <li><b>CC:</b> {{$empleados[0]->pk_emp_cedula}}</li>
            <li><b>Celular:</b> {{$empleados[0]->emp_celular}}</li>
            <li><b>Nombre:</b> {{$empleados[0]->emp_nombre.' '.$empleados[0]->emp_apellido}}</li>
            <li>
              <b>Genero:</b>
              @switch($empleados[0]->emp_genero)
                @case('m')
                  Masculino
                  @break
                @case('f')
                  Femenino
                  @break
                @case('o')
                  Otro
                  @break
                @default
                  Otro
              @endswitch
            </li>
            <li><b>Dirección:</b> {{$empleados[0]->emp_direccion}}</li>
            <li><b>Email:</b> {{$empleados[0]->emp_email}}</li>
            <li>
              <b>Privilegio:</b>
              @switch($empleados[0]->emp_privilegio)
                @case('a')
                  Administrador
                  @break
                @case('g')
                  Gerente
                  @break
                @case('e')
                  Empleado
                  @break
                @default
                  Hacker
              @endswitch
            </li>

          </ul>

        </div>
      </div>

      @if (auth(session('cargo'))->user()->emp_privilegio == 'a' ||
           auth(session('cargo'))->user()->emp_privilegio == 'g')
        <div class="card-btns">
          <a class="btn btn-info" href="/empleados/{{$empleados[0]->pk_emp_cedula}}/editar">Editar</a>
          @if (auth(session('cargo'))->user()->emp_privilegio == 'a')
          <form method="POST" action="/empleados/{{$empleados[0]->pk_emp_cedula}}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <input type="submit" class="btn btn-danger delete-row" value="Borrar">
          </form>
          @endif
         </div>
      @endif
    </div>
  </div>

  {{-- <h2>Lista de empleados en {{env('APP_NAME')}}</h2> --}}
  {{-- <table class="db-table" border="1">
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
          <td style="text-align:center">@include('partials.elipseOptions')</td>
            @break
        @endswitch
      </tr>
    @endforeach
  </table> --}}
@endsection
