<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peraturan extends Model
{
    protected $table = 'peraturan';

    public function hal()
    {
      return $this->belongsTo('App\Models\Hal');
    }

    public function jenisPeraturan()
    {
      return $this->belongsTo('App\Models\JenisPeraturan');
    }
}
