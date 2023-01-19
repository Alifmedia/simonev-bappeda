<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
  protected $table      = 'kabupaten';
  //protected $primaryKey = 'kabupaten_id';
  public $timestamps    = false;

    public function kecamatan()
  {
    return $this->hasMany('App\Models\Kecamatan');
  }
}
