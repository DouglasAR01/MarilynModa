<div class="funciones-container">
	<span id="x-icon"><i class="fas fa-times fa-lg"></i></span>
	<a href="{{ url('/') }}" class="navbar-brand">Marilyn<span>Moda</span></a>
	<div class="dropdown func-drop">
		<button class="btn dropdown-toggle nueva-funcion" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Nuevo</button>

	  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
	    <a class="dropdown-item" href="facturas/crear">Factura</a>
	    <a class="dropdown-item" href="gastos/crear">Gasto</a>
			@if ((auth(session('cargo'))->user()->emp_privilegio == 'g') || (auth(session('cargo'))->user()->emp_privilegio == 'a'))
				<a class="dropdown-item" href="prendas/crear">Prenda</a>
				<a class="dropdown-item" href="empleados/crear">Empleado</a>
			@endif
	  </div>
	</div>
	<div class="funciones">
		<a href="facturas" class="funcion">Facturas</a>
		<a href="gastos" class="funcion">Gastos</a>
		<a href="clientes" class="funcion">Clientes</a>
		<a href="prendas" class="funcion">Prendas</a>
		@if ((auth(session('cargo'))->user()->emp_privilegio == 'g') || (auth(session('cargo'))->user()->emp_privilegio == 'a'))
			<a href="empleados" class="funcion">Empleados</a>
		@endif
	</div>
</div>
