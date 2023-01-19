<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Indikatorrenssasarprogkeg extends Model
{
  protected $table    = 'indikatorrenssasarprogkeg';
  //protected $guarded  = ['id'];
  //protected $primaryKey = 'renssasar_id';
 public $timestamps    = false;


 public function renssasarprogkeg()
  {
    return $this->belongsTo('App\Models\Renssasarprogkeg');
  }


public function renssasarprogkegsubkeg()
  {
    return $this->hasMany('App\Models\Renssasarprogkegsubkeg');
  }

  
  

 
}
