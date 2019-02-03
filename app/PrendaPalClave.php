<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrendaPalClave extends Model
{
  protected $table = 'prenda_pal_clave';
  protected $guarded = [];

  public function prenda()
  {
    $this->belongsTo('App\Prenda','ppc_fk_prenda','pk_prenda');
  }

  public function palabraClave()
  {
    $this->belongsTo('App\PalabraClave','ppc_fk_palabra_clave','pk_palabra_clave');
  }

}
