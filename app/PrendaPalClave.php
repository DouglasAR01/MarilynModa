<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrendaPalClave extends Model
{
  protected $table = 'prenda_pal_clave';
  protected $guarded = [];

  protected function setKeysForSaveQuery(Builder $query)
    {
        $query
            ->where('ppc_fk_prenda', '=', $this->getAttribute('ppc_fk_prenda'))
            ->where('ppc_fk_palabra_clave', '=', $this->getAttribute('ppc_fk_palabra_clave'));
        return $query;
    }

  public function palabraClave()
  {
    $this->belongsTo('App\PalabraClave','ppc_fk_palabra_clave','pk_palabra_clave');
  }

  public function prenda()
  {
    $this->belongsTo('App\PalabraClave','ppc_fk_prenda','pk_prenda');
  }
}
