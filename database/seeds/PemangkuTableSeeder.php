<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PemangkuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i=1; $i <= 10; $i++) {
        DB::table('pemangku')->insert([
          'nama' => 'Pemangku '.$i,
          'nik' => '1234567',
          'no_handphone' => '0812345678',
          'tempat_lahir' => 'Entah',
          'tanggal_lahir' => '2019-08-21'
        ]);
      }
    }
}
