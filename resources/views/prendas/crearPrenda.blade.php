<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Vista provisional</title>
  </head>
  <body>
    <form class="" action="/prendas" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      <label for="nombre">Nombre de la prenda</label><br>
      <input type="text" name="nombre" value="{{old('nombre')}}"><br>
      <label for="descripcion">Descripción de la prenda</label><br>
      <input type="text" name="descripcion" value="{{old('descripcion')}}"><br>
      <label for="cantidad">Cantidad inicial disponible</label><br>
      <input type="number" name="cantidad" value="{{old('cantidad')}}"><br>
      <label for="precio">Precio sugerido de alquilado</label><br>
      <input type="text" name="precio" value="{{old('precio')}}"><br>
      <label for="fecha">Fecha estimada de compra</label><br>
      <input type="date" name="fecha" value="{{old('fecha')}}"><br>
      <label for="talla">Talla de la prenda</label><br>
      <input type="text" name="talla" value=""><br>
      <label for="categoria">Categoría</label><br>
      <select class="" name="categoria">
        @foreach ($categorias as $categoria)
          <option value="{{$categoria->pk_categoria}}">{{$categoria->cat_nombre}}</option>
        @endforeach
      </select><br>
      <label for="visible">La prenda será visible al público</label><br>
      <input type="checkbox" name="visible" value="1"><br>
      <label for="foto">Foto principal</label><br>
      <input type="file" name="foto" value=""><br>
      <input type="submit" name="" value="Enviar">
    </form>
  </body>
</html>
