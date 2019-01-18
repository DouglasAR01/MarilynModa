<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prenda extends Model
{
  protected $table = 'prenda';
  protected $primaryKey = 'pk_prenda';
  protected $fillable = [
    'pre_nombre',
    'pre_descripcion',
    'pre_fecha_compra',
    'pre_talla'
  ];
  protected $palabrasClave;

  /**
   * @author Douglas R.
   * El constructor heredado es sobrescrito, por lo tanto, se llama al constructor
   * padre también, por favor, no tocar.
   */
  function __construct(array $attributes = [])
  {
    parent::__construct($attributes);
    $this->palabrasClave = $this->getPalabrasClave();
  }

  /**
   * @author Douglas R.
   * Este método retorna todas las palabras clave que correspondan a esta prenda.
   * @return Array
   */
  private function getPalabrasClave()
  {
    $thisPrendaPalClave =
      $this->hasMany('App\PrendaPalClave','ppc_fk_prenda','pk_prenda')->get();
    $thisPalabrasClave = [];
    foreach ($thisPrendaPalClave as $PPC)
    {
      array_push($thisPalabrasClave,$PPC->palabraClave()->first()->pal_clave);
    }
    return $thisPalabrasClave;
  }

  /**
   * @author Pecons
   * Métodos de las relaciones que tiene la tabla prenda.
   */

  public function facturaDePrenda()
  {
    return $this->hasMany('App\FacturaPrenda','fpr_fk_prenda','pk_prenda');
  }

  public function fotoPrenda()
  {
    return $this->hasMany('App\FotoPrenda','fop_fk_prenda','pk_prenda');
  }
  public function baja()
  {
    return $this->hasMany('App\Baja','bja_fk_prenda','pk_prenda');
  }
  public function prendaPalClave()
  {
    return $this->hasMany('App\PrendaPalClave','ppc_fk_prenda','pk_prenda');
  }
  public function categoriaPrenda()
  {
    return $this->belongsTo('App\Categoria','pre_fk_categoria','pk_categoria');
  }
}
