<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kemukiman extends Model
{
  protected $table      = 'kemukima';
  //protected $primaryKey = 'kemukiman_id';
  public $timestamps    = false;

  public function kecamatan()
  {
    return $this->belongsTo('App\Models\Kecamatan');
  }


  public function gampong()
  {
    return $this->hasMany('App\Models\Gampong');
  }

public function renssasarprog()
  {
    return $this->hasMany('App\Models\Renssasarprog');
  }



}
