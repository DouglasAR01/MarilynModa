@if (Session::has('success'))
  <div class=" saveAlert alert alert-success" role="alert">
    <strong>Perfecto:</strong> {{Session::get('success')}}
  </div>
@endif

@if (Session::has('error'))
  <div class=" saveAlert alert alert-success" role="alert">
    <strong>Error:</strong> {{Session::get('error')}}
  </div>
@endif
