<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusKonsultasiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = ['Termohon', 'Tertolak', 'Terverifikasi', 'Terjadual', 'Terekap'];
        foreach ($values as $key => $value) {
          DB::table('status_konsultasi')->insert([
            'nama' => $value,
          ]);
        }
    }
}
