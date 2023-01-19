<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SatuanKerja extends Model
{
  protected $table = 'satuan_kerja';
  public $timestamps = false;

   public function konsultasi()
  {
    return $this->hasMany('App\Models\Konsultasi','foreign_key_constraints');
  }    
}
