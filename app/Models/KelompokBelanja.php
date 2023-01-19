<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KelompokBelanja extends Model
{
  protected $table        = 'kelompok';
  //protected $primaryKey = 'kabupaten_id';
  public $timestamps    = false;

    public function jenis()
  {
    return $this->hasMany('App\Models\JenisBelanja');
  }
}
