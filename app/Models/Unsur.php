<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unsur extends Model
{
  protected $table = 'unsur';
  public $timestamps = false;


  public function konsultasi()
  {
    return $this->hasMany('App\Models\Konsultasi','foreign_key_constraints');
  }
}
