<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisBelanja extends Model
{
  protected $table      = 'jenis';
  //protected $primaryKey = 'kecamatan_id';
  public $timestamps    = false;



  public function kelompok()
  {
     return $this->belongsTo('App\Models\KelompokBelanja');
  }



  public function objek()
  {
    return $this->hasMany('App\Models\ObjekBelanja');
  }




  //  public function jawabanSoalKecamatan()
  // {
  //   return $this->hasMany('App\Models\jawabanSoalKecamatan');
  // }

}




