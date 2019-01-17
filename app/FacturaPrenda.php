<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacturaPrenda extends Model
{
  protected $table = 'factura_prenda';
  protected $primaryKey = 'fpr_fk_factura'; //Falta modificar este campo para colocar la llave primaria compuesta, actualmente sólo hay una.
  protected $guarded = [];
}
