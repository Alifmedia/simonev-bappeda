<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusKonsultasi extends Model
{
  protected $table   = 'status_konsultasi';
 // public $timestamps = false;

  public function konsultasi()
  {
    return $this->belongsToMany('App\Models\Konsultasi');
  }

  public function jurnalKonsultasi()
  {
    return $this->hasMany('App\Models\JurnalKonsultasi');
  }
}
