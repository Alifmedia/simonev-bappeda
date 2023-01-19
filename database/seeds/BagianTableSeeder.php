<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BagianTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = [
          ['Pemerintahan Umum', 'Reza Saputra, SSTP, M. Si'],
          ['Otonomi Daerah dan Kerjasama', 'Auliya Husni Putra, SSTP, M. Si'],
          ['Pemerintahan, HAL, Pemilu, dan Pemilihan', 'Restu Andi Surya, SSTP, MPA'],
          ['Penataan Daerah dan Perangkat Pemerintahan', 'Intan Febrina Putri, S. TP'],
        ];

        foreach ($values as $key => $value) {
          DB::table('bagian')->insert([
            'nama' => $value[0],
            'pic' => $value[1]
          ]);
        }
    }
}
