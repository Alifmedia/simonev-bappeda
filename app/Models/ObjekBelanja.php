<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ObjekBelanja extends Model
{
  protected $table      = 'objek';
  //protected $primaryKey = 'kecamatan_id';
  public $timestamps    = false;



  public function jenis()
  {
     return $this->belongsTo('App\Models\JenisBelanja');
  }



  public function rinob()
  {
    return $this->hasMany('App\Models\RinobBelanja');
  }




  //  public function jawabanSoalKecamatan()
  // {
  //   return $this->hasMany('App\Models\jawabanSoalKecamatan');
  // }

}




