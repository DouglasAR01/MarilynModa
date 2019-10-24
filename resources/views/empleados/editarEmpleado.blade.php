@extends('layouts.main')

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
                <input type="number" class="form-control{{ $errors->has('cedula') ? ' is-invalid' : '' }}" name="cedula" value="{{$empleado->pk_emp_cedula}}" autofocus>
                @if ($errors->has('cedula'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('cedula') }}</strong>
                    </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="celular" class="col-md-4 col-form-label text-md-right">Celular</label>
              <div class="col-md-6">
                <input type="text" class="form-control{{ $errors->has('celular') ? ' is-invalid' : '' }}" name="celular" value="{{$empleado->emp_celular}}" autofocus>
                @if ($errors->has('celular'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('celular') }}</strong>
                    </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>
              <div class="col-md-6">
                <input type="text" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" name="nombre" value="{{$empleado->emp_nombre}}" autofocus>
                @if ($errors->has('nombre'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('nombre') }}</strong>
                    </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="apellido" class="col-md-4 col-form-label text-md-right">Apellido</label>
              <div class="col-md-6">
                <input type="text" class="form-control{{ $errors->has('apellido') ? ' is-invalid' : '' }}" name="apellido" value="{{$empleado->emp_apellido}}" autofocus>
                @if ($errors->has('apellido'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('apellido') }}</strong>
                    </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="genero" class="col-md-4 col-form-label text-md-right">Género</label>
              <div class="col-md-6">
                <select class="custom-select" name="genero" selected="{{$empleado->emp_genero}}">
                  <option value="m">Masculino</option>
                  <option value="f">Femenino</option>
                  <option value="o">Otro</option>
                </select>
              </div>
            </div>

            <div class="form-group row">
              <label for="direccion" class="col-md-4 col-form-label text-md-right">Dirección</label>
              <div class="col-md-6">
                <input type="text" class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }}" name="direccion" value="{{$empleado->emp_direccion}}" autofocus>
                @if ($errors->has('direccion'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('direccion') }}</strong>
                    </span>
                @endif
              </div>
            </div>


            <div class="form-group row">
              <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
              <div class="col-md-6">
                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{$empleado->emp_email}}" autofocus>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="clave" class="col-md-4 col-form-label text-md-right">Contraseña</label>
              <div class="col-md-6">
                <input type="password" class="form-control{{ $errors->has('clave') ? ' is-invalid' : '' }}" name="clave" value="" autofocus required>
                @if ($errors->has('clave'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('clave') }}</strong>
                    </span>
                @endif
              </div>
            </div>

            <div class="form-group row">
              <label for="clave" class="col-md-4 col-form-label text-md-right">Confirmar Contraseña</label>
              <div class="col-md-6">
                <input type="password" class="form-control{{ $errors->has('clave_confirmation') ? ' is-invalid' : '' }}" name="clave_confirmation" value="" autofocus required>
                @if ($errors->has('clave_confirmation'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('clave_confirmation') }}</strong>
                    </span>
                @endif
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
                  <button type="button" class="btn btn-danger"><a href="javascript:history.back()" class="btn-link-2">Cancelar</a></button>
                </div>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>

@endsection
