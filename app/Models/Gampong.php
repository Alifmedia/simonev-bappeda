<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gampong extends Model
{
  protected $table      = 'gampong';
  //protected $primaryKey = 'gampong_id';
  public $timestamps    = false;



  public function kemukiman()
  {
    return $this->belongsTo('App\Models\Kemukiman');
  } 


  public function dusun()
  {
    return $this->hasMany('App\Models\Dusun');
  }



   public function renssasarprogkeg()
  {
    return $this->hasMany('App\Models\Renssasarprogkeg');
  }     
}




