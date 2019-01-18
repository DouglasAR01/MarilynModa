<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PalabraClave extends Model
{
  protected $table = 'palabra_clave';
  protected $primaryKey = 'pk_palabra_clave';
  protected $guarded = [];

  public function prendasConEstaPalClave()
  {
    return $this->hasMany('App\FotoPrenda','ppc_fk_palabra_clave','pk_palabra_clave');
  }
}
