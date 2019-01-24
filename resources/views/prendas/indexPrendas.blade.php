<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Vista de Prendas (Provisional)</title>
  </head>
  <body>
    {{-- Atributos
    -llave primaria -> pk_prenda
    -categoria -> pre_fk_categoria
    -visibilidad -> pre_visible ((( SE PUEDE USAR ESTE ATTRIB PARA MOSTRAR O NO UN ITEM.)))
    -nombre -> pre_nombre
    -descripción -> pre_descripcion
    -talla -> pre_talla
    -stock -> pre_cantidad
    -precio sugerido -> pre_precio_sugerido
    -fecha compra -> pre_fecha_compra
    -veces alquilado -> pre_veces_alquilado
     --}}
    <div class="">
      <table border="2">
        <tr>
          <th>Foto</th>
          <th>Categoría</th>
          <th>Nombre</th>
          <th>Descripción</th>
          <th>Talla</th>
          <th>Cantidad disponible</th>
          <th>Veces alquilado</th>
          @if (auth()->user()->emp_privilegio==='a' || auth()->user()->emp_privilegio==='g')
            <th>Opciones</th>
          @endif
        </tr>
        @foreach ($prendas as $prenda)
          <tr>
            <td><img src="{{asset('storage/'.$prenda->getFotoPrincipal())}}" alt=""></td>
            <td>{{$prenda->getNombreCategoria()}}</td>
            <td>{{$prenda->pre_nombre}}</td>
            <td>{{$prenda->pre_descripcion}}</td>
            <td>{{$prenda->pre_talla}}</td>
            <td>{{$prenda->pre_cantidad}}</td>
            <td>{{$prenda->pre_veces_alquilado}}</td>
            <td>Opiones RUD</td>
          </tr>
        @endforeach
      </table>
    </div>
  </body>
</html>
