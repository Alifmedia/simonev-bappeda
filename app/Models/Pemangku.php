<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemangku extends Model
{
  protected $table = 'pemangku';
  public $timestamps = false;

  public function konsultasi()
  {
    return $this->belongsToMany('App\Models\Konsultasi');
  }

  //  public function pemangkuKonsultasi()
  // {
  //   return $this->hasMany('App\Models\PemangkuKonsultasi');
  // }
}
