<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Renssasarprogkeg extends Model
{
  protected $table    = 'renssasarprogkeg';
 public $timestamps    = false;



 public function indikatorrenssasarprog()
  {
    return $this->belongsTo('App\Models\Indikatorrenssasarprog');
  }

   public function gampong()
  {
    return $this->belongsTo('App\Models\Gampong');
  }


 


public function indikatorrenssasarprogkeg()
  {
    return $this->hasMany('App\Models\Indikatorrenssasarprogkeg');
  }   


  // public function renssasarprogkegsubkeg()
  // {
  //   return $this->hasMany('App\Models\Renssasarprogkegsubkeg');
  // }   

  
  

 
}
