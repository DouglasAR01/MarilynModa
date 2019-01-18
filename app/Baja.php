<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Baja extends Model
{
  protected $table = 'baja';
  protected $primaryKey = 'pk_baja';
  protected $guarded = [];

  /**
   * @author Pecons
   * Métodos de las relaciones que tiene la tabla Baja.
   */

  public function categoriaBaja()
  {
    return $this->belongsTo('App\Categoria','bja_fk_categoria','pk_categoria');
  }

  public function prendaDadaBaja()
  {
    return $this->belongsTo('App\Prenda','gas_fk_prenda','pk_prenda');
  }

  public function empleadoResonsableBaja()
  {
    return $this->belongsTo('App\Empleado','gas_fk_empleado','pk_emp_cedula');
  }
}
