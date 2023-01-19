<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SatuanKerjaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = [
          'Biro Humas dan Protokol',
          'Biro Umum',
          'Asisten I',
          'Asisten II',
          'Asisten III',
          'Asisten IV',
          'Sekda',
          'DPRA',
          'Bapeda',
          'Kodam',
          'Polda',
        ];
        
        foreach ($values as $key => $value) {
          DB::table('satuan_kerja')->insert([
            'nama' => $value,
          ]);
        }
    }
}
