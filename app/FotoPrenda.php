<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FotoPrenda extends Model
{
  protected $table = 'foto_prenda';
  protected $primaryKey = 'fop_fk_prenda'; //Falta modificar este campo para colocar la llave primaria compuesta, actualmente sólo hay una.
  protected $guarded = [];
}
