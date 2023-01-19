<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UmumSektoral extends Model
{
  protected $table = 'umum_sektoral';
  public $timestamps = false;

  //protected $guarded = [];

 

  public function umum()
  {
    return $this->belongsTo('App\Models\Umum');
  }


public function sektoral()
  {
    return $this->belongsTo('App\Models\Sektoral');
  }
 



  
}
