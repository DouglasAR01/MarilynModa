<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Vista de edición povisional</title>
  </head>
  <body>
  <h1>Editar prenda {{$prenda->pk_prenda}}</h1>
  <div class="">
    <form class="" action="{{route('prendas.update',$prenda->pk_prenda)}}" method="post">
      {{ csrf_field() }}
      {{ method_field('PUT')}}
      <label for="nombre">Nombre de la prenda</label><br>
      <input type="text" name="nombre" value="{{$prenda->pre_nombre}}"><br>
      <label for="descripcion">Descripción de la prenda</label><br>
      <input type="text" name="descripcion" value="{{$prenda->pre_descripcion}}"><br>
      <label for="cantidad">Cantidad inicial disponible</label><br>
      <input type="number" name="cantidad" value="{{$prenda->pre_cantidad}}"><br>
      <label for="precio">Precio sugerido de alquilado</label><br>
      <input type="text" name="precio" value="{{$prenda->pre_cantidad}}"><br>
      <label for="fecha">Fecha estimada de compra</label><br>
      <input type="date" name="fecha" value="{{$prenda->pre_fecha_compra}}"><br>
      <label for="talla">Talla de la prenda</label><br>
      <input type="text" name="talla" value="{{$prenda->pre_talla}}"><br>
      <label for="categoria">Categoría</label><br>
      <select class="" value="{{$prenda->pre_fk_categoria}}" name="categoria">
        @foreach ($categorias as $categoria)
          <option value="{{$categoria->pk_categoria}}">{{$categoria->cat_nombre}}</option>
        @endforeach
      </select><br>
      <label for="visible">La prenda será visible al público</label><br>
      <input type="checkbox" name="visible" value="{{$prenda->pre_visible}}"><br>
      <label for="foto">Foto principal</label><br>
      <input type="file" name="foto" value=""><br>
      <input type="submit" name="" value="Enviar">
    </form>

  </div>
  @extends('layouts.errors')
  </body>
</html>
