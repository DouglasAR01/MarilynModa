<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Primitivo panel de control</title>
  </head>
  <body>
    <form class="" action="/panel" method="post">
      {{ csrf_field() }}
      <label>Ajustar dinero:</label>
      <input type="number" name="dinero_actual" value="@if (!empty($actual))
        {{$actual->pco_dinero_inicial}}
      @endif"><br>
      <label>¿Sistema en mantenimiento?</label>
      <input type="checkbox" name="mantenimiento" value="1" @if (!empty($actual))
        @if ($actual->pco_mantenimiento)
          checked
        @endif
      @endif>
      <br>
      <input type="submit" name="enviar" value="Ajustar">
    </form>
  </body>
</html>
