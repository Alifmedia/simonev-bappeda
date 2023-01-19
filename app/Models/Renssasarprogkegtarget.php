<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Renssasarprogkegtarget extends Model
{
  protected $table    = 'renssasarprogkeg_target';
 public $timestamps    = false;



 public function renssasarprogkeg()
  {
    return $this->belongsTo('App\Models\Renssasarprogkeg');
  }



 
}
