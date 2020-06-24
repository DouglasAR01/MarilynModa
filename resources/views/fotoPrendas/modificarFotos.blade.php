<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Formulario primitivo</title>
  </head>
  <body>
    <form id="editar" action="{{route('fotoprenda.update',$prenda->pk_prenda)}}" method="post" enctype="multipart/form-data">
      @csrf
      {{ method_field('PUT')}}
    </form>
    <table border="1">
      @for ($i=0; $i < 6; $i++)
        <tr>
        @if (!empty($prenda->fotos[$i]))
            <td>
              <img src="/storage/{{$prenda->fotos[$i]->fop_link}}" alt="" height="150" width="150"><br>
            </td>
            <td>
              <input type="file" form="editar" name="fotos[]" value="">
              <input type="hidden" form="editar" name="links[]" value="{{$prenda->fotos[$i]->fop_link}}">
            </td>
            <td>
              <input type="radio" form="editar" @if ($prenda->fotos[$i]->fop_principal)checked
              @endif name="fotoPrincipal" value="{{$prenda->fotos[$i]->fop_link}}">
            </td>
            <td>
              <form method="POST" action="{{route('fotoprenda.destroy')}}">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <input type="hidden" name="id" value="{{$prenda->fotos[$i]->fop_link}}">
                <input type="submit" class="btn btn-outline-danger" value="Eliminar">
              </form>
            </td>
        @else
            <td><img src="/images/default.png" alt="" height="150" width="150"></td>
            <td>
              <input type="file" form="editar" name="fotos[]" value="">
              <input type="hidden" form="editar" name="links[]" value="nueva">
            </td>
        @endif
        </tr>
      @endfor
    </table>
    <input type="submit" form="editar" name="" value="Guardar cambios">
  </body>
</html>
