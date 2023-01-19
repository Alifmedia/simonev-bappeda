<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Renssasarprogkegsubkeg extends Model
{
  protected $table    = 'renssasarprogkegsubkeg';
 public $timestamps    = false;



 public function indikatorrenssasarprogkeg()
  {
    return $this->belongsTo('App\Models\Indikatorrenssasarprogkeg');
  }

   public function dusun()
  {
    return $this->belongsTo('App\Models\Dusun');
  }


  public function bagian()
  {
    return $this->belongsTo('App\Models\Bagian');
  }




  

  public function konsultasi()
  {
    return $this->hasMany('App\Models\Konsultasi');
  }    

  
  
  

 
}
