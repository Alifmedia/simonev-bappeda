<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\Konsultasi;

class KonsultasiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 25; $i++) {
          $hal = rand(1,6);
          $sektoral = rand(1,3);

          $hari_ini = Carbon::now('Asia/Jakarta');
          $jml_konsultasi_hari_ini = Konsultasi::whereDate('created_at', $hari_ini)
                                               ->orderBy('created_at', 'desc')
                                               ->orderBy('id', 'desc')
                                               ->first();

          $jml_konsultasi_hari_ini = $jml_konsultasi_hari_ini ? substr($jml_konsultasi_hari_ini->no_registrasi, 12) : -1;

          $no_registrasi = str_pad($hal,2,'0',STR_PAD_LEFT)
                          .str_pad($sektoral,2,'0',STR_PAD_LEFT)
                          .$hari_ini->format('dmY')
                          .str_pad(((int)$jml_konsultasi_hari_ini)+1,4,'0',STR_PAD_LEFT);

          DB::table('konsultasi')->insert([
            'sektoral_id' => $sektoral,
            'hal_id' => $hal,
            'umum_id' => 1,
            'no_registrasi' => $no_registrasi,
            'risalah' => Str::random(30),
            'created_at' => Carbon::now('Asia/Jakarta'),
          ]);

          DB::table('jurnal_konsultasi')->insert([
            'konsultasi_id' => ($i+1),
            'status_konsultasi_id' => 1,
            'waktu' => '2019-08-30 04:36:00',
            'jumlah_delegasi' => rand(10,15),
          ]);
        }
    }
}
