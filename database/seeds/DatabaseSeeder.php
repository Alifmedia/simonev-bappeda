<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
          // BagianTableSeeder::class,
          // HalTableSeeder::class,
          // SatuanKerjaTableSeeder::class,
          // StatusKonsultasiTableSeeder::class,
          // UnsurTableSeeder::class,
          // KabupatenTableSeeder::class,
          // KecamatanTableSeeder::class,
          // KemukimanTableSeeder::class,
          // GampongTableSeeder::class,
          UsersTableSeeder::class,

          // SektoralTableSeeder::class,
            // KonsultasiTableSeeder::class,
          // RuangTableSeeder::class,
          // PemangkuTableSeeder::class,
          // JenisPeraturanTableSeeder::class,
          // SoalTableSeeder::class,
        ]);
    }
}
