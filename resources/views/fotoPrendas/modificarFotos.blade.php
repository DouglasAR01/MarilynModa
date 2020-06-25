@extends('layouts.main')
@section('stylesheets')
  <style>
    .btn-file {
      position: relative;
      overflow: hidden;
    }
  </style>
@endsection
@section('content')
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">#{{$prenda->pk_prenda}} {{$prenda->pre_nombre}}</h5>
          <p class="card-text">{{$prenda->pre_descripcion}}</p>
        </div>
        <div class="card-body">
          <form id="editar" action="{{route('fotoprenda.update',$prenda->pk_prenda)}}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT')}}
          </form>
          <table class="table">
            <thead>
              <tr>
                <th>Foto</th>
                <th>Cambiar foto</th>
                <th>Foto principal</th>
                <th>Eliminar foto</th>
              </tr>
            </thead>
            <tbody>
              @for ($i=0; $i < 6; $i++)
                <tr style="margin:1px;">
                @if (!empty($prenda->fotos[$i]))
                    <td>
                      <img src="/storage/{{$prenda->fotos[$i]->fop_link}}" alt="" height="150" width="150"><br>
                    </td>
                    <td>
                      <label class="btn btn-default btn-file btn-outline-dark feedback{{$i}}">
                        <span>Seleccionar archivo</span>
                        <input id="{{$i}}" name="fotos[]" form="editar" type="file" style="display: none;">
                      </label>
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
                      <label class="btn btn-default btn-file btn-outline-dark feedback{{$i}}">
                        <span>Seleccionar archivo</span>
                        <input id="{{$i}}" name="fotos[]" form="editar" type="file" style="display: none;">
                      </label>
                      <input type="hidden" form="editar" name="links[]" value="nueva">
                    </td>
                @endif
                </tr>
              @endfor
            </tbody>
          </table>
        </div>
        <div class="card-footer text-right">
          <a href="{{route('prendas.index')}}" class="btn btn-secondary">Volver al catálogo</a>
          <a href="{{route('prendas.show', $prenda->pk_prenda)}}" class="btn btn-info">Volver a la prenda</a>
          <input type="submit" form="editar" name="" value="Guardar cambios" class="btn btn-primary">
        </div>
      </div>
    </div>
  </div>
  <script>
  $(document).on('change', ':file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, ''),
        id = input.attr("id");
    input.trigger('fileselect', [numFiles, label, id]);
  });
  $(document).ready( function() {
    $(':file').on('fileselect', function(event, numFiles, label, id) {
        $('.feedback'+id+' span').text(label.length>30 ? label.substring(0,30)+'...' : label);
    });
  });
  </script>
@endsection
