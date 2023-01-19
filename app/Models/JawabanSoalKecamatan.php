<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JawabanSoalKecamatan extends Model
{
    protected $table = 'jawaban_soal_kecamatan';
    protected $primaryKey = NULL;
    public $incrementing = false;
    public $timestamps = false;
    protected $guarded = [];

    public function jawaban()
    {
      return $this->belongsTo('App\Models\Jawaban');
    }

    public function kecamatan()
    {
      return $this->belongsTo('App\Models\Kecamatan');
    }

}
