<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Renssasarprog extends Model
{
  protected $table    = 'renssasarprog';
  public $timestamps = false;



 public function indikatorrenssasar()
  {
    return $this->belongsTo('App\Models\Indikatorrenssasar');
  }


  public function kemukiman()
  {
    return $this->belongsTo('App\Models\Kemukiman');
  }


 // public function renssasarprogkeg()
 //  {
 //    return $this->hasMany('App\Models\Renssasarprogkeg');
 //  }  


 public function indikatorrenssasarprog()
  {
    return $this->hasMany('App\Models\Indikatorrenssasarprog');
  }  

// public function renssasarprogtarget()
//   {
//     return $this->hasMany('App\Models\Renssasarprogtarget');
//   }    

  
  

 
}
