<div class="dropdown">
  <button class="db-more dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <i class="fas fa-ellipsis-v"></i>
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="facturas/crear">Expandir</a>
    @if ((auth(session('cargo'))->user()->emp_privilegio == 'g') || (auth(session('cargo'))->user()->emp_privilegio == 'a'))
      <a class="dropdown-item" href="#">Editar</a>
      <a class="dropdown-item" href="#">Eliminar</a>
    @endif
  </div>
</div>
