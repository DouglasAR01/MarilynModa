@extends('layouts.main')
@extends('layouts.errors')

@section('stylesheets')
  <link rel="stylesheet" href="/css/db-tables.css">
@endsection

@section('content')

  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Editar empleado</div>

        <div class="card-body">
          <form class="" action="{{route('empleados.update',$empleado->pk_emp_cedula)}}" method="post">
            {{-- {{ csrf_field() }} --}}
            @csrf
            {{ method_field('PUT')}}

            <div class="form-group row">
              <label for="cedula" class="col-md-4 col-form-label text-md-right">Cédula</label>
              <div class="col-md-6">
                <input type="number" class="form-control" name="cedula" value="{{$empleado->pk_emp_cedula}}" autofocus>
              </div>
            </div>

            <div class="form-group row">
              <label for="celular" class="col-md-4 col-form-label text-md-right">Celular</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="celular" value="{{$empleado->emp_celular}}" autofocus>
              </div>
            </div>

            <div class="form-group row">
              <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="nombre" value="{{$empleado->emp_nombre}}" autofocus>
              </div>
            </div>

            <div class="form-group row">
              <label for="apellido" class="col-md-4 col-form-label text-md-right">Apellido</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="apellido" value="{{$empleado->emp_apellido}}" autofocus>
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
                <input type="text" class="form-control" name="direccion" value="{{$empleado->emp_direccion}}" autofocus>
              </div>
            </div>


            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
              <div class="col-md-6">
                <input type="text" class="form-control" name="email" value="{{$empleado->emp_email}}" autofocus>
              </div>
            </div>

            <div class="form-group row">
              <label for="clave" class="col-md-4 col-form-label text-md-right">Contraseña</label>
              <div class="col-md-6">
                <input type="password" class="form-control" name="clave" value="" autofocus>
              </div>
            </div>

            <div class="form-group row">
              <label for="clave" class="col-md-4 col-form-label text-md-right">Confirmar Contraseña</label>
              <div class="col-md-6">
                <input type="password" class="form-control" name="clave_confirmation" value="" autofocus>
              </div>
            </div>

            @if (auth()->user()->emp_privilegio==='a')
              <div class="form-group row">
                <label for="privilegio" class="col-md-4 col-form-label text-md-right">Cargo</label>
                <div class="col-md-6">
                  <select class="custom-select" name="privilegio">
                    <option value="a"
                      @if ($empleado->emp_privilegio==='a')
                      selected
                      @endif>Administrador</option>
                    <option value="g"
                      @if ($empleado->emp_privilegio==='g')
                      selected
                      @endif>Gerente</option>
                    <option value="e"
                      @if ($empleado->emp_privilegio==='e')
                      selected
                      @endif>Empleado</option>
                  </select>
                </div>
              </div>
            @else
              <input type="hidden" name="privilegio" value="{{$empleado->emp_privilegio}}">
            @endif

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                  <button type="submit" class="btn btn-mod btn-primary">Enviar</button>
                  <button class="btn btn-danger"><a href="javascript:history.back()" class="btn-link-2">Cancelar</a></button>
                </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>

@endsection
