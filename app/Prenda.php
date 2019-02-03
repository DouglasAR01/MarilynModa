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
  protected $fotos;


  /**
   * @author Douglas R.
   * Este método retorna todas las palabras clave que correspondan a esta prenda.
   * @return Array
   */
  private function setPalabrasClave()
  {
      $thisPrendaPalClave =
        $this->palabrasClave()->get();
      $thisPalabrasClave = [];
      foreach ($thisPrendaPalClave as $PPC){
        array_push($thisPalabrasClave,$PPC->palabraClave()->first()->pal_clave);
      }
      $this->palabrasClave = $thisPalabrasClave;
  }

  /**
   * @author Douglas R.
   * Éste método retorna todas las fotos que tiene asignadas la prenda.
   * @return Array
   */
  private function setFotos()
  {
      $this->fotos = $this->fotos()->get();
  }

  public function getNombreCategoria()
  {
      return $this->categoria()->first()->cat_nombre;
  }

  public function getPalabrasClave()
  {
      if (!$this->palabrasClave) {
        $this->setPalabrasClave();
      }
      return $this->palabrasClave;
  }

  public function getFotos()
  {
      if (!$this->fotos) {
        $this->setFotos();
      }
      return $this->fotos;
  }

  //Retorna el objeto tipo FotoPrenda
  public function getFotoPrincipal()
  {
      if (!$this->fotos) {
        $this->setFotos();
      }
      foreach ($this->fotos as $foto) {
        if ($foto['fop_principal']==1) {
          return $foto;
        }
      }
  }

  /**
   * @author Pecons
   * Métodos de las relaciones que tiene la tabla prenda.
   */

  public function facturas()
  {
      return $this->hasMany('App\FacturaPrenda','fpr_fk_prenda','pk_prenda');
  }

  public function fotos()
  {
      return $this->hasMany('App\FotoPrenda','fop_fk_prenda','pk_prenda');
  }

  public function bajas()
  {
      return $this->hasMany('App\Baja','bja_fk_prenda','pk_prenda');
  }

  public function palabrasClave()
  {
      return $this->hasMany('App\PrendaPalClave','ppc_fk_prenda','pk_prenda');
  }

  public function categoria()
  {
      return $this->belongsTo('App\Categoria','pre_fk_categoria','pk_categoria');
  }
}
