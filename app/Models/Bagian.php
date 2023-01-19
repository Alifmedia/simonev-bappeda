<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bagian extends Model
{
    protected $table = 'bagian';
    public $timestamps = false;


     public function konsultasi()
  {
    return $this->hasMany('App\Models\Konsultasi','foreign_key_constraints');
  }    
}
