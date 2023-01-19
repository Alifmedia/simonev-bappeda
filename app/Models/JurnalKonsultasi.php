<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JurnalKonsultasi extends Model
{
  protected $table = 'jurnal_konsultasi';

  //protected $fillable=['konsultasi_id','status_konsultasi_id','administrator_id'];
  
 
  public function item()
  {
     return $this->belongsTo('App\Models\Item');
  }

  public function statusKonsultasi()
  {
    return $this->belongsTo('App\Models\StatusKonsultasi');
  }

  public function administrator()
  {
    return $this->belongsTo('App\Models\Administrator');
  }
}
