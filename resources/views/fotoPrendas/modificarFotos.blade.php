<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Formulario primitivo</title>
  </head>
  <body>
    <form id="editar" action="{{route('fotosprenda.update',$prenda->pk_prenda)}}" method="post" enctype="multipart/form-data">
      @csrf
      {{ method_field('PUT')}}
    </form>
    <form id="eliminar" action="{{route('fotosprenda.destroy', $prenda->pk_prenda)}}" method = "post">
        @csrf
        @method("DELETE")
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
            @if (!$prenda->fotos[$i]->fop_principal)
              <td>
                <button type="submit" form="eliminar" class="btn btn-outline-danger"><i class="fas fa-trash-alt" style="color:#c62828"></i></button>
              </td>
            @endif
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
