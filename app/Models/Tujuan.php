<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tujuan extends Model
{
  protected $table    = 'tujuan';
  //protected $guarded  = ['id'];
  //protected $primaryKey = 'renssasar_id';
 public $timestamps    = false;


 public function renstra()
  {
    return $this->belongsTo('App\Models\Renstra');
  }


 public function indikatortujuan()
  {
    return $this->hasMany('App\Models\Indikatortujuan');
  }


// public function renssasar()
//   {
//     return $this->hasMany('App\Models\Renssasar');
//   }


  
  

 
}
