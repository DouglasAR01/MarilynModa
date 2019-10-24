<table border="0">
  @for ($i=0; $i < 6; $i++)
    <tr style="margin:1px;">
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



{{--
@for ($i=0; $i < 6; $i++)
  @if (!empty($prenda->fotos[$i]))
      <div class="miniature">
        <img class="min__img" src="/storage/{{$prenda->fotos[$i]->fop_link}}" alt="">
        <div class="foto-select">
          <input type="file" name="fotos[]" value="">
          <input type="hidden" name="links[]" value="{{$prenda->fotos[$i]->fop_link}}">
        </div>

        <input class="rad-principal" type="radio" @if ($prenda->fotos[$i]->fop_principal)checked
        @endif name="fotoPrincipal" value="{{$prenda->fotos[$i]->fop_link}}">
      </div>

  @else

      <div class="empty-miniature">
        <img class="min__img" src="/images/default.PNG" alt="">
        <div class="foto-select">
          <input type="file" name="fotos[]" value="">
          <input type="hidden" name="links[]" value="nueva">
        </div>
    </div>


  @endif
  </tr>
@endfor --}}

{{-- df =np.asarray([ filters(d[i].reshape(28,28)).reshape(784) for i in range(d.shape[0])]) --}}
