<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RuangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 5; $i++) {
          DB::table('ruang')->insert([
            'nama' => 'Ruang '.$i,
            'instansi' => 'Kantor Gubernur',
            'alamat' => 'Entah Berantah'
          ]);
        }

        for ($i=1; $i <= 5; $i++) {
          DB::table('ruang')->insert([
            'nama' => 'Ruang '.$i,
            'instansi' => 'Kantor Bapeda',
            'alamat' => 'Entah Berantah'
          ]);
        }
    }
}
