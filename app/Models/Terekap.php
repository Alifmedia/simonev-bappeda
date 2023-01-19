<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Terekap extends Model
{
  protected $table = 'terekap';
  protected $primaryKey = NULL;
  public $incrementing = false;
  public $timestamps = false;
  protected $guarded = [];

  public function administrator()
  {
    return $this->belongsTo('App\Models\Administrator');
  }

 
   public function konsultasi()
  {
    return $this->belongsTo('App\Models\Konsultasi');
  }
}
