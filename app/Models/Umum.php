<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Umum extends Model
{
  protected $table = 'umum';
  public $timestamps = false;

  //protected $guarded = [];

  public function getJenisKelaminAttribute($value)
  {
      return $value ? 'Laki-Laki' : 'Perempuan';
  }


  public function user()
  {
    return $this->belongsTo('App\Models\User');
  }

 

 public function umumsektoral()
  {
    return $this->hasMany('App\Models\UmumSektoral');
  }

  
  
  //------------------------------------------------------------

 public function administrator()
  {
    return $this->hasOne('App\Models\Administrator');
  }


  // public function konsultasi()
  // {
  //   return $this->hasMany('App\Models\Konsultasi');
  // }



  //  public function latestRM()
  // {
  //   return $this->hasOne('App\Models\Konsultasi')->latest();
  // }

  
}
