<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dusun extends Model
{
  protected $table = 'dusun';
  public $timestamps = true;


  public function gampong()
  {
    return $this->belongsTo('App\Models\Gampong');
  }


  
  public function renssasarprogkegsubkeg()
  {
    return $this->hasMany('App\Models\Renssasarprogkegsubkeg');
  }   
  
     
}
