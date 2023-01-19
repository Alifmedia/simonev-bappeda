<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AspekSoal extends Model
{
    protected $table = 'aspek_soal';
    public $timestamps = false;

    public function subindikator()
    {
        return $this->hasMany('App\Models\subindikator');
    }
}
