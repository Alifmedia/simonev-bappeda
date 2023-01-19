<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TemaSoal extends Model
{
    protected $table = 'tema_soal';
    public $timestamps = false;

    public function soal()
    {
        return $this->hasMany('App\Models\Soal');
    }
}
