<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KabupatenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $values = [
          'ACEH SELATAN',
          'ACEH TENGGARA',
          'ACEH TIMUR',
          'ACEH TENGAH',
          'ACEH BARAT',
          'ACEH BESAR',
          'PIDIE',
          'ACEH UTARA',
          'SIMEULUE',
          'ACEH SINGKIL',
          'BIREUEUN',
          'ACEH BARAT DAYA',
          'GAYO LUES',
          'ACEH JAYA',
          'NAGAN RAYA',
          'ACEH TAMIANG',
          'BENER MERIAH',
          'PIDIE JAYA',
          'BANDA ACEH',
          'SABANG',
          'LHOKSEUMAWE',
          'LANGSA',
          'SUBULUSSALAM',
      ];

      foreach ($values as $key => $value) {
        DB::table('kabupaten')->insert([
          'nama' => ucwords(strtolower($value)),
        ]);
      }
    }
}
