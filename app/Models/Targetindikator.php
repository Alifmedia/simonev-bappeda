<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Targetindikator extends Model
{
  protected $table    = 'targetindikator';
  //protected $guarded  = ['id'];
  //protected $primaryKey = 'renssasar_id';
 public $timestamps    = false;


 public function indikatortujuan()
  {
    return $this->belongsTo('App\Models\Indikatortujuan');
  }


  
  

 
}
