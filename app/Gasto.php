<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
  protected $table = 'gasto';
  protected $primaryKey = 'pk_gasto';
  protected $guarded = [];
}
