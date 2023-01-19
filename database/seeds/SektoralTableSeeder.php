<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SektoralTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = [
          [3,'Penataan Daerah Mukim dan Gampong', 'Ruslan S. Ag, MA'],
          [3 ,'Perangkat Pemerintahan dan Hubungan Antar Lembaga', 'Rafliyansah, SH'],
          [3, 'Pemilu dan Pemilihan', 'Rina Agustina, SSTP, MPA'],
        ];

        foreach ($values as $key => $value) {
          DB::table('sektoral')->insert([
            'bagian_id' => $value[0],
            'nama' => $value[1],
            'pic' => $value[2],
          ]);
        }
    }
}
