<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
  protected $table = 'factura';
  protected $primaryKey = 'pk_factura';
  protected $fillable = ['fac_fecha_entrega','fac_fecha_devolucion'];

  public function prendasAlquiladas()
  {
    return $this->hasMany('App\FacturaPrenda','fpr_fk_factura','pk_factura');
  }
}
