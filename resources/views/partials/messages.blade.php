@if (Session::has('success'))
  <div class=" saveAlert alert alert-success" role="alert">
    <strong>Perfecto:</strong> {{Session::get('success')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
@if (Session::has('warning'))
  <div class=" saveAlert alert alert-warning" role="alert">
    <strong>Atento:</strong> {{Session::get('warning')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
@if (Session::has('error'))
  <div class=" saveAlert alert alert-danger" role="alert">
    <strong>Error:</strong> {{Session::get('error')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
