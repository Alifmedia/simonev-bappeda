<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
  protected $table         = 'item';
  //protected $primaryKey  = 'item_id';



 public function bagian()
  {
    return $this->belongsTo('App\Models\Bagian');
  }

 public function konsultasi()
  {
    return $this->belongsTo('App\Models\Konsultasi');
  }

  public function jurnalKonsultasi()
  {
    return $this->hasMany('App\Models\JurnalKonsultasi');
  }



 
  //  public function belanja5()
  // {
  //   return $this->belongsTo('App\Models\Belanja5');
  // }


  





  
  //-------------------------------hasOne---------------------
  // public function terverivikasi()
  // {
  //   return $this->hasOne('App\Models\Terverivikasi');
  // }

  //  public function terjadwal()
  // {
  //   return $this->hasOne('App\Models\Terjadwal');
  // }

  // public function terekap()
  // {
  //   return $this->hasOne('App\Models\Terekap');
  // }



//-------------------------------hasMany---------------------
  // public function jurnalKonsultasi()
  // {
  //   return $this->hasMany('App\Models\JurnalKonsultasi');
  // }



//----------------------------HAS-ONE TAPI DATA TERAKHIR---------------

 //   public function jurnalKonsultasiLatest()
 //  {
 //    return $this->hasOne('App\Models\JurnalKonsultasi')->latest();
 //  }


 //  public function jurnalKonsultasiLatestNormal()
 //  {
 //    return $this->hasOne('App\Models\JurnalKonsultasi')->latest();
 //  }


 //   public function jurnalKonsultasiLatestPrekomorbid()
 //  {
 //    return $this->hasOne('App\Models\JurnalKonsultasi')->latest();;
 //  }



 // public function jurnalKonsultasiLatestKomorbid()
 //  {
 //    return $this->hasOne('App\Models\JurnalKonsultasi')->latest();
 //  }


 // public function jurnalKonsultasiLatestKomplikasi()
 //  {
 //    return $this->hasOne('App\Models\JurnalKonsultasi')->latest();
 //  }


  // public function pemangkuKonsultasi()
  // {
  //    return $this->hasMany('App\Models\PemangkuKonsultasi');
  // }

  // public function tahapan()
  // {
  //   return $this->hasMany('App\Models\Tahapan');
  // }

  //  public function dokumen()
  // {
  //   return $this->hasMany('App\Models\Dokumen');
  // }



//-------------------------------belongsToMany-----------------------------------
  //  public function statusKonsultasi()
  // {
  //   return $this->belongsToMany('App\Models\StatusKonsultasi', 'jurnal_konsultasi');
  // }

  
  // public function pemangku()
  // {
  //   return $this->belongsToMany('App\Models\Pemangku','pemangku_konsultasi');
  // }

 
}
