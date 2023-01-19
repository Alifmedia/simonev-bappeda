<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subindikator extends Model
{
    protected $table = 'Subindikator';
    public $timestamps = false;

    public function AspekSoal()
    {
      return $this->belongsTo('App\Models\AspekSoal');
    }

  //  public function jawaban()
  // {
  //    return $this->belongsToMany('App\Models\Jawaban', 'jawaban_soal');
   // }

   public function jawabanSubinKecamatan()
    {
      return $this->hasMany('App\Models\JawabanSubinKecamatan');
    }
}
