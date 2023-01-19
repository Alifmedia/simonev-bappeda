<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PemangkuKonsultasi extends Model
{
  protected $table = 'pemangku_konsultasi';

  protected $fillable=['konsultasi_id','pemangku_id'];

  // public function konsultasi()
  // {
  //     return $this->belongsTo('App\Models\Konsultasi');
  //  }

  //  public function pemangku()
  //  {
  //    return $this->belongsTo('App\Models\Pemangku');
  //  }
}
