<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class Empleado extends Authenticatable
{
  use Notifiable;

  protected $table = 'empleado';
  protected $primaryKey = 'pk_emp_cedula';
  protected $keyType = 'string'; //Necesario para que Laravel no castee el valor a un entero
  protected $guard = 'empleado';
  protected $guarded = ['pk_emp_cedula','emp_clave','emp_celular','emp_email'];
  protected $hidden = ['emp_clave'];
  protected $email; //Solución cutre a un problema del reset passwords de laravel

  /**
   * NO TOCAR
   */
  public function getAuthPassword()
  {
      return $this->emp_clave;
  }
  /**
   * NO TOCAR
   */
  public function getEmailForPasswordReset()
  {
      $this->email = $this->emp_email;
      return $this->email;
  }

  public function bajas()
  {
    return $this->hasMany('App\Baja','bja_fk_empleado','pk_emp_cedula');
  }

  public function facturas()
  {
    return $this->hasMany('App\Factura','fac_fk_empleado','pk_emp_cedula');
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
