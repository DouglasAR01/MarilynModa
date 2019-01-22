<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Vista provisional</title>
  </head>
  <body>
    <h2>Crear empleados</h2>
    <form class="" action="/empleados" method="post">
      {{ csrf_field() }}
      <label for="cedula">Cédula del empleado</label><br>
      <input type="text" name="cedula" value=""><br>
      <label for="celular">Celular del empleado</label><br>
      <input type="text" name="celular" value=""><br>
      <label for="email">Email del empleado</label><br>
      <input type="text" name="email" value=""><br>
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
      <input type="text" name="direccion" value=""><br>
      <label for="nombre">Nombre del empleado</label><br>
      <input type="text" name="nombre" value=""><br>
      <label for="apellido">Apellido del empleado</label><br>
      <input type="text" name="apellido" value=""><br>
      <label for="privilegio">Cargo</label><br>
      <select class="" name="privilegio">
        <option value="a">Administrador</option>
        <option value="g">Gerente</option>
        <option value="e">Empleado</option>
      </select><br>
      <input type="submit" name="" value="Enviar">
    </form>
  </body>
</html>
