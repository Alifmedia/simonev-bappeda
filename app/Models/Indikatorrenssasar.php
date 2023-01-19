<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Indikatorrenssasar extends Model
{
  protected $table    = 'indikatorrenssasar';
  //protected $guarded  = ['id'];
  //protected $primaryKey = 'renssasar_id';
 public $timestamps    = false;


 public function renssasar()
  {
    return $this->belongsTo('App\Models\Renssasar');
  }


public function renssasarprog()
  {
    return $this->hasMany('App\Models\Renssasarprog');
  }

  
  

 
}
