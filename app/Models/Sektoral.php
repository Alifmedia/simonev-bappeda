<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sektoral extends Model
{
  protected $table = 'sektoral';
  public $timestamps = false;

 
  public function umumsektoral()
  {
    return $this->hasMany('App\Models\UmumSektoral');
  }



  //  public function konsultasi()
  // {
  //   return $this->hasMany('App\Models\Konsultasi');
  // }


  public function renstra()
  {
    return $this->hasMany('App\Models\Renstra');
  }
}
