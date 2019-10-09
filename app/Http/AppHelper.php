<?php
/**
 * Esta función es un machetazo para poder cambiar el directorio
 * público de public a public_html.
 */
function public_path($path = '')
{
  return base_path().'/public_html/'.$path;
}
 ?>
