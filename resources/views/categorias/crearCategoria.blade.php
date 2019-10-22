<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Crear Categoria</title>
  </head>
  <body>
    <h1>Crear categoria</h1>
    <hr>
    <form class="" action="/categorias" method="post">
      @csrf
      <label for="">Nombre de la categoria</label>
      <input type="text" name="nombre" value=""><br>
      <label for="">Descripcion</label>
      <input type="textarea" name="descripcion" value=""><br>
      <label for="">Tipo</label>
      <select class="" name="tipo">
        <option value="a">Alquiler</option>
        <option value="b">Baja</option>
        <option value="g">Gasto</option>
        <option value="o">Otro</option>
      </select><br>
      <input type="submit" name="" value="Enviar">
    </form>
  </body>
</html>
