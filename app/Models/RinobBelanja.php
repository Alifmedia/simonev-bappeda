<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RinobBelanja extends Model
{
  protected $table      = 'rinob';
  //protected $primaryKey = 'kecamatan_id';
  public $timestamps    = false;



  public function objek()
  {
     return $this->belongsTo('App\Models\ObjekBelanja');
  }



  public function subrinob()
  {
    return $this->hasMany('App\Models\SubrinobBelanja');
  }




  //  public function jawabanSoalKecamatan()
  // {
  //   return $this->hasMany('App\Models\jawabanSoalKecamatan');
  // }

}




