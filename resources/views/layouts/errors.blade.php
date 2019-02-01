@if($errors->any())
<div >
@foreach ($errors->all() as $message)
      <li><font color="red"> Error:</font> {{$message}} </p>
  @endforeach
</div>
@endif
