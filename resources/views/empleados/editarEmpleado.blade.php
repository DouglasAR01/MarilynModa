<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Vista provisional</title>
  </head>
  <body>
    <h2>Crear empleados</h2>
    <form class="" action="{{route('empleados.update',$empleado->pk_emp_cedula)}}" method="post">
      {{ csrf_field() }}
      {{ method_field('PUT')}}
      <label for="cedula">Cédula del empleado</label><br>
      <input type="text" name="cedula" value="{{$empleado->pk_emp_cedula}}"><br>
      <label for="celular">Celular del empleado</label><br>
      <input type="text" name="celular" value="{{$empleado->emp_celular}}"><br>
      <label for="email">Email del empleado</label><br>
      <input type="text" name="email" value="{{$empleado->emp_email}}"><br>
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
      <input type="text" name="direccion" value="{{$empleado->emp_direccion}}"><br>
      <label for="nombre">Nombre del empleado</label><br>
      <input type="text" name="nombre" value="{{$empleado->emp_nombre}}"><br>
      <label for="apellido">Apellido del empleado</label><br>
      <input type="text" name="apellido" value="{{$empleado->emp_apellido}}"><br>
      @if ($empleado->emp_privilegio==='a')
        <label for="privilegio">Cargo</label><br>
        <select class="" name="privilegio">
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
        </select><br>
      @else
        <input type="hidden" name="privilegio" value="{{$empleado->emp_privilegio}}">  
      @endif
      <input type="submit" name="" value="Enviar">
    </form>
  </body>
</html>
