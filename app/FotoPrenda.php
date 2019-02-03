<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\SupraController as SC;

class FotoPrenda extends Model
{
    protected $table = 'foto_prenda';
    protected $primaryKey = 'fop_link';
    protected $guarded = [];
    //Necesario para evitar un bug de Eloquent. Ni idea de por qué se genera. NO TOCAR.
    public $incrementing = false;


    /**
     * @author Henry, Douglas
     * @param String $LinkFotoNueva Es el link a asignar
     */
    public function cambiarLinkFoto(String $LinkFotoNueva)
    {
        SC::eliminarArchivo($this->fop_link, 'public');
        $this->fop_link = $LinkFotoNueva;
        $this->save();
    }

    /**
     * @author Henry
     * @param String $linkFotoPrincipal Es el link de la foto que será principal
     * El método lo que hace es buscar la foto que será principal, asignar que sea principal
     * y desasignar el atributo a la actual foto principal.
     * PARA QUE FUNCIONE EL OBJETO DEL QUE SE LLAMA EL MÉTODO DEBE SER UNA FOTO PRINCIPAL,
     * ES DECIR, fop_principal = 1.
     */
    public function cambiarFotoPrincipal(String $linkFotoPrincipal)
    {
        if (!$this->fop_principal) {
          return 0;
        }
        $foto = FotoPrenda::find($linkFotoPrincipal)->first();
        if (!$foto) {
          return 0;
        }
        $this->fop_principal = 0;
        $foto->fop_principal = 1;
        $foto->save();
        $this->save();
        return 1;
    }

    /**
     * @author Pecons
     * Métodos de las relaciones que tiene la tabla Foto_Prenda.
     */
    public function prendaDeFoto()
    {
        return $this->belongsTo('App\Prenda','fop_fk_prenda','pk_prenda');
    }
}
