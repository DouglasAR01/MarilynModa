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
          <th>id</th>
          <th>categoria</th>
          <th>nombre</th>
          <th>descripción</th>
          <th>talla</th>
          <th>cantidad disp</th>
          <th>Precio unidad</th>
          <th>Adquirido (fecha) </th>
          <th>Veces Alquilado</th>

        </tr>
      </table>
    </div>
  </body>
</html>
