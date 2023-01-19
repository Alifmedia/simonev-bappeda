<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AspekSoal;
use App\Models\Subindikator;
use App\Models\JawabanSubinKecamatan;
use App\Models\Umum;
use Auth;

class PenggunaIndikatorKecamatanController extends Controller
{
    


    //TAMPILKAN ASPEK/PROGRES ASPEK DENGAN NILAI YANG SUDAH ADA
    public function tampilTema()
    {

      //SQL-DB METODE ELOQUENT

      //DAPATKAN $kecamatan_id, mulai dari MODEL UMUM-kolom GAMPONG maka relating ke MODEL KEMUKIMAN dan KECAMATAN. Pilih Id kecamatan yang sama dengan Id kecamatan domisili si user yang Login

      $kec_id = Umum::with(['gampong.kemukiman.kecamatan'])
                    ->find(session('umum_atau_administrator_id'))->gampong->kemukiman->kecamatan->id;


       //dd($kec_id);

      //DENGAN MODAL DATA $kec_id DIATAS MAKA DAPATKAN DATA JAWABAN SOAL KECAMATAN DAN JAWABANNYA, mulai dari MODEL ASPEKSOAL maka relating ke MODEL SUBINDIKATOR dan JAWABANSOALKECAMATAN maka dapatkan jawaban dan soalnya.                                                          
      // $data = AspekSoal::with([
      //                      'Subindikator.JawabanSubinKecamatan'=>function($q)use($kec_id)
      //                                                                 {$q->where('kecamatan_id',$kec_id);},
      //                      'Subindikator.JawabanSubinKecamatan'                                     
                                                   
      //                          ])->get();

     


       $data = AspekSoal::all();

      //TAMPILKAN DATA PER ASPEK SOAL DAN PROGRES-NYA DAN DISIMPAN DI ARRAY DULU
      // foreach ($data as $key => $value) 
      // {

      //   $progress = 0;

      //   foreach ($value->Subindikator as $i => $Subindikator) 
      //   {
      //    // $bobot = $Subindikator->jawabanSubinKecamatan->isNotEmpty() ? $Subindikator->jawabanSubinKecamatan[0]->jawaban->bobot:0;

      //     //$progress += $bobot;
      //   }

      //   $value->jmlsoal  = count($value->Subindikator);

      //   //$value->progress = $progress / count($value->Subindikator);
      // }

      // dd($data);

      //LEMPARKAN KE VIEW
      return view('view_pengguna_kecamatan.pengguna_indikator_kecamatan')->with('data', $data);
                                                                         //->with('progress', $value->progress);
    }

    

    // public function survey($id)
    // {
    //   $kec_id = Umum::with(['gampong.kemukiman.kecamatan'])->find(session('umum_atau_administrator_id'))
    //                                                              ->gampong->kemukiman->kecamatan->id;



    //   $data = AspekSoal::where('aspek_id', $id)->with(['subindikator.jawabanSubinKecamatan'=>function($q)use($kec_id)
    //                                                                                         {
    //                                                                                          $q->where('kecamatan_id'            ,$kec_id);
    //                                                                                         },
    //                                                     'subindikator.jawaban'


    //                                                    ]
    //                                                  )->firstOrFail();
    //                                                    // ->get();
    //   // dd($data->soal[0]);
    //   return view('view_pengguna_kecamatan.pengguna_indikator_kecamatan_survey')->with('data', $data);
    // }



    //  public function saveSurvey(Request $req, $id)
    // {

    //     $req->validate
    //     ([
    //       'jawaban.*' => 'required|integer',
    //     ]);

    //     $kecamatan_id = Umum::with(['gampong.kemukiman.kecamatan'])
    //                                 ->find(session('umum_atau_administrator_id'))
    //                                 ->gampong->kemukiman->kecamatan->id;


    //     $soal = $req->soal ? $req->soal : [];
        

    //     foreach ($soal as $key => $value) 
    //     {
    //       JawabanSubinKecamatan::updateOrCreate(
    //                                             [
    //                                              'kecamatan_id' => $kecamatan_id, 
    //                                              'subin_id'      => $value,
    //                                             ],
    //                                             [
    //                                               'jawaban_id' => $req->jawaban[$key],
    //                                             ]
    //                                           );
    //     }

    //     return redirect()->route('pengguna.indikator_kecamatan')->with('success','Data berhasil disimpan');

    // }



//MENGAMBIL DATA BOBOT DARI 
    // public function hasilSurvey()
    // {

    //   //MENDAPATKAN ID dari Kecamatan Penilai
    //   $kecamatan_id = Umum::with(['gampong.kemukiman.kecamatan'])
    //                       ->find(session('umum_atau_administrator_id'))
    //                       ->gampong->kemukiman->kecamatan->id;


    //   $data = AspekSoal::with(['subindikator.jawabanSubinKecamatan'=> function($q)use($kecamatan_id)
    //                                                         {
    //                                                           $q->where('kecamatan_id', 
    //                                                                     $kecamatan_id
    //                                                                   );
    //                                                         }, 
    //                           'subindikator.jawabanSubinKecamatan.jawaban'
    //                          ]
    //                         )->get();


    //   $data->totalhasil=0;

    //   foreach ($data as $key => $value) 
    //   {
        
    //     $hasil = 0;

    //     foreach ($value->soal as $i => $soal) 
    //     {
    //       $bobot  = $Subindikator->jawabanSubinKecamatan->isNotEmpty() ? 
    //                 $Subindikator->jawabanSubinKecamatan[0]->jawaban->bobot:0;

    //       $hasil += $bobot;
    //     }

    //     $value->jmlsoal  = count($value->soal);

    //     $value->subhasil   = $hasil; 

    //     $data->totalhasil=$data->totalhasil+$value->subhasil;

        
    //   }

      
    //   // $data = AspekSoal::all();
    //   return view('view_pengguna_kecamatan.pengguna_indikator_kecamatan_hasil')->with('data', $data);
    // }


    



    
}
