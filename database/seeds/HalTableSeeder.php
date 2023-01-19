<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = ['Pemekaran','Tapal Batas', 'PAW', 'Pemilukada', 'Pileg', 'Pilpres'];
        foreach ($values as $key => $value) {
          DB::table('hal')->insert([
            'nama' => $value,
          ]);
        }
    }
}
