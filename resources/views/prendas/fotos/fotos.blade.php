<table border="1">
  @for ($i=0; $i < 6; $i++)
    <tr>
    @if (!empty($prenda->fotos[$i]))
        <td>
          <img src="/storage/{{$prenda->fotos[$i]->fop_link}}" alt="" height="150" width="150"><br>
        </td>
        <td>
          <input type="file" name="fotos[]" value="">
          <input type="hidden" name="links[]" value="{{$prenda->fotos[$i]->fop_link}}">
        </td>
        <td>
          <input type="radio" @if ($prenda->fotos[$i]->fop_principal)checked
          @endif name="fotoPrincipal" value="{{$prenda->fotos[$i]->fop_link}}">
        </td>
        {{-- @if (!$prenda->fotos[$i]->fop_principal)
          <td>
            <form action="/prendas/eliminarFoto" method="post">
              @csrf
              <input type="hidden" name="vic" value="{{$prenda->fotos[$i]->fop_link}}">
              <button type="" class="btn btn-outline-danger"><i class="fas fa-trash-alt" style="color:#c62828"></i></button>
            </form>
          </td>
        @endif --}}
    @else
        <td><img src="/images/default.png" alt="" height="150" width="150"></td>
        <td>
          <input type="file" name="fotos[]" value="">
          <input type="hidden" name="links[]" value="nueva">
        </td>
    @endif
    </tr>
  @endfor
</table>
