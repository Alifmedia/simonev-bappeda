<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisPeraturanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $values = ['Undang-Undang','Qanun', 'Pergub', 'Permen', 'Keppres'];
        foreach ($values as $key => $value) {
          DB::table('jenis_peraturan')->insert([
            'nama' => $value,
          ]);
        }
    }
}
