<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Vista provisional</title>
  </head>
  <body>
    <h2>Lista de empleados en {{env('APP_NAME')}}</h2>
    <table border="1">
      <tr>
        <th>Cédula</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Celular</th>
        <th>Email</th>
        <th>Direccion</th>
        @switch($infoAdicional['priv'])
          @case(2)
            <th>Opciones</th>
          @case(1)
            <th>Cargo</th>
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
              <td>Aquí van botones RUD</td>
            @case(1)
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
              @break
          @endswitch
        </tr>
      @endforeach
    </table>
  </body>
</html>
