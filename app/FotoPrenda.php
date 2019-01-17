<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FotoPrenda extends Model
{

  protected $table = 'foto_prenda';
  protected $guarded = [];


  protected function setKeysForSaveQuery(Builder $query)
    {
        $query
            ->where('fop_fk_prenda', '=', $this->getAttribute('fop_fk_prenda'))
            ->where('fop_link', '=', $this->getAttribute('fop_link'));
        return $query;
    }
}
