<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jawaban extends Model
{
    protected $table = 'jawaban';
    public $timestamps = false;

    public function jawabanSoalKecamatan()
    {
        return $this->hasMany('App\Models\JawabanSoalKecamatan');
    }
}
