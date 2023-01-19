<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
  protected $table    = 'konsultasi';
  //protected $guarded  = ['id'];



 public function subrinob()
  {
    return $this->belongsTo('App\Models\SubrinobBelanja');
  }


 public function renssasarprogkegsubkeg()
  {
    return $this->belongsTo('App\Models\renssasarprogkegsubkeg');
  }


   public function unsur()
  {
    return $this->belongsTo('App\Models\Unsur');
  }



 public function hal()
  {
    return $this->belongsTo('App\Models\Hal');
  }


 public function bagian()
  {
    return $this->belongsTo('App\Models\Bagian');
  }

   public function satuankerja()
  {
    return $this->belongsTo('App\Models\Satuankerja');
  }


public function item()
  {
    return $this->hasMany('App\Models\Item');
  }    


public function subrinobbelanja()
  {
    return $this->hasMany('App\Models\SubrinobBelanja');
  }    



  
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

  public function tahapan()
  {
    return $this->hasMany('App\Models\Tahapan');
  }

   public function dokumen()
  {
    return $this->hasMany('App\Models\Dokumen');
  }



//-------------------------------belongsToMany-----------------------------------
   public function statusKonsultasi()
  {
    return $this->belongsToMany('App\Models\StatusKonsultasi', 'jurnal_konsultasi');
  }

  
  public function pemangku()
  {
    return $this->belongsToMany('App\Models\Pemangku','pemangku_konsultasi');
  }

 
}
