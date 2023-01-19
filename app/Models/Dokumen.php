<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
  protected $table = 'dokumen';
  protected $primaryKey = NULL;
  public $incrementing = false; 



  public function konsultasi()
  {
    return $this->belongsTo('App\Models\Konnsultasi');
  }




}
