<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
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

    public function cambiarLinkFoto(String $LinkFotoNueva)
    {
      DB::statement("UPDATE foto_prenda SET fop_link = '$LinkFotoNueva' WHERE fop_link = '$this->fop_link';");
    }

    public function cambiarFotoPrincipal(String $linkFotoPrincipal)
    {
           $foto = FotoPrenda::where('fop_link',$linkFotoPrincipal)->first();
           if (!$foto) {
             return 0;
           }
           $this->fop_principal = 0;
           $foto->fop_principal = 1;
           $foto->save();
           $this->save();
           return 1;
    }

    public function prendaDeFoto()
    {
      return $this->belongsTo('App\Prenda','fop_fk_prenda','pk_prenda');
    }
}
