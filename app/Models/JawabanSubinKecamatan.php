<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JawabanSubinKecamatan extends Model
{
    protected $table = 'jawaban_subin_kecamatan';
    protected $primaryKey = NULL;
    public $incrementing = false;
    public $timestamps = false;
    protected $guarded = [];

   // public function jawaban()
  //  {
   //   return $this->belongsTo('App\Models\Jawaban');
   // }

}
