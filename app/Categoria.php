<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
  protected $table = 'categoria';
  protected $primaryKey = 'pk_categoria';
  protected $guarded = [];

  /**
   * @author Pecons
   * Métodos de las relaciones que tiene la tabla Categoria.
   */
   
  public function gasto()
  {
    return $this->hasMany('App\Gasto','gas_fk_categoria','pk_categoria');
  }

  public function prenda()
  {
    return $this->hasMany('App\Prenda','pre_fk_categoria','pk_categoria');
  }

  public function baja()
  {
    return $this->hasMany('App\Baja','bja_fk_categoria','pk_categoria');
  }
}
