<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use CoenJacobs\EloquentCompositePrimaryKeys\HasCompositePrimaryKey;

class FotoPrenda extends Model
{
    use HasCompositePrimaryKey;

    protected $table = 'foto_prenda';
    protected $primaryKey = ['fop_fk_prenda','fop_link'];
    protected $guarded = [];

    /**
     * @author Pecons
     * Métodos de las relaciones que tiene la tabla Foto_Prenda.
     */

    public function prendaDeFoto()
    {
      return $this->belongsTo('App\Prenda','fop_fk_prenda','pk_prenda');
    }
}
