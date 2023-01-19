<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemaSoal;
use App\Models\Soal;
use App\Models\JawabanSoalKecamatan;
use App\Models\Kecamatan;
use App\Models\Umum;
use App\Models\Jawaban;
use Auth;

class PenggunaKecamatanController extends Controller
{
    



    public function tampilTema()
    {
      $kecamatan_id = Umum::with(['gampong.kemukiman.kecamatan'])
                            ->find(session('umum_atau_administrator_id'))->gampong->kemukiman->kecamatan->id;

      //dd($kecamatan_id);

      //Variabel $DATA Menampung semua RECORD/ROW TEMASOAl dan SOAL serta sebahagian RECORD/ROW JAWABANSOALKECAMATAN yang memenuhi dan semua RERCORD/ROW JAWABAN                           
      $data = TemaSoal::with(['soal.jawabanSoalKecamatan'=>function($q)use($kecamatan_id)
                                                           {
                                                            $q->where('kecamatan_id',$kecamatan_id);
                                                           }, 
                              'soal.jawabanSoalKecamatan.jawaban',
                              'soal.jawabanSoalKecamatan.kecamatan'
                             ]
                             )->get();

      //untuk pengaksesan data tertentu,$DATA mendelegasikan pada Objek $VALUE 
      foreach ($data as $key => $value) 
      {

        $progress = 0;

        foreach ($value->soal as $i => $soal) 
        {
          $bobot= ($soal->jawabanSoalKecamatan->isNotEmpty() ? $soal->jawabanSoalKecamatan[0]->jawaban->bobot:0)*($soal->bobot/100);
          $progress += $bobot;
        }

        //membuat variabel jmlsoal untuk menghitung jumlah soal/indikator per tema/aspek
        $value->jmlsoal  = count($value->soal);

        //membuat variabel progress untuk menghitung persentase progres
        $value->progress = $progress /count($value->soal);
      }

      // dd($data);

      
      return view('view_pengguna_kecamatan.pengguna_kecamatan')->with('data', $data)
                                                               ->with('progress', $value->progress);
    }

    

    //TAMPILKAN SEMUA INDIKATOR DARI ASPEK/TEMA YANG DIPILIH
    public function survey($id)
    {
      $kecamatan_id = Umum::with(['gampong.kemukiman.kecamatan'])
                          ->find(session('umum_atau_administrator_id'))
                          ->gampong->kemukiman->kecamatan->id;

      $data = TemaSoal::where('id', $id)->with(['soal.jawaban', 
                                                'soal.jawabanSoalKecamatan'=>function($q)use($kecamatan_id)
                                                                    {
                                                                      $q->where('kecamatan_id',$kecamatan_id);
                                                                    }
                                                ])->firstOrFail();
      // dd($data->soal[0]);
      return view('view_pengguna_kecamatan.pengguna_kecamatan_survey')->with('data', $data);
    }



     public function saveSurvey(Request $req, $id)
    {

        $req->validate
        ([
          'jawaban.*' => 'required|integer',
          'dokumen.*' => 'nullable|file|mimes:pdf'
        ]);

        $kecamatan_id = Umum::with(['gampong.kemukiman.kecamatan'])
                                    ->find(session('umum_atau_administrator_id'))
                                    ->gampong->kemukiman->kecamatan->id;


                                      //dd($kecamatan_id);
        // $file = $req->dokumen;

        // $name = time().uniqid().'.'.$file->getClientOriginalExtension();
        // $file->move(public_path()."/uploads/", $name);

        $soal = $req->soal ? $req->soal : [];
        

        foreach($soal as $key => $value) 
        {

        // $data = new KonsultasiTersurat;
        // $data->sektoral_id   = $req->sektoral;
        // $data->umum_id       = session('umum_atau_administrator_id');
        // $data->hal_id        = $req->hal;
        // $data->risalah       = $req->risalah;
        // $data->email         = $req->email;
        // $data->lokasi_file   = $name;
        // $data->status_id     = 1;
        // $data->no_registrasi = 'T'.$no_registrasi;
        // $data->save();


          JawabanSoalKecamatan::updateOrCreate(
                                                [
                                                 'kecamatan_id' => $kecamatan_id, 
                                                 'soal_id'      => $value
                                                ],
                                                [
                                                  'jawaban_id' => $req->jawaban[$key],
                                                  'dokumen'    => $req->dokumen[$key]
                                                ]
                                              );
        }

        return redirect()->route('pengguna.kecamatan')->with('success','Data berhasil disimpan');

    }



//MENGAMBIL DATA BOBOT DARI 
    public function hasilSurvey()
    {

      //MENDAPATKAN ID dari Kecamatan Penilai
      $kecamatan_id = Umum::with(['gampong.kemukiman.kecamatan'])
                          ->find(session('umum_atau_administrator_id'))
                          ->gampong->kemukiman->kecamatan->id;


      $data = TemaSoal::with(['soal.jawabanSoalKecamatan'=> function($q)use($kecamatan_id)
                                                            {
                                                              $q->where('kecamatan_id', 
                                                                        $kecamatan_id
                                                                      );
                                                            }, 
                              'soal.jawabanSoalKecamatan.jawaban'
                             ]
                            )->get();


      $data->totalhasil=0;

      foreach ($data as $key => $value) 
      {
        
        $hasil = 0;

        foreach ($value->soal as $i => $soal) 
        {
          $bobot=$soal->jawabanSoalKecamatan->isNotEmpty()?$soal->jawabanSoalKecamatan[0]->jawaban->bobot:0;

          $hasil += $bobot;
        }

        $value->jmlsoal  = count($value->soal);

        $value->subhasil   = $hasil; 

        $data->totalhasil=$data->totalhasil+$value->subhasil;
        
      }

      

      // $data = TemaSoal::all();
      return view('view_pengguna_kecamatan.pengguna_kecamatan_hasil')->with('data', $data);
    }


    



    
}
