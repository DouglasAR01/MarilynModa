<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Categorias</title>
  </head>
  <body>
    <h1>Categorias disponibles</h1>
    <hr>
    @foreach ($categorias as $categoria)
      <b>{{$categoria->cat_nombre}}</b><br>
      <a href="/categorias/{{$categoria->pk_categoria}}/editar">Editar</a>
      <form method="POST" action="/categorias/{{$categoria->pk_categoria}}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <input type="submit" value="Eliminar">
      </form>
      <hr>
    @endforeach
  </body>
</html>
