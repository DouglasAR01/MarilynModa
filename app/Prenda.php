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
  protected $with = ['fotos','palabrasClave','categoria']; //Activa el eager loading por defecto

  public function getNombreCategoria()
  {
      return $this->categoria->cat_nombre;
  }

  //Retorna el objeto tipo FotoPrenda
  public function getFotoPrincipal()
  {
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
      return $this->belongsToMany('App\PalabraClave','prenda_pal_clave',
                                  'ppc_fk_prenda','ppc_fk_palabra_clave');
  }

  public function categoria()
  {
      return $this->belongsTo('App\Categoria','pre_fk_categoria','pk_categoria');
  }
}
