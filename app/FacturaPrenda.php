<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacturaPrenda extends Model
{
  protected $table = 'factura_prenda';
  protected $guarded = ['fpr_cantidad'];


  protected function setKeysForSaveQuery(Builder $query)
  {
        $query
            ->where('fpr_fk_factura', '=', $this->getAttribute('fpr_fk_factura'))
            ->where('fpr_fk_prenda', '=', $this->getAttribute('fpr_fk_prenda'));
        return $query;
  }

  /**
   * @author Pecons
   * Métodos de las relaciones que tiene la tabla Factura_Prenda.
   */

  public function factura()
  {
    return $this->belongsTo('App\Factura','fpr_fk_factura','pk_factura');
  }
  public funcion prenda()
  {
    return $this->belongsTo('App\Prenda','fpr_fk_prenda','pk_prenda');
  }

}
