<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>{{$categoria->cat_nombre}}</title>
  </head>
  <body>
    <h1>{{$categoria->cat_nombre}}</h1>
    <b>Descripción:</b><br>
    <p>{{$categoria->cat_descripcion}}</p><br>
    <b>Tipo:</b><p>{{$categoria->cat_tipo}}</p>
  </body>
</html>
