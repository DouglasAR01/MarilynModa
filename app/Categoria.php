<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
  protected $table = 'categoria';
  protected $primaryKey = 'pk_categoria';
  protected $guarded = [];
}
