<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Editar categoria</h1>
    <hr>
    <form class="" action="{{route('categorias.update',$categoria->pk_categoria)}}" method="post">
      @csrf
      {{ method_field('PUT')}}
      <label for="">Nombre de la categoria</label>
      <input type="text" name="nombre" value="{{$categoria->cat_nombre}}"><br>
      <label for="">Descripcion</label>
      <input type="textarea" name="descripcion" value="{{$categoria->cat_descripcion}}"><br>
      <label for="">Tipo</label>
      <select class="" name="tipo" value="{{$categoria->cat_tipo}}">
        <option value="a">Alquiler</option>
        <option value="b">Baja</option>
        <option value="g">Gasto</option>
        <option value="o">Otro</option>
      </select><br>
      <input type="submit" name="" value="Enviar">
    </form>
  </body>
</html>
