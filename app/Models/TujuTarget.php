<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TujuTarget extends Model
{
  protected $table    = 'tuju_target';
  //protected $guarded  = ['id'];



 public function tuju_indika()
  {
    return $this->belongsTo('App\Models\TujuIndika');
  }

 
}
