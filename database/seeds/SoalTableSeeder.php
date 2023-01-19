<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SoalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for ($i=0; $i < 6; $i++) {
        DB::table('tema_soal')->insert([
          'tema' => 'Tema Soal '.$i,
          'bobot'=> $i
        ]);
        for ($j=0; $j < 10; $j++) {
          DB::table('soal')->insert([
            'tema_soal_id' => $i+1,
            'soal' => 'Pertanyaan Soal No '.$j,
          ]);
        }
      }

      for ($i=0; $i < 15; $i++) {
        DB::table('jawaban')->insert([
          'jawaban' => 'Jawaban '.$i,
          'bobot' => rand(0,10)*10,
        ]);
      }

      for ($i=0; $i < 60; $i++) {
        for ($j=0; $j < 4; $j++) {
          DB::table('jawaban_soal')->insert([
            'soal_id' => $i+1,
            'jawaban_id' => $j+1,
          ]);
        }
      }
    }
}
