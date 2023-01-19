<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    protected $table = 'administrator';
    public $timestamps = false;
    protected $guarded = ['id'];

    public function getJenisKelaminAttribute($value)
    {
        return $value ? 'Laki-Laki' : 'Perempuan';
    }

    public function umum()
    {
      return $this->belongsTo('App\Models\Umum');
    }

     public function konsultasi()
    {
      return $this->hasOne('App\Models\Konsultasi');
    }
}
