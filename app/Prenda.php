<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\PalabraClave;

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

  private function parsearPalabras(String $palabrasClave)
  {
      // Quita los espacios y normaliza todo a minúscula
      $palabrasClave = strtolower(str_replace(' ','',$palabrasClave));
      // El Array_filter hace que si la cadena de palabras clave está vacía el
      // array devuelto sea un array vacío en lugar de con un elemento [0] vacío.
      // Ver primer aporte en https://www.php.net/manual/es/function.explode.php
      return array_filter(explode(';', $palabrasClave));
  }

  private function indicePalabraClave(String $palabraClave)
  {
      // Devuelve la pk de la palabra clave.
      // Si no existe la palabra clave, la crea.
      $palabra = PalabraClave::where('pal_clave','=',$palabraClave)->firstOr(
        function() use($palabraClave){
          $nuevaPalabra = new PalabraClave();
          $nuevaPalabra->pal_clave = $palabraClave;
          $nuevaPalabra->save();
          return $nuevaPalabra;
      });
      return $palabra->pk_palabra_clave;
  }

  private function verificarPalabrasExistentes(Array $palabrasClave)
  {
      $pkPalabras = [];
      $pkPalabrasExistentes = [];
      foreach ($palabrasClave as $palabraClave) {
        array_push($pkPalabras,$this->indicePalabraClave($palabraClave));
      }
      foreach ($this->palabrasClave as $palabraClaveExistente) {
        array_push($pkPalabrasExistentes, $palabraClaveExistente->pk_palabra_clave);
      }

      return [
        // Retorna un array con las pks de las palabras clave nuevas, las cuales
        // hay que añadir a la tabla pivote prenda_pal_clave.
        'agregar' => array_diff($pkPalabras,$pkPalabrasExistentes),
        // Retorna un array con las pks de las palabras clave que ya no están,
        // las cuales hay que eliminar a la tabla pivote prenda_pal_clave.
        'quitar' => array_diff($pkPalabrasExistentes,$pkPalabras),
      ];
  }

  public function asociarPalabrasClave(String $palabrasClaveNuevas)
  {
      $palabrasParseadas = $this->parsearPalabras($palabrasClaveNuevas);
      $modificaciones = $this->verificarPalabrasExistentes($palabrasParseadas);

      // Eliminación de las palabras clave que ya no se usan
      foreach ($modificaciones['quitar'] as $pkPalabraQuitar) {
        DB::table('prenda_pal_clave')->where([
          ['ppc_fk_prenda','=',$this->pk_prenda],
          ['ppc_fk_palabra_clave','=',$pkPalabraQuitar]
        ])->delete();
      }

      //Agregación de las palabras clave nuevas
      $query = [];
      foreach ($modificaciones['agregar'] as $pkPalabraNueva) {
        array_push($query,[
          'ppc_fk_prenda' => $this->pk_prenda,
          'ppc_fk_palabra_clave' => $pkPalabraNueva
        ]);
      }
      DB::table('prenda_pal_clave')->insert($query);
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
                                  'ppc_fk_prenda','ppc_fk_palabra_clave')
                                  ->withPivot('ppc_fk_palabra_clave');
  }

  public function categoria()
  {
      return $this->belongsTo('App\Categoria','pre_fk_categoria','pk_categoria');
  }
}
