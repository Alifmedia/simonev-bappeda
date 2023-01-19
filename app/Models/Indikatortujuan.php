<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Indikatortujuan extends Model
{
  protected $table    = 'indikatortujuan';
  //protected $guarded  = ['id'];
  //protected $primaryKey = 'renssasar_id';
 public $timestamps    = false;


 public function tujuan()
  {
    return $this->belongsTo('App\Models\Tujuan');
  }


public function renssasar()
  {
    return $this->hasMany('App\Models\Renssasar');
  }

  
  

 
}
