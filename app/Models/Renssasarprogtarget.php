<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Renssasarprogtarget extends Model
{
  protected $table    = 'renssasarprog_target';
   public $timestamps    = false;



 public function renssasarprog()
  {
    return $this->belongsTo('App\Models\Renssasarprog');
  }



 
}
