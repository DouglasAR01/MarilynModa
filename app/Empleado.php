<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
  protected $table = 'empleado';
  protected $primaryKey = 'pk_emp_cedula';
  protected $guarded = ['pk_emp_cedula','emp_clave','emp_celular','emp_email'];
  protected $hidden = ['emp_clave'];

  public function bajas()
  {
    return $this->hasMany('App\Baja','bja_fk_empleado','pk_emp_cedula');
  }

  public function facturas()
  {
    return $this->hasMany('App\Factura','fac_fk_empelado','pk_emp_cedula');
  }

  public function gastos()
  {
    return $this->hasMany('App\Gasto','gas_fk_empleado','pk_emp_cedula');
  }

  public function cambiosPanelControl()
  {
    return $this->hasMany('App\PanelControl','pco_fk_empleado','pk_emp_cedula');
  }
}
