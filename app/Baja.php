<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Baja extends Model
{
  protected $table = 'baja';
  protected $primaryKey = 'pk_baja';
  protected $guarded = [];
}
