<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacturaPrenda extends Model
{
  protected $table = 'factura_prenda';
  protected $guarded = [];


  protected function setKeysForSaveQuery(Builder $query)
    {
        $query
            ->where('fpr_fk_factura', '=', $this->getAttribute('fpr_fk_factura'))
            ->where('fpr_fk_prenda', '=', $this->getAttribute('fpr_fk_prenda'));
        return $query;
    }

}
