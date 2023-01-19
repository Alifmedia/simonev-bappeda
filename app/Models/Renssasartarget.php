<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Renssasartarget extends Model
{
  protected $table    = 'renssasar_target';
  //protected $guarded  = ['id'];
  //protected $primaryKey = 'renssasar_id';
   public $timestamps    = false;



 public function renssasar()
  {
    return $this->belongsTo('App\Models\Renssasar');
  }


 



  
  

 
}
