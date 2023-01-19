<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Indikatorrenssasarprog extends Model
{
  protected $table    = 'indikatorrenssasarprog';
  //protected $guarded  = ['id'];
  //protected $primaryKey = 'renssasar_id';
 public $timestamps    = false;


 public function renssasarprog()
  {
    return $this->belongsTo('App\Models\Renssasarprog');
  }


public function renssasarprogkeg()
  {
    return $this->hasMany('App\Models\Renssasarprogkeg');
  }

  
  

 
}
