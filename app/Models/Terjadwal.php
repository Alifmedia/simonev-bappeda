<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Terjadwal extends Model
{
  protected $table = 'terjadwal';
  protected $primaryKey = NULL;
  public $incrementing = false;
  public $timestamps = false;
  protected $guarded = [];

  public function administrator()
  {
    return $this->belongsTo('App\Models\Administrator');
  }

  public function ruang()
  {
    return $this->belongsTo('App\Models\Ruang');
  }

  public function konsultasi()
  {
    return $this->belongsTo('App\Models\Konsultasi');
  }
}
