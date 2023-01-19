<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnsurTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = ['Perseorangan', 'Organisasi', 'LSM', 'Pemkab/Pemko', 'Universitas', 'DPRK', 'DPRA', 'Lembaga Horizontal'];
        foreach ($values as $key => $value) {
          DB::table('unsur')->insert([
            'nama' => $value,
          ]);
        }
    }
}
