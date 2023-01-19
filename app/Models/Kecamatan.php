<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
  protected $table      = 'kecamatan';
  //protected $primaryKey = 'kecamatan_id';
  public $timestamps    = false;



  public function kabupaten()
  {
     return $this->belongsTo('App\Models\Kabupaten');
  }



  public function kemukiman()
  {
    return $this->hasMany('App\Models\Kemukiman');
  }




  //  public function jawabanSoalKecamatan()
  // {
  //   return $this->hasMany('App\Models\jawabanSoalKecamatan');
  // }

}




