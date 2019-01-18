<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
  protected $table = 'gasto';
  protected $primaryKey = 'pk_gasto';
  protected $guarded = [];

  /**
   * @author Pecons
   * Métodos de las relaciones que tiene la tabla Gasto.
   */

  public function empleadoResponsableGasto()
  {
    return $this->belongsTo('App\Empleado','gas_fk_empleado','pk_emp_cedula');
  }

  public function categoriaGasto()
  {
    return $this->belongsTo('App\Categoria','gas_fk_categoria','pk_categoria');
  }
  
}
