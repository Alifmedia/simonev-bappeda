<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Renstra extends Model
{
  protected $table    = 'renstra';

  public $timestamps = false;




 public function sektoral()
  {
    return $this->belongsTo('App\Models\Sektoral');
  }

  public function periode()
  {
    return $this->belongsTo('App\Models\Periode');
  }

  public function rpd()
  {
    return $this->belongsTo('App\Models\Rpd');
  }

 
 
public function tujuan()
  {
    return $this->hasMany('App\Models\Tujuan');
  }  


  
  

  
  

 
}
