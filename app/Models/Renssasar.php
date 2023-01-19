<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Renssasar extends Model
{
  protected $table    = 'renssasar';
  //protected $guarded  = ['id'];
  //protected $primaryKey = 'renssasar_id';
 public $timestamps    = false;


 public function indikatortujuan()
  {
    return $this->belongsTo('App\Models\Indikatortujuan');
  }


 

public function indikatorrenssasar()
  {
    return $this->hasMany('App\Models\Indikatorrenssasar');
  }

  
  

 
}
