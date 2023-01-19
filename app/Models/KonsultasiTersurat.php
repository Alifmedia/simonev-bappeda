<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class KonsultasiTersurat extends Model
{
    protected $table = 'konsultasi_tersurat';

    
    public function hal()
    {
      return $this->belongsTo('App\Models\Hal');
    }

    public function umum()
    {
      return $this->belongsTo('App\Models\Umum');
    }

    public function sektoral()
    {
      return $this->belongsTo('App\Models\Sektoral');
    }

     public function status()
    {
      return $this->belongsTo('App\Models\StatusKonsultasiTer');
    }

     

}
