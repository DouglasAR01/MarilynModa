<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PanelControl extends Model
{
  protected $table = 'panel_control';
  protected $primaryKey = 'pk_panel_control';
  protected $fillable = [];

  public function empleadoResponsableCambio()
  {
    return $this->belongsTo('App\Empleado','pco_fk_empleado','pk_emp_cedula');
  }
}
