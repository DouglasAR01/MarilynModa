<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
  protected $table = 'cliente';
  protected $primaryKey = 'pk_cli_cedula';
  protected $guarded = ['pk_cli_cedula','cli_celular','cli_email'];

  public function facturas()
  {
    return $this->hasMany('App\Factura','fac_fk_cliente','pk_cli_cedula');
  }

}
