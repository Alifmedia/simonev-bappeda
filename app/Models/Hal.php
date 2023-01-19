<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hal extends Model
{
  protected $table = 'hal';
  public $timestamps = false;


  public function konsultasi()
  {
    return $this->hasMany('App\Models\Konsultasi','foreign_key_constraints');
  }
}
