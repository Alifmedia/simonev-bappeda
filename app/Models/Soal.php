<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $table = 'soal';
    public $timestamps = false;

    public function temaSoal()
    {
      return $this->belongsTo('App\Models\TemaSoal');
    }

    public function jawaban()
   {
      return $this->belongsToMany('App\Models\Jawaban', 'jawaban_soal');
    }

   public function jawabanSoalKecamatan()
    {
      return $this->hasMany('App\Models\JawabanSoalKecamatan');
    }
}
