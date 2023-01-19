<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    protected $table = 'periode';
    public $timestamps = false;


     public function renstra()
  {
    return $this->hasMany('App\Models\Renstra');
  }    
}
