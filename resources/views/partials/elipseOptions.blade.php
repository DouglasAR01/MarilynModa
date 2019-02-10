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
        <a class="dropdown-item" href="/prendas/{{$prenda->pk_prenda}}">Expandir</a>
        @if (auth(session('cargo'))->user()->emp_privilegio == 'a')
          <a class="dropdown-item" href="/prendas/{{$prenda->pk_prenda}}/editar">Editar</a>
          <a class="dropdown-item" href="#">Eliminar</a>
        @endif
        @break

      @case('empleados.index')
        <a class="dropdown-item" href="/empleados/{{$empleado->pk_emp_cedula}}">Expandir</a>
        @if (auth(session('cargo'))->user()->emp_privilegio == 'a')
          <a class="dropdown-item" href="/empleados/{{$empleado->pk_emp_cedula}}/editar">Editar</a>
          <a class="dropdown-item" href="#">Eliminar</a>
        @endif
        @break

    @endswitch
  </div>
</div>
