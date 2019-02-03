<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Ver prenda</title>
  </head>
  <body>
    <h2>{{$prenda->pre_nombre}}</h2><br>
    <img src="{{asset('storage/'.$prenda->getFotoPrincipal()->fop_link)}}" alt="" height="512" width="512"><br>
    @if (count($prenda->getFotos())>1)
        <h4>Fotos adicionales</h4><br>
        @foreach ($prenda->getFotos() as $foto)
          @if (!$foto['fop_principal'])
            <img src="{{asset('storage/'.$foto['fop_link'])}}" alt="" height="256" width="256">
          @endif
        @endforeach
        <br>
    @endif
    <hr>
    <h3>Descripción</h3>
    <p>{{$prenda->pre_descripcion}}</p><br>
    <h3>Categoría:</h3>
    {{$prenda->getNombreCategoria()}}
    {{-- A partir de aquí solo lo ven los empleados --}}
    @if(!empty(auth(session('cargo'))->user()))
      <hr>
      @if (!$prenda->pre_visible)
        <h3>Esta prenda no es visible al público</h3>
      @endif
      <table border="2">
        <tr>
          <th>Código</th>
          <th>Cantidad disponible</th>
          <th>Precio sugerido alquiler</th>
          <th>Fecha de compra</th>
          <th>Talla</th>
          <th># veces alquilado</th>
        </tr>
        <tr>
          <td>{{$prenda->pk_prenda}}</td>
          <td>{{$prenda->pre_cantidad}}</td>
          <td>{{$prenda->pre_precio_sugerido}}</td>
          <td>{{$prenda->pre_fecha_compra}}</td>
          <td>{{$prenda->pre_talla}}</td>
          <td>{{$prenda->pre_veces_alquilado}}</td>
        </tr>
        <tr>
          <td><b>Palabras clave:</b></td>
          <td colspan="5">
            @foreach ($prenda->getPalabrasClave() as $palabra)
              {{$palabra}}
            @endforeach
          </td>
        </tr>
          @if (auth(session('cargo'))->user()->emp_privilegio == 'a' ||
               auth(session('cargo'))->user()->emp_privilegio == 'g')
             <tr>
               <td colspan="2"><a href="/prendas/{{$prenda->pk_prenda}}/editar">Editar</a></td>
               <td colspan="2">Añadir más fotos</td>
               <td colspan="2">Añadir palabras clave</td>
             </tr>
          @endif
      </table>
    @endif
  </body>
</html>
