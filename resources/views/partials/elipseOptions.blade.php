<div class="dropdown">
  <button class="db-more dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-ellipsis-v"></i>
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

    @switch($currentRouteName)
      {{-- @case('facturas.index')
        @break

      @case('gastos.index')
        @break

      @case('clientes.index')
       @break --}}
      @case('prendas.index')
        <a class="dropdown-item elipse-op" href="/prendas/{{$prenda->pk_prenda}}">Expandir</a>
        @if (auth(session('cargo'))->user()->emp_privilegio == 'a'||
            auth(session('cargo'))->user()->emp_privilegio == 'g')
          <a class="dropdown-item elipse-op" href="/prendas/{{$prenda->pk_prenda}}/editar">Editar</a>
          <a class="dropdown-item elipse-op" href="/prendas/{{$prenda->pk_prenda}}/fotos">Cambiar fotos</a>
        @endif
        @if (auth(session('cargo'))->user()->emp_privilegio == 'a')
          <form method="POST" action="/prendas/{{$prenda->pk_prenda}}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <input type="submit" class="dropdown-item delete-row" value="Eliminar">
          </form>
        @endif
        @break

      @case('empleados.index')
        <a class="dropdown-item elipse-op" href="/empleados/{{$empleado->pk_emp_cedula}}">Expandir</a>
        @if (auth(session('cargo'))->user()->emp_privilegio == 'a' ||
            auth(session('cargo'))->user()->emp_privilegio == 'g')
          <a class="dropdown-item elipse-op" href="/empleados/{{$empleado->pk_emp_cedula}}/editar">Editar</a>
          @if (auth(session('cargo'))->user()->emp_privilegio == 'a')
            <form method="POST" action="/empleados/{{$empleado->pk_emp_cedula}}">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}
              <input type="submit" class="dropdown-item delete-row" value="Eliminar">
            </form>
          @endif
        @endif
        @break

    @endswitch
  </div>
</div>
