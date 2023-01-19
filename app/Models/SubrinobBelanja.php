<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubrinobBelanja extends Model
{
  protected $table      = 'subrinob';
  //protected $primaryKey = 'kecamatan_id';
  public $timestamps    = false;



  public function rinob()
  {
     return $this->belongsTo('App\Models\RinobBelanja');
  }



public function konsultasi()
  {
     return $this->belongsTo('App\Models\Konsultasi');
  }



 




  //  public function jawabanSoalKecamatan()
  // {
  //   return $this->hasMany('App\Models\jawabanSoalKecamatan');
  // }

}




