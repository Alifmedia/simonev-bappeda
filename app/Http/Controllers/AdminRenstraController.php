<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;


//use Illuminate\Database\Eloquent\Builder;
use App\Models\Periode;
use App\Models\Hal;
use App\Models\Bagian;
use App\Models\Sektoral;
use App\Models\UmumSektoral;
use App\Models\SatuanKerja;
use App\Models\Unsur;

use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kemukiman;
use App\Models\Gampong;
use App\Models\Dusun;


use App\Models\Renstra;
use App\Models\Tujuan;
use App\Models\Renssasar;
use App\Models\Renssasarprog;
use App\Models\Renssasarprogkeg;
use App\Models\Indikatortujuan;
use App\Models\Indikatorrenssasar;
use App\Models\Indikatorrenssasarprog;
use App\Models\Indikatorrenssasarprogkeg;





use App\Models\Konsultasi;
use App\Models\Item;
use App\Models\JurnalKonsultasi;
use App\Models\Administrator;

use App\Models\Terverivikasi;
use App\Models\Terjadwal;
use App\Models\Terekap;

use App\Models\Tahapan;
use App\Models\Ruang;
use App\Models\Pemangku;

use Carbon\Carbon;
use PDF;




class AdminRenstraController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('level:umum');
    }


    public function setujuopd(Request $req)
    {


      //$filter['status']   = StatusKonsultasi::all();
      $periode            = Periode::all(); 
      $filter['sektoral'] = Sektoral::all();
      $filter['hal']      = Hal::all();
      $filter['unsur']    = Unsur::all();
      $filter['bagian']   = Bagian::all();
      //$filter['dusun']     = [];

      
      
//carilah semua KEGIATAN/GAMPONG YANG TELAH DIMASUKKAN KEDALAM RENSSASARPROGKEG YANG MANA UMUM_ID OPD nya adalah sama dengan session
      $data = Tujuan::with('indikatortujuan.renssasar.indikatorrenssasar.renssasarprog.indikatorrenssasarprog.renssasarprogkeg'
                          )->whereHas('renstra.sektoral')->get();



      //dd($data);
      // if ($req->sektoral) 
      // {
      //    $filter['kecamatan'] = Kecamatan::where('kabupaten_id', $req->kabupaten)->get();
      // }
      // if ($req->kecamatan) 
      // {
      //    $filter['kemukiman'] = Kemukiman::where('kecamatan_id', $req->kecamatan)->get();
      //  }
      //  if ($req->kemukiman) 
      // {
      //    $filter['gampong'] = Gampong::where('kemukiman_id', $req->kemukiman)->get();
      //  }
      //    if ($req->kemukiman) 
      // {
      //    $filter['dusun'] = Dusun::where('gampong_id', $req->gampong)->get();
      //  }
                                    

      // if ($req->kabupaten) 
      //{
      //  $kecamatan = Kecamatan::where('kabupaten_id', $req->kabupaten)->get();

        // $data = $data->whereHas('gampong.kemukiman.kecamatan', function($q)use($req)
        // {
        //        $q->where('kabupaten_id', $req->kabupaten);
        // }
    //  }
       


    //    if ($req->kecamatan) 
    //   {
    //     $kemukiman = Kemukiman::where('kecamatan_id', $req->kecamatan)->get();

    //     $data = $data->whereHas('gampong.kemukiman', function($q)use($req)
    //      {
    //        $q->where('kecamatan_id', $req->kecamatan);
    //      }

    //   }

    //   if ($req->kemukiman) 
    //   {
    //     $gampong = Gampong::where('kemukiman_id', $req->kemukiman)->get();

    //      $data = $data->whereHas('gampong', function($q)use($req)
    //      {
    //       $q->where('kemukiman_id', $req->kemukiman);
    //      }

    //   }

    //    if ($req->gampong) 
    //   {
    //     $data = $data->where('gampong_id', $req->gampong);
    //   }


    // }
    

      // if ($req->status_konsultasi) 
      // {
      //   $data = $data->whereHas('jurnalKonsultasi', function($q)use($req)
      //                                              {
      //                                               $q->where('status_konsultasi_id', $req->status_konsultasi);
      //                                              }
      //                           );
      // }

    

      // if ($req->search) 
      // {
      //   $data = $data->where('no_registrasi', 'LIKE' ,'%'.$req->search.'%')
      //                ->orWhere('risalah', 'LIKE' ,'%'.$req->search.'%');
      // }



      if ($req->sektoral) 
       {
         $data = $data->where('sektoral_id', $req->sektoral);
                                  
       }



      if ($req->hal) 
      {
        $data = $data->where('hal_id', $req->hal);
        
      }

      if ($req->unsur) 
      {
        $data = $data->where('unsur_id', $req->unsur);
       
      }


       if ($req->bagian) 
      {
        $data = $data->where('bagian_id', $req->bagian);
       
      }

   

   

      // $pagination = $req->pagination ? (int)$req->pagination : 15;

      // if ($pagination) 
      // {
      //   $data = $data->orderBy('created_at', 'desc')->paginate($pagination);
      // } 
      // else 
      // {
      //   $data = $data->orderBy('created_at', 'desc')->get();
      // }


      // if ($req->export) 
      // {
      //   set_time_limit(6000);
      //   $pdf = PDF::loadView('view_pdf.konsultasi_permohonan', $data);

      //   return $pdf->download('konsultasi_permohonan.pdf');
      // }


      return view('view_admin_renstra.renstra_setujuopd')->with('filter', $filter)
                                              ->with('periode', $periode)
                                              // ->with('hal', $hal)
                                              // ->with('unsur', $unsur)
                                               ->with('data', $data);
    }





    public function rekapitulasi(Request $req)
    {


      //$filter['status']   = StatusKonsultasi::all();

      $filter['periode'] = Periode::all();
      $filter['hal']      = Hal::all();
      $filter['unsur']    = Unsur::all();
      $filter['bagian']   = Bagian::all();
      //$filter['dusun']     = [];

      
      

      
      $data = Konsultasi::all();

      // if ($req->sektoral) 
      // {
      //    $filter['kecamatan'] = Kecamatan::where('kabupaten_id', $req->kabupaten)->get();
      // }
      // if ($req->kecamatan) 
      // {
      //    $filter['kemukiman'] = Kemukiman::where('kecamatan_id', $req->kecamatan)->get();
      //  }
      //  if ($req->kemukiman) 
      // {
      //    $filter['gampong'] = Gampong::where('kemukiman_id', $req->kemukiman)->get();
      //  }
      //    if ($req->kemukiman) 
      // {
      //    $filter['dusun'] = Dusun::where('gampong_id', $req->gampong)->get();
      //  }
                                    

      // if ($req->kabupaten) 
      //{
      //  $kecamatan = Kecamatan::where('kabupaten_id', $req->kabupaten)->get();

        // $data = $data->whereHas('gampong.kemukiman.kecamatan', function($q)use($req)
        // {
        //        $q->where('kabupaten_id', $req->kabupaten);
        // }
    //  }
       


    //    if ($req->kecamatan) 
    //   {
    //     $kemukiman = Kemukiman::where('kecamatan_id', $req->kecamatan)->get();

    //     $data = $data->whereHas('gampong.kemukiman', function($q)use($req)
    //      {
    //        $q->where('kecamatan_id', $req->kecamatan);
    //      }

    //   }

    //   if ($req->kemukiman) 
    //   {
    //     $gampong = Gampong::where('kemukiman_id', $req->kemukiman)->get();

    //      $data = $data->whereHas('gampong', function($q)use($req)
    //      {
    //       $q->where('kemukiman_id', $req->kemukiman);
    //      }

    //   }

    //    if ($req->gampong) 
    //   {
    //     $data = $data->where('gampong_id', $req->gampong);
    //   }


    // }
    

      // if ($req->status_konsultasi) 
      // {
      //   $data = $data->whereHas('jurnalKonsultasi', function($q)use($req)
      //                                              {
      //                                               $q->where('status_konsultasi_id', $req->status_konsultasi);
      //                                              }
      //                           );
      // }

    

      // if ($req->search) 
      // {
      //   $data = $data->where('no_registrasi', 'LIKE' ,'%'.$req->search.'%')
      //                ->orWhere('risalah', 'LIKE' ,'%'.$req->search.'%');
      // }



      if ($req->sektoral) 
       {
         $data = $data->where('sektoral_id', $req->sektoral);
                                  
       }



      if ($req->hal) 
      {
        $data = $data->where('hal_id', $req->hal);
        
      }

      if ($req->unsur) 
      {
        $data = $data->where('unsur_id', $req->unsur);
       
      }


       if ($req->bagian) 
      {
        $data = $data->where('bagian_id', $req->bagian);
       
      }

   

   

      // $pagination = $req->pagination ? (int)$req->pagination : 15;

      // if ($pagination) 
      // {
      //   $data = $data->orderBy('created_at', 'desc')->paginate($pagination);
      // } 
      // else 
      // {
      //   $data = $data->orderBy('created_at', 'desc')->get();
      // }


      // if ($req->export) 
      // {
      //   set_time_limit(6000);
      //   $pdf = PDF::loadView('view_pdf.konsultasi_permohonan', $data);

      //   return $pdf->download('konsultasi_permohonan.pdf');
      // }


      return view('view_admin_renstra.renstra_rekapitulasi')->with('filter', $filter)
                                              // ->with('bagian', $bagian)
                                              // ->with('hal', $hal)
                                              // ->with('unsur', $unsur)
                                               ->with('data', $data);
    }





//     //REKAM MEDIK
//     public function tujuansasaran(Request $req)
//     {
//       $periode        = Periode::all(); 

//       $data = Renstra::with(['sektoral'=>function($query)
//                                          {
//                                           $query->where('umum_id', session('umum_atau_administrator_id'));
//                                          }
//                             ]
//                            )->get();


//       $data_tujuan = Tujuan::with(['renstra.sektoral'=>function($query)
//                                          {
//                                           $query->where('umum_id', session('umum_atau_administrator_id'));
//                                          }
//                             ]
//                            )->get();




//      // $id     = $data->id;
//      // $tujuan = $data->renstra_tujuan;
                                   

//     // dd($tujuan);
     

     
//       // $pagination = $req->pagination ? (int)$req->pagination : 15;

//       // if ($pagination) 
//       // {
//       //   $data = $data->orderBy('created_at', 'desc')->paginate($pagination);
//       // } 
//       // else 
//       // {
//       //   $data = $data->orderBy('created_at', 'desc')->get();
//       // }


//       // if ($req->export) 
//       // {
//       //   set_time_limit(6000);
//       //   $pdf = PDF::loadView('view_pdf.konsultasi_permohonan', $data);

//       //   return $pdf->download('konsultasi_permohonan.pdf');
//       // }


//       return view('view_karyawan_renstra.renstra_tujuansasaran')->with('periode', $periode)
//                                                                // ->with('id', $id)
//                                                               //  ->with('tujuan', $tujuan)
//                                                                 ->with('data', $data)
//                                                                  ->with('data_tujuan', $data_tujuan);
//     }






            
//      public function createTujuansasaran()
//     {
//       $bagian        = Bagian::all(); 
//       $unsur         = Unsur::all();
//       $hal           = Hal::all();
//       $periode       = Periode::all();
//       $sektoral      = Sektoral::where('umum_id',session('umum_atau_administrator_id'))->get();

//       $sasaran       = Renssasar::all();

//       //dd($sektoral);

//      return view('view_karyawan_renstra.renstra_tujuansasaran_add')->with('sasaran', $sasaran)
//                                                                     ->with('bagian', $bagian)
//                                                                     ->with('unsur', $unsur)
//                                                                     //->with('hal', $hal)
//                                                                     ->with('periode', $periode)
//                                                                     ->with('sektoral', $sektoral);
                                         
//     }







//     //SETELAH KLIK MENU SIMPAN, PASSING PARAMETER2 TAMBAH DAN DIVALIDASI SERTA DISIMPAN
//     public function saveTujuansasaran(Request $req)
//     {
//       $req->validate([
           
//         //RENSTRA
//        //'sektoral'              => 'required|integer',
//          'periode'               => 'required|integer',
        
//         //TUJUAN
//         'tujuan_nama'            => 'required|string',
    
//         //INDIKATOR   
//         'indikator.*'            => 'required|string',
//         'satuan.*'               => 'required|string',
//         'nilaiawal.*'            => 'required|string',

//         //TARGET
//         //'tahun1.*'               => 'required|integer',
//         'target1.*'              => 'required|string',
        
//         //'tahun2.*'               => 'required|integer',
//         'target2.*'              => 'required|string',

//        // 'tahun3.*'               => 'required|integer',
//         'target3.*'              => 'required|string',

//        // 'tahun4.*'               => 'required|integer',
//         'target4.*'              => 'required|string',

        
       
       
//       ]);


//     // $hari_ini = Carbon::now('Asia/Jakarta');

//     // //JUMLAH REKAM MEDIK HARI INI
//     // $jml_konsultasi_hari_ini = Konsultasi::whereDate('created_at', $hari_ini)
//     //                                      ->orderBy('created_at', 'desc')
//     //                                      ->orderBy('id', 'desc')
//     //                                      ->first();

//     // $jml_konsultasi_hari_ini = $jml_konsultasi_hari_ini ? substr($jml_konsultasi_hari_ini->no_registrasi, 12) : -1;

//     // $no_registrasi = str_pad(2,2,'0',STR_PAD_LEFT)
//     //                 .str_pad(2,2,'0',STR_PAD_LEFT)
//     //                 .$hari_ini->format('dmY')
//     //                 .str_pad(((int)$jml_konsultasi_hari_ini)+1,4,'0',STR_PAD_LEFT);


      
//       //SIMPAN KE TABEL RENSTRA DENGAN ID(PRIMARY KEY) NYA AUTO INCREMENT
//       // $data_renstra                = new Renstra;
//       // $data_renstra->sektoral_id   = 18;
//       // $data_renstra->rpd_id        = 1;
//       // $data_renstra->periode_id    = $req->periode;
//       // $data_renstra->save();

      
       
//       //$renstra_id  =$data_renstra->id;
     
//      //SIMPAN KE TABEL TUJUAN DENGAN ID(PRIMARY KEY) NYA AUTO INCREMENT
//       $data_tujuan                       = new Tujuan;
//       $data_tujuan->renstra_id           = 1;
//       $data_tujuan->tujuan_nama          = $req->tujuan_nama;
//       $data_tujuan->save();
      


//       $tujuan_id     =$data_tujuan->id;
//       $data_indikator=$req->indikator ? $req->indikator :[];

//       //SIMPAN KE TABEL INDIKATOR DENGAN ID(PRIMARY KEY) NYA AUTO INCREMENT
//       foreach($data_indikator as $key => $value)
//       {
//       $data_indikator                                   = new Indikatortujuan;
//       $data_indikator->tujuan_id                        = $tujuan_id;
//       $data_indikator->indikatortujuan_nama             = $req->indikator[$key];
//       $data_indikator->indikatortujuan_satuan           = $req->satuan[$key];
//       $data_indikator->indikatortujuan_nilaiawal        = $req->nilaiawal[$key];

//       $data_indikator->indikatortujuan_tahun1           = 2023;
//       $data_indikator->indikatortujuan_target1          = $req->target1[$key];
//       $data_indikator->indikatortujuan_tahun2           = 2024;
//       $data_indikator->indikatortujuan_target2          = $req->target2[$key]; 
//       $data_indikator->indikatortujuan_tahun3           = 2025;
//       $data_indikator->indikatortujuan_target3          = $req->target3[$key]; 
//       $data_indikator->indikatortujuan_tahun4           = 2026;
//       $data_indikator->indikatortujuan_target4          = $req->target4[$key];     

//       $data_indikator->save();
      
    
//       }



//       //$indikator_id=$data_indikator->id;
//      // $data_targetindikator=$req->tahun ? $req->tahun :[];

//       //foreach($data_targetindikator as $key => $value)
//       //{
//      // $data_targetindikator                             = new Targetindikator;
//       //$data_targetindikator->indikatortujuan_id         = $indikator_id;
//       //$data_targetindikator->targetindikator_tahun1      = $req->tahun1;
//      // $data_targetindikator->targetindikator_target1     = $req->target1;
//       //$data_targetindikator->targetindikator_tahun2      = $req->tahun2;
//       //$data_targetindikator->targetindikator_target2     = $req->target2; 
//       //$data_targetindikator->targetindikator_tahun3      = $req->tahun3;
//       //$data_targetindikator->targetindikator_target3     = $req->target3; 
//      // $data_targetindikator->targetindikator_tahun4      = $req->tahun4;
//      // $data_targetindikator->targetindikator_target4     = $req->target4;      
//      // $data_targetindikator->save();
//      // }



//     //KETIKA DATA KONSULTASI SUDAH DISIMPAN KE TABEL, MAKA DIDAPATILAH ID KONSULTASI 
//      // $konsultasi_id              = $data->id;

//     //SIMPAN KE TABEL JURNALKONSULTASI
//     //  $data                       = new JurnalKonsultasi;
//     //$data->id                   = AI(BELUM DIKETAHUI SEBELUM DIINPUTKAN KE TABEL)
//     //  $data->konsultasi_id        = $konsultasi_id;
//     //  $data->status_konsultasi_id = 1;
      
//    //   $data->save();


//       // //SIMPAN KE TABEL DOKUMEN
//       // if($req->hasfile('dokumen'))
//       // {
//       //     foreach($req->file('dokumen') as $file)
//       //     {
//       //       $name = time().uniqid().'.'.$file->getClientOriginalExtension();

//       //       $file->move(public_path()."/uploads/", $name);

//       //       $data                = new Dokumen;
//       //       $data->konsultasi_id = $konsultasi_id;
//       //       $data->nama          = $file->getClientOriginalName();
//       //       $data->lokasi_file   = $name;
//       //       $data->save();
//       //     }
//       // }

//       return redirect()->route('karyawan.renstra.tujuansasaran')->with('success', 'PENAMBAHAN TUJUAN, SASARAN DAN TARGET SASARAN RENSTRA berhasil');
//     }




// //PENGEDITAN TUJUAN 
//     public function editTujuansasaran(Request $req, $renstra_id, $tujuan_id)
//     {
//       $periode       = Periode::all();
//       $bagian        = Bagian::all(); 
//       $unsur         = Unsur::all();
//       $hal           = Hal::all();
//       $sektoral      = Sektoral::where('umum_id',session('umum_atau_administrator_id'))->get();



     

//       $data = Tujuan::where('id',$tujuan_id)->get();

//      //dd($data);

//      return view('view_karyawan_renstra.renstra_tujuansasaran_edit')->with('data', $data)
//                                                                     ->with('bagian', $bagian)
//                                                                     ->with('unsur', $unsur)
//                                                                     ->with('hal', $hal)
//                                                                     ->with('periode', $periode)
//                                                                     ->with('renstra_id', $renstra_id)
//                                                                     ->with('tujuan_id', $tujuan_id)
//                                                                     ->with('sektoral', $sektoral);


    
     
//     }






//     public function updateTujuansasaran(Request $req, $rens_id, $tuju_id)
//     {
  
//         $req->validate(
//                         [

//          //RENSTRA
//        //'sektoral'              => 'required|integer',
//         'periode'               => 'required|integer',
        
//         //TUJUAN
//         'tujuan_nama'            => 'required|string',
    
//         //INDIKATOR   
//         'indikator.*'            => 'required|string',
//         'satuan.*'               => 'required|string',
//         'nilaiawal.*'            => 'required|string',
 
//         //TARGET
//         //'tahun1.*'               => 'required|integer',
//         'target1.*'              => 'required|string',
        
//         //'tahun2.*'               => 'required|integer',
//         'target2.*'              => 'required|string',

//        // 'tahun3.*'               => 'required|integer',
//         'target3.*'              => 'required|string',

//        // 'tahun4.*'               => 'required|integer',
//         'target4.*'              => 'required|string',
                     
//                       ]
//                     );



//         // $hari_ini                = Carbon::now('Asia/Jakarta');
//         // $jml_konsultasi_hari_ini = Konsultasi::whereDate('created_at', $hari_ini)
//         //                                      ->orderBy('created_at', 'desc')
//         //                                      ->orderBy('id', 'desc')
//         //                                      ->first();

       


// //SIMPAN KE TABEL RENSTRA DENGAN ID(PRIMARY KEY) NYA AUTO INCREMENT
//       $data_renstra                = Renstra::findOrFail($rens_id);
//       $data_renstra->sektoral_id   = 18;
//       $data_renstra->rpd_id        = 1;
//       $data_renstra->periode_id    = $req->periode;
//       $data_renstra->save();

      
       
//       $renstra_id  =$data_renstra->id;
     
//      //SIMPAN KE TABEL TUJUAN DENGAN ID(PRIMARY KEY) NYA AUTO INCREMENT

     
//       $data_tujuan                       = Tujuan::findOrFail($tuju_id);
//       $data_tujuan->tujuan_nama          = $req->tujuan_nama;
//       $data_tujuan->save();
   
      


//       $data_indikator                     = $req->indikator ? $req->indikator :[];

//       //SIMPAN KE TABEL INDIKATOR DENGAN ID(PRIMARY KEY) NYA AUTO INCREMENT
//       foreach($data_indikator as $key => $value)
//       {
//       $data_indikator                                   = Indikatortujuan::findOrFail($tuju_id);
//       $data_indikator->indikatortujuan_nama             = $req->indikator[$key];
//       $data_indikator->indikatortujuan_satuan           = $req->satuan[$key];
//       $data_indikator->indikatortujuan_nilaiawal        = $req->nilaiawal[$key];
//       $data_indikator->indikatortujuan_tahun1           = 2023;
//       $data_indikator->indikatortujuan_target1          = $req->target1[$key];
//       $data_indikator->indikatortujuan_tahun2           = 2024;
//       $data_indikator->indikatortujuan_target2          = $req->target2[$key]; 
//       $data_indikator->indikatortujuan_tahun3           = 2025;
//       $data_indikator->indikatortujuan_target3          = $req->target3[$key]; 
//       $data_indikator->indikatortujuan_tahun4           = 2026;
//       $data_indikator->indikatortujuan_target4          = $req->target4[$key];     
//       $data_indikator->save();
      
    
//       }

//         return redirect()->route('karyawan.renstra.tujuansasaran')
//                          ->with('success', 'TUJUAN dan INDIKATOR berhasil diedit');
//     }






















// //TARGET SASARAN
// public function createSasaran($indikatortujuan_id)
//     {
//       //$filter["periode"]        = Periode::all(); 
//       $bagian        = Bagian::all(); 
//       $unsur         = Unsur::all();
//       $hal           = Hal::all();
//      // $sektoral      = Sektoral::where('umum_id',session('umum_atau_administrator_id'))->get();
     
//      $indikatortujuan = Indikatortujuan::where('id',$indikatortujuan_id)->get();
      
      

//      // $tujuan        = Tujuan::all();



//      return view('view_karyawan_renstra.renstra_sasaran_add')->with('bagian', $bagian)
//                                                       ->with('unsur', $unsur)
//                                                       ->with('hal', $hal)
//                                                       ->with('indikatortujuan', $indikatortujuan)
//                                                       ->with('indikatortujuan_id', $indikatortujuan_id);
//                                                      // ->with('sektoral', $sektoral);
                                         
//     }








//      //SETELAH KLIK MENU SIMPAN, PASSING PARAMETER2 TAMBAH DAN DIVALIDASI SERTA DISIMPAN
//     public function saveSasaran(Request $req, $indikatortujuan_id)
//     {
//       $req->validate([
           
   
                
//         //TUJUAN
//         //'tujuan'                 => 'required|integer',

//         //'indikatortujuan'       => 'nullable|integer',


//         //SASARAN
//         'renssasar_teks'         => 'required|string',
    


//         //INDIKATOR   
//         'indikator.*'            => 'required|string',
//         'satuan.*'               => 'required|string',
//         'nilaiawal.*'            => 'required|string',

//         //'tahun1.*'               => 'required|integer',
//         'target1.*'              => 'required|string',
        
//         //'tahun2.*'               => 'required|integer',
//         'target2.*'              => 'required|string',

//        // 'tahun3.*'               => 'required|integer',
//         'target3.*'              => 'required|string',

//        // 'tahun4.*'               => 'required|integer',
//         'target4.*'              => 'required|string',

        
       
       
//       ]);


//     // $hari_ini = Carbon::now('Asia/Jakarta');

//     // //JUMLAH REKAM MEDIK HARI INI
//     // $jml_konsultasi_hari_ini = Konsultasi::whereDate('created_at', $hari_ini)
//     //                                      ->orderBy('created_at', 'desc')
//     //                                      ->orderBy('id', 'desc')
//     //                                      ->first();

//     // $jml_konsultasi_hari_ini = $jml_konsultasi_hari_ini ? substr($jml_konsultasi_hari_ini->no_registrasi, 12) : -1;

//     // $no_registrasi = str_pad(2,2,'0',STR_PAD_LEFT)
//     //                 .str_pad(2,2,'0',STR_PAD_LEFT)
//     //                 .$hari_ini->format('dmY')
//     //                 .str_pad(((int)$jml_konsultasi_hari_ini)+1,4,'0',STR_PAD_LEFT);




//       //SIMPAN KE TABEL RENSTRA DENGAN ID(PRIMARY KEY) NYA AUTO INCREMENT
//       // $data_tujuan                = New Tujuan;
//       // $data_tujuan->sektoral_id   = 18;
//       // $data_tujuan->rpd_id        = 1;
//       // $data_tujuan->periode_id    = $req->periode;
//       // $data_tujuan->save();


      
//       //SIMPAN KE TABEL KONSULTASI DENGAN ID(PRIMARY KEY) NYA AUTO INCREMENT
//       $data_sasaran                          = New Renssasar;
//       //$data_sasaran->tujuan_id               = $req->tujuan;
//       $data_sasaran->indikatortujuan_id      = $indikatortujuan_id;
//       $data_sasaran->renssasar_teks          = $req->renssasar_teks;
//       $data_sasaran->save(); 


//         $renssasar_id=$data_sasaran->id;

//         //$renssasar_id=15;


//       $data_indikator=$req->indikator ? $req->indikator :[];

//       foreach($data_indikator as $key => $value)
//       {


//       $data_indikator                                      = New Indikatorrenssasar;
//       $data_indikator->renssasar_id                        = $renssasar_id;
//       $data_indikator->indikatorrenssasar_indikator        = $req->indikator[$key];
//       $data_indikator->indikatorrenssasar_satuan           = $req->satuan[$key];
//       $data_indikator->indikatorrenssasar_nilaiawal        = $req->nilaiawal[$key];
//       $data_indikator->indikatorrenssasar_tahun1           = 2023;
//       $data_indikator->indikatorrenssasar_target1          = $req->target1[$key];
//       $data_indikator->indikatorrenssasar_tahun2           = 2024;
//       $data_indikator->indikatorrenssasar_target2          = $req->target2[$key]; 
//       $data_indikator->indikatorrenssasar_tahun3           = 2025;
//       $data_indikator->indikatorrenssasar_target3          = $req->target3[$key]; 
//       $data_indikator->indikatorrenssasar_tahun4           = 2026;
//       $data_indikator->indikatorrenssasar_target4          = $req->target4[$key];     
//       $data_indikator->save();
//       }


//     //KETIKA DATA KONSULTASI SUDAH DISIMPAN KE TABEL, MAKA DIDAPATILAH ID KONSULTASI 
//      // $konsultasi_id              = $data->id;

//     //SIMPAN KE TABEL JURNALKONSULTASI
//     //  $data                       = new JurnalKonsultasi;
//     //$data->id                   = AI(BELUM DIKETAHUI SEBELUM DIINPUTKAN KE TABEL)
//     //  $data->konsultasi_id        = $konsultasi_id;
//     //  $data->status_konsultasi_id = 1;
      
//    //   $data->save();


//       // //SIMPAN KE TABEL DOKUMEN
//       // if($req->hasfile('dokumen'))
//       // {
//       //     foreach($req->file('dokumen') as $file)
//       //     {
//       //       $name = time().uniqid().'.'.$file->getClientOriginalExtension();

//       //       $file->move(public_path()."/uploads/", $name);

//       //       $data                = new Dokumen;
//       //       $data->konsultasi_id = $konsultasi_id;
//       //       $data->nama          = $file->getClientOriginalName();
//       //       $data->lokasi_file   = $name;
//       //       $data->save();
//       //     }
//       // }

//       return redirect()->route('karyawan.renstra.tujuansasaran')
//                        ->with('success', 'PENAMBAHAN SASARAN DAN INDIKATOR SASARAN berhasil');
//     }


// //PENGEDITAN TUJUAN 
//     public function editSasaran(Request $req, $indikatortujuan_id, $renssasar_id)
//     {
     
//       $bagian        = Bagian::all(); 
//       $unsur         = Unsur::all();
//       $hal           = Hal::all();
//       $sektoral      = Sektoral::where('umum_id',session('umum_atau_administrator_id'))->get();



     
//       $indikatortujuan   = Indikatortujuan::all();

//       $data = Renssasar::where('id',$renssasar_id)->get();

//      //dd($data);

//      return view('view_karyawan_renstra.renstra_sasaran_edit')->with('data', $data)
//                                                                     ->with('bagian', $bagian)
//                                                                     ->with('unsur', $unsur)
//                                                                     ->with('hal', $hal)
//                                                                     ->with('periode', $periode)
//                                                                     ->with('indikatortujuan',$indikatortujuan)
//                                                                     ->with('renssasar_id', $renssasar_id)
//                                                                     ->with('sektoral', $sektoral);


    
     
//     }






//     public function updateSasaran(Request $req, $renssasar_id)
//     {
  
//         $req->validate(
//                         [

//          //RENSTRA
//        //'sektoral'              => 'required|integer',
//         'indikatortujuan'        => 'required|integer',
        
//         //TUJUAN
//         'renssasar_teks'            => 'required|string',
    
//         //INDIKATOR   
//         'indikator.*'            => 'required|string',
//         'satuan.*'               => 'required|string',
//         'nilaiawal.*'            => 'required|string',
 
//         //TARGET
//         //'tahun1.*'               => 'required|integer',
//         'target1.*'              => 'required|string',
        
//         //'tahun2.*'               => 'required|integer',
//         'target2.*'              => 'required|string',

//        // 'tahun3.*'               => 'required|integer',
//         'target3.*'              => 'required|string',

//        // 'tahun4.*'               => 'required|integer',
//         'target4.*'              => 'required|string',
                     
//                       ]
//                     );



//         // $hari_ini                = Carbon::now('Asia/Jakarta');
//         // $jml_konsultasi_hari_ini = Konsultasi::whereDate('created_at', $hari_ini)
//         //                                      ->orderBy('created_at', 'desc')
//         //                                      ->orderBy('id', 'desc')
//         //                                      ->first();

       


// //SIMPAN KE TABEL RENSTRA DENGAN ID(PRIMARY KEY) NYA AUTO INCREMENT
//       // $data_tujuan                = Renstra::findOrFail($rens_id);
//       // $data_tujuan->sektoral_id   = 18;
//       // $data_tujuan->rpd_id        = 1;
//       // $data_tujuan->periode_id    = $req->periode;
//       // $data_tujuan->save();

      
       
//       // $tujuan_id  =$data_tujuan->id;
     
//      //SIMPAN KE TABEL TUJUAN DENGAN ID(PRIMARY KEY) NYA AUTO INCREMENT

     
//       $data_renssasar                       = Renssasar::findOrFail($renssasar_id);
//       $data_renssasar->indikatortujuan_id   = $req->indikatortujuan;
//       $data_renssasar->renssasar_teks       = $req->renssasar_teks;
//       $data_renssasar->save();
   
      


//       $data_indikator                     = $req->indikator ? $req->indikator :[];

//       //SIMPAN KE TABEL INDIKATOR DENGAN ID(PRIMARY KEY) NYA AUTO INCREMENT
//       foreach($data_indikator as $key => $value)
//       {
//       $data_indikator                                   = Indikatorrenssasar::findOrFail($renssasar_id);
//       $data_indikator->indikatorrenssasar_nama             = $req->indikator[$key];
//       $data_indikator->indikatorrenssasar_satuan           = $req->satuan[$key];
//       $data_indikator->indikatorrenssasar_nilaiawal        = $req->nilaiawal[$key];
//       $data_indikator->indikatorrenssasar_tahun1           = 2023;
//       $data_indikator->indikatorrenssasar_target1          = $req->target1[$key];
//       $data_indikator->indikatorrenssasar_tahun2           = 2024;
//       $data_indikator->indikatorrenssasar_target2          = $req->target2[$key]; 
//       $data_indikator->indikatorrenssasar_tahun3           = 2025;
//       $data_indikator->indikatorrenssasar_target3          = $req->target3[$key]; 
//       $data_indikator->indikatorrenssasar_tahun4           = 2026;
//       $data_indikator->indikatorrenssasar_target4          = $req->target4[$key];     
//       $data_indikator->save();
      
    
//       }

//         return redirect()->route('karyawan.renstra.tujuansasaran')
//                          ->with('success', 'SASARAN dan INDIKATOR berhasil diedit');
//     }















//    public function program(Request $req)
//    {


   

//       //$filter['status']   = StatusKonsultasi::all();
//         $filter['periode'] = Periode::all();
//       $filter['kabupaten'] = Kabupaten::all();
//       $filter['kecamatan'] = [];
//       $filter['kemukiman'] = [];
//       $filter['gampong']   = [];
     

//       if ($req->kabupaten) 
//       {
//        $filter['kecamatan'] = Kecamatan::where('kabupaten_id', $req->kabupaten)->get();
//       }

//       if ($req->kecamatan) 
//       {

//       $filter['kemukiman'] = Kemukiman::where('kecamatan_id', $req->kecamatan)->get();

//       }

//       // if ($req->kemukiman) 
//       // {
//       // $filter['gampong']   = Gampong::where('kemukiman_id', $req->kemukiman)->get();
//       // }



//        //$data = Gampong::with(['kemukiman.kecamatan.kabupaten']); 

       
//        $sasaran = Renssasar::all();

//        //$renssasar      = Renssasarprog::with(['renssasar.tujuan.renstra']);

       
//        // $tujuan = Tujuan::with(['renstra.sektoral'=>function($query)
//        //                                   {
//        //                                    $query->where('umum_id', session('umum_atau_administrator_id'));
//        //                                   }
//        //                      ],
                            
//        //                     )->get();

//         $data_program = Tujuan::with(['renstra.sektoral'=>function($query)
//                                          {
//                                           $query->where('umum_id', session('umum_atau_administrator_id'));
//                                          }
//                             ]
//                            )->get();





//        $data = Kemukiman::with(['kecamatan.kabupaten']);



//      // dd($program);

//       if ($req->search) 
//       {
//         $data = $data->where('kemukiman_kode', 'LIKE' ,'%'.$req->search.'%');
//                     // ->orWhere('risalah', 'LIKE' ,'%'.$req->search.'%');
//       }


       

//       // if ($req->kemukiman) 
//       // {
//       //   $data = $data->where('kecamatan_id',$req->kemukiman);
                                                        
                                                                     
//       //  } 

//         if ($req->kecamatan) 
//       {
//         $data = $data->whereHas('kecamatan', function($query)use($req)
//                                                                 {
//                                                                     $query->where('kabupaten_id',$req->kabupaten);
                                                        
//                                                                 } 
//                                                               );
//       } 

//       elseif ($req->kabupaten) 
//       {
//         $data = $data->whereHas('kecamatan.kabupaten', function($query)use($req)
//                                                                 {
//                                                                     $query->where('id',$req->kabupaten);
                                                        
//                                                                 } 
//                                                               );
//       } 



//       $pagination = $req->pagination ? (int)$req->pagination : 15;

//       if ($pagination) 
//       {
//         $data = $data->orderBy('id', 'asc')->paginate($pagination);
//       } 
//       else 
//       {
//         $data = $data->orderBy('id', 'asc')->get();
//       }
     
  

//       return view('view_karyawan_renstra.renstra_program')->with('filter', $filter)
//                                                           ->with('data_program', $data_program)
//                                                           ->with('sasaran', $sasaran)
//                                                           ->with('data', $data);
    
// }



// public function createProgram(Request $req, $id,$kemukiman_kode,$nama)
//     {
//       $bagian        = Bagian::all(); 
//       $unsur         = Unsur::all();
//       $hal           = Hal::all();
//       $sektoral      = Sektoral::where('umum_id',session('umum_atau_administrator_id'))->get();
//       $indikatorrenssasar    = Indikatorrenssasar::all();

//       $filter['kabupaten'] = Kabupaten::all();
//       $filter['kecamatan'] = [];
//       $filter['kemukiman'] = [];


//        if ($req->kabupaten) 
//       {
//        $filter['kecamatan'] = Kecamatan::where('kabupaten_id', $req->kabupaten)->get();
//       }

//       if ($req->kecamatan) 
//       {

//       $filter['kemukiman'] = Kemukiman::where('kecamatan_id', $req->kecamatan)->get();

//       }


     
//      $data = Kemukiman::all();


//      return view('view_karyawan_renstra.renstra_program_add')
//                                                      ->with('id', $id)
//                                                      ->with('kemukiman_kode', $kemukiman_kode)
//                                                      ->with('nama', $nama)
//                                                      ->with('data', $data)
//                                                      ->with('filter', $filter)
//                                                      ->with('bagian', $bagian)
//                                                      ->with('unsur', $unsur)
//                                                      ->with('hal', $hal)
//                                                      ->with('indikatorrenssasar', $indikatorrenssasar);
                                         
//     }






//      //SETELAH KLIK MENU SIMPAN, PASSING PARAMETER2 TAMBAH DAN DIVALIDASI SERTA DISIMPAN
//     public function saveProgram(Request $req ,$kemukiman_id)
//     {
//       $req->validate([
           
   
    
//         //SASARAN
//         'indikatorrenssasar_id'               => 'required|integer',

//          //PROGRAM
//        // 'program'             => 'required|integer',
    
//         //INDIKATOR   
//         'indikator.*'            => 'required|string',
//         'satuan.*'               => 'required|string',
//         'nilaiawal.*'            => 'required|integer',

//         //'tahun1.*'               => 'required|integer',
//         'target1.*'              => 'required|integer',
//         'targetkeuangan1.*'      => 'required|integer',
        
        
//        // 'tahun2.*'               => 'required|integer',
//         'target2.*'              => 'required|integer',
//         'targetkeuangan2.*'      => 'required|integer',

//         //'tahun3.*'               => 'required|integer',
//         'target3.*'              => 'required|integer',
//         'targetkeuangan3.*'      => 'required|integer',

//         //'tahun4.*'               => 'required|integer',
//         'target4.*'              => 'required|integer',
//         'targetkeuangan4.*'      => 'required|integer'
      
        
       
       
//       ]);


         
//       //SIMPAN KE TABEL KONSULTASI DENGAN ID(PRIMARY KEY) NYA AUTO INCREMENT
//       $data                         = new Renssasarprog;
//       $data->indikatorrenssasar_id  = $req->indikatorrenssasar_id;
//       $data->kemukiman_id           = $kemukiman_id;
//       $data->save(); 

//       $renssasarprog_id=$data->id;

//       $prog_indikator=$req->indikator ? $req->indikator :[];

//       foreach($prog_indikator as $key => $value)
//       {
//       $data_indikator                                          = new Indikatorrenssasarprog;
//       $data_indikator->renssasarprog_id                        = $renssasarprog_id;
//       $data_indikator->indikatorrenssasarprog_indikator        = $req->indikator[$key];
//       $data_indikator->indikatorrenssasarprog_satuan           = $req->satuan[$key];
//       $data_indikator->indikatorrenssasarprog_nilaiawal        = $req->nilaiawal[$key];

//       $data_indikator->indikatorrenssasarprog_tahun1           = 2023;
//       $data_indikator->indikatorrenssasarprog_target1          = $req->target1[$key];
//       $data_indikator->indikatorrenssasarprog_targetkeuangan1  = $req->targetkeuangan1[$key];

//       $data_indikator->indikatorrenssasarprog_tahun2           = 2024;
//       $data_indikator->indikatorrenssasarprog_target2          = $req->target2[$key];
//       $data_indikator->indikatorrenssasarprog_targetkeuangan2  = $req->targetkeuangan2[$key]; 

//       $data_indikator->indikatorrenssasarprog_tahun3           = 2025;
//       $data_indikator->indikatorrenssasarprog_target3          = $req->target3[$key];
//       $data_indikator->indikatorrenssasarprog_targetkeuangan3  = $req->targetkeuangan3[$key];

//       $data_indikator->indikatorrenssasarprog_tahun4           = 2026;
//       $data_indikator->indikatorrenssasarprog_target4          = $req->target4[$key];
//       $data_indikator->indikatorrenssasarprog_targetkeuangan4  = $req->targetkeuangan4[$key];     
//       $data_indikator->save();
//       }


//     //KETIKA DATA KONSULTASI SUDAH DISIMPAN KE TABEL, MAKA DIDAPATILAH ID KONSULTASI 
//      // $konsultasi_id              = $data->id;

//     //SIMPAN KE TABEL JURNALKONSULTASI
//     //  $data                       = new JurnalKonsultasi;
//     //$data->id                   = AI(BELUM DIKETAHUI SEBELUM DIINPUTKAN KE TABEL)
//     //  $data->konsultasi_id        = $konsultasi_id;
//     //  $data->status_konsultasi_id = 1;
      
//    //   $data->save();


//       // //SIMPAN KE TABEL DOKUMEN
//       // if($req->hasfile('dokumen'))
//       // {
//       //     foreach($req->file('dokumen') as $file)
//       //     {
//       //       $name = time().uniqid().'.'.$file->getClientOriginalExtension();

//       //       $file->move(public_path()."/uploads/", $name);

//       //       $data                = new Dokumen;
//       //       $data->konsultasi_id = $konsultasi_id;
//       //       $data->nama          = $file->getClientOriginalName();
//       //       $data->lokasi_file   = $name;
//       //       $data->save();
//       //     }
//       // }

//       return redirect()->route('karyawan.renstra.program')->with('success', 'PENAMBAHAN program RENSTRA berhasil');
//     }





   
// //PENGEDITAN REKAM MEDIK
//     public function editProgram($renssasarprog_id)
//     {
    
//       //$data = JurnalKonsultasi::where('jurkon_id', $id)->first();
//       $bagian        = Bagian::all(); 
//       $unsur         = Unsur::all();
    
//       $indikatorrenssasar = Indikatorrenssasar::all();


//       //$program       = Kemukiman::where('id', $prog_id)->get();
//       $data          = Renssasarprog::where('id', $renssasarprog_id)->get();


//       // if ($data->jurnalKonsultasi->last()['status_konsultasi_id'] > 1) 
//       // {
//       //   return redirect()->route('karyawan_rekammedik.karyawan_rm')
//       //                    ->with('warning', 'Rekam Medik ini tidak dapat diedit karena sudah diverifikasi');
//       // }

//      // $jurnalKonsultasi = $data->jurnalKonsultasi->first();

//      // $data->tanggal_konsultasi = Carbon::parse($jurnalKonsultasi['waktu'])->format('Y-m-d');
//     //  $data->pukul_konsultasi   = Carbon::parse($jurnalKonsultasi['waktu'])->format('H:i');
    

//       return view('view_karyawan_renstra.renstra_program_edit')->with('data', $data)
//                                                                 ->with('indikatorrenssasar', $indikatorrenssasar)
//                                                                 ->with('unsur', $unsur)
//                                                                 ->with('renssasarprog_id', $renssasarprog_id)
//                                                                 //->with('program', $program)
//                                                                 ->with('bagian', $bagian);
//     }






//     public function updateProgram(Request $req, $renssasarprog_id)
//     {
  
//         $req->validate(
//                         [

//         //SASARAN
//         'sasaran'               => 'required|integer',

//          //PROGRAM
//         'program'                => 'required|integer',
    
//         //INDIKATOR   
//         'indikator.*'            => 'required|string',
//         'satuan.*'               => 'required|string',
//         'nilaiawal.*'            => 'required|integer',

//         //'tahun1.*'               => 'required|integer',
//         'target1.*'              => 'required|integer',
//         'targetkeuangan1.*'      => 'required|integer',
        
        
//        // 'tahun2.*'               => 'required|integer',
//         'target2.*'              => 'required|integer',
//         'targetkeuangan2.*'      => 'required|integer',

//         //'tahun3.*'               => 'required|integer',
//         'target3.*'              => 'required|integer',
//         'targetkeuangan3.*'      => 'required|integer',

//         //'tahun4.*'               => 'required|integer',
//         'target4.*'              => 'required|integer',
//         'targetkeuangan4.*'      => 'required|integer'
                     
//                       ]
//                     );



//         // $hari_ini                = Carbon::now('Asia/Jakarta');
//         // $jml_konsultasi_hari_ini = Konsultasi::whereDate('created_at', $hari_ini)
//         //                                      ->orderBy('created_at', 'desc')
//         //                                      ->orderBy('id', 'desc')
//         //                                      ->first();

       



//      //SIMPAN KE TABEL KONSULTASI DENGAN ID(PRIMARY KEY) NYA AUTO INCREMENT
//       $data                            = Renssasarprog::findOrFail($renssasarprog_id);
//       $data->indikatorrenssasar_id     = $sasaran;
//       $data->kemukiman_id              = $program;
//       $data->save(); 

//       //$renssasarprogkeg_id=$data->id;

//       $prog_target=$req->indikator ? $req->indikator :[];

//       foreach($prog_target as $key => $value)
//       {
//       $data                                           = Indikatorrenssasarprog::findOrFail($renssasarprog_id);
//       $data->indikatorrenssasarprog_indikator         = $req->indikator[$key];
//       $data->indikatorrenssasarprog_satuan            = $req->satuan[$key];
//       $data->indikatorrenssasarprog_nilaiawal         = $req->nilaiawal[$key];
//       $data->indikatorrenssasarprog_tahun1            = 2023;
//       $data->indikatorrenssasarprog_target1           = $req->target1[$key];
//       $data->indikatorrenssasarprog_targetkeuangan1   = $req->targetkeuangan1[$key];
//       $data->indikatorrenssasarprog_tahun2            = 2024;
//       $data->indikatorrenssasarprog_target2           = $req->target2[$key];
//       $data->indikatorrenssasarprog_targetkeuangan2   = $req->targetkeuangan2[$key];
//       $data->indikatorrenssasarprog_tahun3            = 2025;
//       $data->indikatorrenssasarprog_target3           = $req->target3[$key];
//       $data->indikatorrenssasarprog_targetkeuangan3   = $req->targetkeuangan3[$key];
//       $data->indikatorrenssasarprog_tahun4            = 2026;
//       $data->indikatorrenssasarprog_target4           = $req->target4[$key];
//       $data->indikatorrenssasarprog_targetkeuangan4   = $req->targetkeuangan4[$key];
//       $data->save();
//       }

//         return redirect()->route('karyawan.renstra.program')
//                          ->with('success', 'PROGRAM berhasil diedit');
//     }




//  public function deleteProgram(Request $req)
//     {

//       $req->validate(['check.*' => 'required|integer']);



//        $check = $req->check ? $req->check : [];

//        $data = Konsultasi::with([
//                                 'jurnalKonsultasi',
//                                 'jurnalKonsultasi.statusKonsultasi',
//                                 'dokumen'
//                               ])->whereIn('id', $check)
//                                 ->where('umum_id', session('umum_atau_administrator_id'))
//                                 ->first();


//       //dd($id);

  
//      if($data->jurnalKonsultasi->last()['status_konsultasi_id'] > 1)
//      {
//        return redirect()->route('karyawan_renstra.renstra')
//                           ->with('warning', 'PROGRAM ini tidak dapat dihapus karena sudah diverifikasi');

//      }
//      else
//      {
    
//       $konsultasi=$data->get();
     
//       foreach ($konsultasi as $key => $value) 
//       {
 
//       foreach ($value->dokumen as $i => $dokumen) 
//                {
//                 try 
//                   {
//                    unlink(public_path('uploads/'.$dokumen->lokasi_file));
//                   } 
//                 catch(\Exception $e) 
//                   {

//                   }
//                }
             
//         }

//       $data->delete();

//       return redirect()->route('karyawan_renstra.program')
//                         ->with('success', count($req->check).' data PROGRAM berhasil dihapus');
//      }
//     }





















// public function kegiatan(Request $req)
//    {

//       //$filter['status']   = StatusKonsultasi::all();
//       $filter['periode'] = Periode::all();
//       $filter['kabupaten'] = Kabupaten::all();
//       $filter['kecamatan'] = [];
//       $filter['kemukiman'] = [];
//       $filter['gampong']   = [];
     




//       if ($req->kabupaten) 
//       {
//        $filter['kecamatan'] = Kecamatan::where('kabupaten_id', $req->kabupaten)->get();
//       }

//       if ($req->kecamatan) 
//       {

//       $filter['kemukiman'] = Kemukiman::where('kecamatan_id', $req->kecamatan)->get();

//       }

//       if($req->kemukiman) 
//       {
//       $filter['gampong']   = Gampong::where('kemukiman_id', $req->kemukiman)->get();
//       }



//       //dd($data);

//        $data = Gampong::with(['kemukiman.kecamatan.kabupaten']);         



     

//        // $program = Kemukiman::with(['kecamatan.kabupaten'])->get();

//        //$s = Renssasar::all();

//        // $renssasar      = Renssasarprog::with(['renssasar.tujuan.renstra']);

       
//        $renssasarprog = Renssasarprog::with(['indikatorrenssasar.renssasar.indikatortujuan.tujuan.renstra.sektoral'=>function($query)
//                                          {
//                                           $query->where('umum_id', session('umum_atau_administrator_id'));
//                                          }
//                             ],
//                             ['indikatorrenssasarprog']
//                            )->get();











//         if ($req->kemukiman) 
//       {
//         $data = $data->where('kemukiman_id',$req->kemukiman);
                                                      
                                                
//       } 

//        elseif ($req->kecamatan) 
//       {
//         $data = $data->whereHas('kemukiman', function($query)use($req)
//                                                                 {
//                                                                     $query->where('kecamatan_id',$req->kecamatan);
                                                        
//                                                                 } 
//                                                               );
//       } 

     
//       elseif ($req->kabupaten) 
//       {
//         $data = $data->whereHas('kemukiman.kecamatan', function($query)use($req)
//                                             {
//                                               $query->where('kabupaten_id',$req->kabupaten);
//                                             } 
//                                 );
                                                       
//       }






 




//       // if ($req->search) 
//       // {
//       //   $data = $data->where('no_registrasi', 'LIKE' ,'%'.$req->search.'%')
//       //                ->orWhere('risalah', 'LIKE' ,'%'.$req->search.'%');
//       // }


//       $pagination = $req->pagination ? (int)$req->pagination : 15;

//       if ($pagination) 
//       {
//         $data = $data->orderBy('id', 'asc')->paginate($pagination);
//       } 
//       else 
//       {
//         $data = $data->orderBy('id', 'asc')->get();


//       }


//       // if ($req->export) 
//       // {
//       //   set_time_limit(6000);
//       //   $pdf = PDF::loadView('view_pdf.konsultasi_permohonan', $data);

//       //   return $pdf->download('konsultasi_permohonan.pdf');
//       // }


//       return view('view_karyawan_renstra.renstra_kegiatan')->with('filter', $filter)
//                                                           ->with('renssasarprog', $renssasarprog)
//                                                           ->with('data', $data);
    

// }




//       public function createKegiatan($renssasarprog_id, $program_id, $program_kode, $program_nama)
//     {
//       $bagian        = Bagian::all(); 
//       $unsur         = Unsur::all();
//       $hal           = Hal::all();

//       //$sektoral      = Sektoral::where('umum_id',session('umum_atau_administrator_id'))->get();
      

//       $indikator_program = Indikatorrenssasarprog::where('renssasarprog_id',$renssasarprog_id)->get();

//       $kegiatan      = Gampong::where('kemukiman_id',$program_id)->get();



//      return view('view_karyawan_renstra.renstra_add')->with('renssasarprog_id', $renssasarprog_id)
//                                                      ->with('program_id', $program_id)
//                                                      ->with('program_kode', $program_kode)
//                                                      ->with('program_nama', $program_nama)
//                                                      ->with('indikator_program', $indikator_program)
//                                                      ->with('kegiatan', $kegiatan)
//                                                      ->with('bagian', $bagian)
//                                                      ->with('unsur', $unsur)
//                                                      ->with('hal', $hal);
                                                    
                                         
//     }






//      //SETELAH KLIK MENU SIMPAN, PASSING PARAMETER2 TAMBAH DAN DIVALIDASI SERTA DISIMPAN
//     public function saveKegiatan(Request $req, $renssasarprog_id)
//     {
//       $req->validate([
           
   
//        //IDIKATOR_PROGRAM
//         'indikator_program'         => 'required|integer',

//          //KEGIATAN
//          'kegiatan'              => 'required|integer',
    
//         //INDIKATOR   
//         'indikator.*'            => 'required|string',
//         'satuan.*'               => 'required|string',
//         'nilaiawal.*'            => 'required|integer',

//         //'tahun1.*'               => 'required|integer',
//         'target1.*'              => 'required|integer',
//         'targetkeuangan1.*'      => 'required|integer',
        
        
//        // 'tahun2.*'               => 'required|integer',
//         'target2.*'              => 'required|integer',
//         'targetkeuangan2.*'      => 'required|integer',

//         //'tahun3.*'               => 'required|integer',
//         'target3.*'              => 'required|integer',
//         'targetkeuangan3.*'      => 'required|integer',

//         //'tahun4.*'              => 'required|integer',
//         'target4.*'              => 'required|integer',
//         'targetkeuangan4.*'      => 'required|integer',
      
        
       
       
//       ]);


//     // $hari_ini = Carbon::now('Asia/Jakarta');

//     // //JUMLAH REKAM MEDIK HARI INI
//     // $jml_konsultasi_hari_ini = Konsultasi::whereDate('created_at', $hari_ini)
//     //                                      ->orderBy('created_at', 'desc')
//     //                                      ->orderBy('id', 'desc')
//     //                                      ->first();

//     // $jml_konsultasi_hari_ini = $jml_konsultasi_hari_ini ? substr($jml_konsultasi_hari_ini->no_registrasi, 12) : -1;

//     // $no_registrasi = str_pad(2,2,'0',STR_PAD_LEFT)
//     //                 .str_pad(2,2,'0',STR_PAD_LEFT)
//     //                 .$hari_ini->format('dmY')
//     //                 .str_pad(((int)$jml_konsultasi_hari_ini)+1,4,'0',STR_PAD_LEFT);


      
//       //SIMPAN KE TABEL KONSULTASI DENGAN ID(PRIMARY KEY) NYA AUTO INCREMENT
//       $data                            = new Renssasarprogkeg;
//       $data->renssasarprog_id          = $renssasarprog_id;
//       $data->indikatorrenssasarprog_id = $req->indikator_program;
//       $data->gampong_id                = $req->kegiatan;
//       $data->save(); 

//       $renssasarprogkeg_id=$data->id;

//       $progkeg_target=$req->indikator ? $req->indikator :[];

//       foreach($progkeg_target as $key => $value)
//       {
//       $data                                             = new Indikatorrenssasarprogkeg;
//       $data->renssasarprogkeg_id                        = $renssasarprogkeg_id;
//       $data->indikatorrenssasarprogkeg_indikator        = $req->indikator[$key];
//       $data->indikatorrenssasarprogkeg_satuan           = $req->satuan[$key];
//       $data->indikatorrenssasarprogkeg_nilaiawal        = $req->nilaiawal[$key];
//       $data->indikatorrenssasarprogkeg_tahun1           = 2023;
//       $data->indikatorrenssasarprogkeg_target1          = $req->target1[$key];
//       $data->indikatorrenssasarprogkeg_targetkeuangan1  = $req->targetkeuangan1[$key];
//       $data->indikatorrenssasarprogkeg_tahun2            = 2024;
//       $data->indikatorrenssasarprogkeg_target2           = $req->target2[$key];
//       $data->indikatorrenssasarprogkeg_targetkeuangan2   = $req->targetkeuangan2[$key];
//       $data->indikatorrenssasarprogkeg_tahun3            = 2025;
//       $data->indikatorrenssasarprogkeg_target3           = $req->target3[$key];
//       $data->indikatorrenssasarprogkeg_targetkeuangan3   = $req->targetkeuangan3[$key];
//       $data->indikatorrenssasarprogkeg_tahun4            = 2026;
//       $data->indikatorrenssasarprogkeg_target4           = $req->target4[$key];
//       $data->indikatorrenssasarprogkeg_targetkeuangan4   = $req->targetkeuangan4[$key];
//       $data->save();
//       }


//     //KETIKA DATA KONSULTASI SUDAH DISIMPAN KE TABEL, MAKA DIDAPATILAH ID KONSULTASI 
//      // $konsultasi_id              = $data->id;

//     //SIMPAN KE TABEL JURNALKONSULTASI
//     //  $data                       = new JurnalKonsultasi;
//     //$data->id                   = AI(BELUM DIKETAHUI SEBELUM DIINPUTKAN KE TABEL)
//     //  $data->konsultasi_id        = $konsultasi_id;
//     //  $data->status_konsultasi_id = 1;
      
//    //   $data->save();


//       // //SIMPAN KE TABEL DOKUMEN
//       // if($req->hasfile('dokumen'))
//       // {
//       //     foreach($req->file('dokumen') as $file)
//       //     {
//       //       $name = time().uniqid().'.'.$file->getClientOriginalExtension();

//       //       $file->move(public_path()."/uploads/", $name);

//       //       $data                = new Dokumen;
//       //       $data->konsultasi_id = $konsultasi_id;
//       //       $data->nama          = $file->getClientOriginalName();
//       //       $data->lokasi_file   = $name;
//       //       $data->save();
//       //     }
//       // }

//       //return view('view_karyawan_renstra.renstra_kegiatan')
//       return redirect()->route('karyawan.renstra.kegiatan')
//                        ->with('success', 'PENAMBAHAN Kegiatan RENSTRA berhasil');
//     }




//   public function editKegiatan($renssasarprogkeg_id)
//     {
    
//       //$data = JurnalKonsultasi::where('jurkon_id', $id)->first();
//       $bagian        = Bagian::all(); 
//       $unsur         = Unsur::all();
//       $kegiatan      = Gampong::all();
//       $sasaran       = Renssasar::all();


//       $data = Renssasarprogkeg::where('id', $renssasarprogkeg_id)->get();


//       // if ($data->jurnalKonsultasi->last()['status_konsultasi_id'] > 1) 
//       // {
//       //   return redirect()->route('karyawan_rekammedik.karyawan_rm')
//       //                    ->with('warning', 'Rekam Medik ini tidak dapat diedit karena sudah diverifikasi');
//       // }

//      // $jurnalKonsultasi = $data->jurnalKonsultasi->first();

//      // $data->tanggal_konsultasi = Carbon::parse($jurnalKonsultasi['waktu'])->format('Y-m-d');
//     //  $data->pukul_konsultasi   = Carbon::parse($jurnalKonsultasi['waktu'])->format('H:i');
    

//       return view('view_karyawan_renstra.renstra_edit')->with('data', $data)
//                                                        ->with('sasaran', $sasaran)
//                                                        ->with('unsur', $unsur)
//                                                        ->with('renssasarprogkeg_id', $renssasarprogkeg_id)
//                                                        ->with('kegiatan', $kegiatan)
//                                                        ->with('bagian', $bagian);
//     }






//     public function updateKegiatan(Request $req,$renssasarprogkeg_id)
//     {
  
//         $req->validate(
//                         [

//                          //INDIKATOR   
//                         'indikator.*'            => 'required|string',
//                         'satuan.*'               => 'required|string',
//                         'nilaiawal.*'            => 'required|integer',

//                         'target1.*'              => 'required|integer',
//                         'targetkeuangan1.*'      => 'required|integer',
                        
                        
                      
//                         'target2.*'              => 'required|integer',
//                         'targetkeuangan2.*'      => 'required|integer',

                    
//                         'target3.*'              => 'required|integer',
//                         'targetkeuangan3.*'      => 'required|integer',

                        
//                         'target4.*'              => 'required|integer',
//                         'targetkeuangan4.*'      => 'nullable|integer',
      
                     
//                       ]
//                     );



//         // $hari_ini                = Carbon::now('Asia/Jakarta');
//         // $jml_konsultasi_hari_ini = Konsultasi::whereDate('created_at', $hari_ini)
//         //                                      ->orderBy('created_at', 'desc')
//         //                                      ->orderBy('id', 'desc')
//         //                                      ->first();

       

//  //SIMPAN KE TABEL KONSULTASI DENGAN ID(PRIMARY KEY) NYA AUTO INCREMENT
//       // $data                            = Renssasarprogkeg::findOrFail($renssasarprogkeg_id);
//       // $data->renssasarprog_id          = $renssasarprog_id;
//       // $data->gampong_id                = $req->kegiatan;
//       // $data->save(); 

//        //$renssasarprogkeg_id=$data->id;

//       $progkeg_target=$req->indikator ? $req->indikator :[];

//       foreach($progkeg_target as $key => $value)
//       {
//       $data                                             = Indikatorrenssasarprogkeg::findOrFail($renssasarprogkeg_id);
//       $data->indikatorrenssasarprogkeg_indikator        = $req->indikator[$key];
//       $data->indikatorrenssasarprogkeg_satuan           = $req->satuan[$key];
//       $data->indikatorrenssasarprogkeg_nilaiawal        = $req->nilaiawal[$key];
//       $data->indikatorrenssasarprogkeg_target1          = $req->target1[$key];
//       $data->indikatorrenssasarprogkeg_targetkeuangan1  = $req->targetkeuangan1[$key];
//       $data->indikatorrenssasarprogkeg_target2           = $req->target2[$key];
//       $data->indikatorrenssasarprogkeg_targetkeuangan2   = $req->targetkeuangan2[$key];
//       $data->indikatorrenssasarprogkeg_target3           = $req->target3[$key];
//       $data->indikatorrenssasarprogkeg_targetkeuangan3   = $req->targetkeuangan3[$key];
//       $data->indikatorrenssasarprogkeg_target4           = $req->target4[$key];
//       $data->indikatorrenssasarprogkeg_targetkeuangan4   = $req->targetkeuangan4[$key];
//       $data->save();
//       }

//         return redirect()->route('karyawan.renstra.kegiatan')
//                          ->with('success', 'KEGIATAN berhasil diedit');
//     }







public function deleteKegiatan(Request $req)
    {

      $req->validate(['check.*' => 'required|integer']);



       $check = $req->check ? $req->check : [];

       $data = Konsultasi::with([
                                'jurnalKonsultasi',
                                'jurnalKonsultasi.statusKonsultasi',
                                'dokumen'
                              ])->whereIn('id', $check)
                                ->where('umum_id', session('umum_atau_administrator_id'))
                                ->first();


      //dd($id);

  
     if($data->jurnalKonsultasi->last()['status_konsultasi_id'] > 1)
     {
       return redirect()->route('admin.renstra.setujuopd')
                          ->with('warning', 'Kagiatan ini tidak dapat dihapus karena sudah diverifikasi');

     }
     else
     {
    
      $konsultasi=$data->get();
     
      foreach ($konsultasi as $key => $value) 
      {
 
      foreach ($value->dokumen as $i => $dokumen) 
               {
                try 
                  {
                   unlink(public_path('uploads/'.$dokumen->lokasi_file));
                  } 
                catch(\Exception $e) 
                  {

                  }
               }
             
        }

      $data->delete();

      return redirect()->route('karyawan_renstra.renstra')
                        ->with('success', count($req->check).' data DPA berhasil dihapus');
     }
    }

   




   

//     public function prosesDetail(Request $req, $konsultasi_id)
//     {
//      $req->validate([
//                        'tahapan.*' => 'nullable|integer',
//                      ]);


//      $tahapan = $req->tahapan ? $req->tahapan : [];

//      Tahapan::where('konsultasi_id', $konsultasi_id)
//             ->whereIn('no', $tahapan)
//             ->update(['selesai' => 1,]);


//      Tahapan::where('konsultasi_id', $konsultasi_id)
//             ->whereNotIn('no', $tahapan)
//             ->update(['selesai' => 0,]);



//      // $no_registrasi = Konsultasi::select(['id', 'no_registrasi'])
//      //                           ->where('id', $konsultasi_id)
//      //                           ->firstOrFail()->no_registrasi;




//      return redirect()->route('karyawan.renstra.terekap')
//                       ->with('success', count($tahapan).' Tahapan di konsultasi dengan no registrasi '.$no_registrasi.' berhasil diselesaikan');
//    }

   




  
    
//     public function deleteFileDPA(Request $req)
//     {
//       $lokasi_file = $req->file;
//       $data = Dokumen::where('lokasi_file', $lokasi_file);
//       $dokumen = $data->firstOrFail();

//       try {
//         unlink(public_path('uploads/'.$dokumen->lokasi_file));
//       } catch (\Exception $e) {

//       }

//       $konsultasi_id = $dokumen->konsultasi_id;
//       $nama = $dokumen->nama;

//       $data->delete();

//       return redirect()->route('karyawan_rekammedik.karyawan_rm_edit.edit', $konsultasi_id)
//                        ->with('success', 'Dokumen '.$nama.' berhasil dihapus');
//     }




    















 









     public function setuju_bappeda(Request $req)
    {


      //$filter['status']   = StatusKonsultasi::all();

      $filter['sektoral'] = Sektoral::all();
      $filter['hal']      = Hal::all();
      $filter['unsur']    = Unsur::all();
      $filter['bagian']   = Bagian::all();
      //$filter['dusun']     = [];

      
      

      
      $data = Konsultasi::all();

      // if ($req->sektoral) 
      // {
      //    $filter['kecamatan'] = Kecamatan::where('kabupaten_id', $req->kabupaten)->get();
      // }
      // if ($req->kecamatan) 
      // {
      //    $filter['kemukiman'] = Kemukiman::where('kecamatan_id', $req->kecamatan)->get();
      //  }
      //  if ($req->kemukiman) 
      // {
      //    $filter['gampong'] = Gampong::where('kemukiman_id', $req->kemukiman)->get();
      //  }
      //    if ($req->kemukiman) 
      // {
      //    $filter['dusun'] = Dusun::where('gampong_id', $req->gampong)->get();
      //  }
                                    

      // if ($req->kabupaten) 
      //{
      //  $kecamatan = Kecamatan::where('kabupaten_id', $req->kabupaten)->get();

        // $data = $data->whereHas('gampong.kemukiman.kecamatan', function($q)use($req)
        // {
        //        $q->where('kabupaten_id', $req->kabupaten);
        // }
    //  }
       


    //    if ($req->kecamatan) 
    //   {
    //     $kemukiman = Kemukiman::where('kecamatan_id', $req->kecamatan)->get();

    //     $data = $data->whereHas('gampong.kemukiman', function($q)use($req)
    //      {
    //        $q->where('kecamatan_id', $req->kecamatan);
    //      }

    //   }

    //   if ($req->kemukiman) 
    //   {
    //     $gampong = Gampong::where('kemukiman_id', $req->kemukiman)->get();

    //      $data = $data->whereHas('gampong', function($q)use($req)
    //      {
    //       $q->where('kemukiman_id', $req->kemukiman);
    //      }

    //   }

    //    if ($req->gampong) 
    //   {
    //     $data = $data->where('gampong_id', $req->gampong);
    //   }


    // }
    

      // if ($req->status_konsultasi) 
      // {
      //   $data = $data->whereHas('jurnalKonsultasi', function($q)use($req)
      //                                              {
      //                                               $q->where('status_konsultasi_id', $req->status_konsultasi);
      //                                              }
      //                           );
      // }

    

      // if ($req->search) 
      // {
      //   $data = $data->where('no_registrasi', 'LIKE' ,'%'.$req->search.'%')
      //                ->orWhere('risalah', 'LIKE' ,'%'.$req->search.'%');
      // }



      if ($req->sektoral) 
       {
         $data = $data->where('sektoral_id', $req->sektoral);
                                  
       }



      if ($req->hal) 
      {
        $data = $data->where('hal_id', $req->hal);
        
      }

      if ($req->unsur) 
      {
        $data = $data->where('unsur_id', $req->unsur);
       
      }


       if ($req->bagian) 
      {
        $data = $data->where('bagian_id', $req->bagian);
       
      }

   

   

      // $pagination = $req->pagination ? (int)$req->pagination : 15;

      // if ($pagination) 
      // {
      //   $data = $data->orderBy('created_at', 'desc')->paginate($pagination);
      // } 
      // else 
      // {
      //   $data = $data->orderBy('created_at', 'desc')->get();
      // }


      // if ($req->export) 
      // {
      //   set_time_limit(6000);
      //   $pdf = PDF::loadView('view_pdf.konsultasi_permohonan', $data);

      //   return $pdf->download('konsultasi_permohonan.pdf');
      // }


      return view('view_karyawan_renstra.renstra_setujubappeda')->with('filter', $filter)
                                              // ->with('bagian', $bagian)
                                              // ->with('hal', $hal)
                                              // ->with('unsur', $unsur)
                                               ->with('data', $data);
    }












    //BEGITU IKON DITEKAN KE NORMAL, MAKA DIARAHKAN RM TERSEBUT KE TAB NORMAL DAN RM HILANG,TAMPAK TAB PENDING
    public function penormalan($id) 
    { 
      JurnalKonsultasi::updateOrCreate(['konsultasi_id'        => $id, 
                                        'status_konsultasi_id' => 2],
                                        
                                       ['administrator_id'     => session('umum_atau_administrator_id')]
      );

      $no_registrasi = Konsultasi::select(['id', 'no_registrasi'])
                                   ->where('id', $id)
                                   ->firstOrFail()->no_registrasi;

      return redirect()->route('admin.rekammedik.pending')
                       ->with('success', 'Rekam Medik dengan no registrasi '.$no_registrasi.' masuk status NORMAL');
    }




    //TAMPAK TAB NORMAL
    public function normal(Request $req)
    {
      $filter['hal']       = Hal::all();
      $filter['unsur']     = Unsur::all();
      $filter['sektoral']  = Sektoral::all();
      $filter['bagian']    = Bagian::all();
      $filter['satuankerja'] = Satuankerja::all();

      $filter['kabupaten'] = Kabupaten::all();
      $filter['kecamatan'] = [];
      $filter['kemukiman'] = [];
      $filter['gampong']   = [];

      // if ($req->kabupaten) {
      //   $filter['kecamatan'] = Kecamatan::where('kabupaten_id', $req->kabupaten)->get();
      // }
      // if ($req->kecamatan) {
      //   $filter['kemukiman'] = Kemukiman::where('kecamatan_id', $req->kecamatan)->get();
      // }
      // if ($req->kemukiman) {
      //   $filter['gampong'] = Gampong::where('kemukiman_id', $req->kemukiman)->get();
      // }

      $data = Konsultasi::with
                             ([
                            'umum.user',
                            'umum.unsur',
                            'umum.kecamatan.kabupaten',
                            'umum.hal',
                            'umum.sektoral',
                            'dokumen',
                            'jurnalKonsultasi'=>function($q)
                                                {
                                                 $q->orderBy('created_at', 'asc')->get();
                                                },
                             'jurnalKonsultasi.administrator'

                              ])->whereHas('statusKonsultasi',function($q)
                                                             {
                                                              $q->where('id', 2);
                                                             }
                                          )->whereDoesntHave('statusKonsultasi', 
                                                   function($q)
                                                   {
                                                    $q->whereIn('id', [3,4,5]);
                                                  }
                                                );

      if ($req->search) 
      {
        $data = $data->where('no_registrasi', 'LIKE' ,'%'.$req->search.'%')->orWhere('risalah', 'LIKE' ,'%'.$req->search.'%');
      }

      if ($req->mulai) {
        $data = $data->whereDate('created_at', '>=' , $req->mulai);
      }

      if ($req->akhir) {
        $data = $data->whereDate('created_at', '<=' , $req->akhir);
      }

       if ($req->sektoral) 
      {
        $data = $data->whereHas('umum', function($q)use($req)
        {
          $q->where('sektoral_id', $req->sektoral);
        });
      }



      if ($req->hal) 
      {
        $data = $data->whereHas('umum',  function($q)use($req)
        {
          $q->where('hal_id', $req->hal);
        });
      }

      if ($req->unsur) 
      {
        $data = $data->whereHas('umum', function($q)use($req)
        {
          $q->where('unsur_id', $req->unsur);
        });
      }

      // if ($req->gampong) {
      //   $data = $data->whereHas('umum.gampong', function($q)use($req){
      //     $q->where('id',$req->gampong);
      //   });
      // } elseif ($req->kemukiman) {
      //   $data = $data->whereHas('umum.gampong', function($q)use($req){
      //     $q->where('kemukiman_id', $req->kemukiman);
      //   });
      // } elseif ($req->kecamatan) {
      //   $data = $data->whereHas('umum.gampong.kemukiman', function($q)use($req){
      //     $q->where('kecamatan_id', $req->kecamatan);
      //   });
      // } elseif ($req->kabupaten) {
      //   $data = $data->whereHas('umum.gampong.kemukiman.kecamatan', function($q)use($req){
      //     $q->where('kabupaten_id', $req->kabupaten);
      //   });
      // }

      $pagination = $req->pagination ? (int)$req->pagination : 15;

      if ($pagination) {
        $data = $data->orderBy('created_at', 'desc')->paginate($pagination);
      } else {
        $data = $data->orderBy('created_at', 'desc')->get();
      }

      if ($req->export) {
        set_time_limit(6000);
        $pdf = PDF::loadView('view_pdf.konsultasi_tertolak', $data);

        return $pdf->download('konsultasi_tertolak.pdf');
      }



      return view('view_admin_dpa.dpa_setuju')->with('filter', $filter)
                                                                ->with('data', $data);
    }

    

  // //KETIKA DI TEKAN PREKOMORBID
  // public function peprekomorbidan($id)
  //   {
  //     $no_registrasi = Konsultasi::select(['id', 'no_registrasi'])
  //                                ->where('id', $id)
  //                                ->firstOrFail()->no_registrasi;

  //     JurnalKonsultasi::updateOrCreate(['konsultasi_id' => $id, 'status_konsultasi_id' => 3],
  //                                      ['administrator_id' => session('umum_atau_administrator_id')]
  //     );



  //      //SEBELUM MASUK KESINI HARUS DITAMPILKAN DULU TAMPILAN PILIHAN PREKOMORBID

  //     return redirect()->route('admin.rekammedik.pending')
  //                      ->with('success', 'Konsultasi dengan no registrasi '.$no_registrasi.' berhasil diverifikasi');
  //   }


     public function peprekomorbidan($id)
    {
      //$admins   = Administrator::all();
      //$ruang    = Ruang::all();
      $pemangku   = Pemangku::all();

      // $filter['hal']       = Hal::all();
      // $filter['unsur']     = Unsur::all();
      // $filter['sektoral']  = Sektoral::all();


      $data     = Konsultasi::with(['umum','umum.sektoral','umum.hal', 'umum.unsur','jurnalKonsultasi'])
                              ->where('id', $id)->firstOrFail();

      $jurnalKonsultasi         = $data->jurnalKonsultasi->first();
      $data->tanggal_konsultasi = Carbon::parse($jurnalKonsultasi['waktu'])->format('Y-m-d');
      $data->pukul_konsultasi   = Carbon::parse($jurnalKonsultasi['waktu'])->format('H:i');
      $data->jumlah_delegasi    = $jurnalKonsultasi['jumlah_delegasi'];

      return view('view_admin_rekammedik.rekammedik_peprekomorbid')->with('data', $data)
                                                               // ->with('admins', $admins)
                                                               // ->with('ruang', $ruang)
                                                                ->with('pemangku', $pemangku);
                                                              //  ->with('filter', $filter);
    }


 public function prosesPeprekomorbidan(Request $req, $id)
    {
        $req->validate([
                        // 'administrator'      => 'required|integer',
                       //'ruangan'            => 'required|string',
                         'tanggal_konsultasi' => 'required|date',
                         'pukul_konsultasi'   => 'required',
                         'instruksiprekom'    => 'required|string',
                         'pemangku.*'         => 'nullable|integer'
                       ]);

       $konsultasi = Konsultasi::select(['id', 'no_registrasi'])
                                 ->where('id', $id)
                                 ->firstOrFail();

       JurnalKonsultasi::updateOrCreate(
                                         ['konsultasi_id'        => $id, 
                                          'status_konsultasi_id' => 3],
                                         [
                                          
                                         ]
                                      );

       Terverivikasi::updateOrCreate(
                                     ['konsultasi_id' => $id],
                                     ['dokter_id'     => session('umum_atau_administrator_id'),
                                      'waktu_rm_lagi' => $req->tanggal_konsultasi." ".$req->pukul_konsultasi,
                                      'instruksi_prekomorbid'   => $req->instruksiprekom
                                     ]
                                 );


       $pemangku = $req->pemangku ? $req->pemangku : [];
       $konsultasi->pemangku()->sync($pemangku);

       $no_registrasi = $konsultasi->no_registrasi;
       return redirect()->route('admin.rekammedik.pending')
                        ->with('success', 'Rekam Medik dengan no registrasi '.$no_registrasi.' masuk TAB PRE KOMORBID');
    }

    //TAMPILAN PREKOMORBID
    public function prekomorbid(Request $req){

       $filter['hal']          = Hal::all();
      $filter['unsur']        = Unsur::all();
      $filter['sektoral']     = Sektoral::all();


       $data = Konsultasi::with([
                               
                                'umum',
                                'umum.kecamatan.kabupaten',
                                'pemangku',
                                'dokumen',
                                'Terverivikasi',
                                'jurnalKonsultasi' => function($q)
                                                      {
                                                       $q->orderBy('created_at', 'desc')->get();
                                                       },
                                'jurnalKonsultasi.administrator'
                                 ])->whereHas('statusKonsultasi', function($q)
                                                                {
                                                                 $q->where('id', 3);
                                                                }
                                             )->whereDoesntHave('statusKonsultasi', function($q)
                                                                                  {
                                                                                   $q->whereIn('id',[4,5]);
                                                                                  }
                                                                                  );

     if ($req->search) 
      {
        $data = $data->where('no_registrasi', 'LIKE' ,'%'.$req->search.'%')->orWhere('risalah', 'LIKE' ,'%'.$req->search.'%');
      }

      if ($req->mulai) 
      {
        $data = $data->whereDate('created_at', '>=' , $req->mulai);
      }

      if ($req->akhir) 
      {
        $data = $data->whereDate('created_at', '<=' , $req->akhir);
      }

      //--------------------------------------------------------------------

      if ($req->hal) 
      {
           $data = $data->where('umum.hal',  function($q)use($req)
                                        {
                                         $q->where('hal_id', $req->hal);
                                         }
                                );
      }

       if ($req->sektoral) {
        $data = $data->where('umum.sektoral', function($q)use($req)
                                     {
                                     $q->where('sektoral_id', $req->sektoral);
                                     }
                            );
      }

      if ($req->unsur) {
        $data = $data->whereHas('umum.unsur', function($q)use($req){
                                        $q->where('unsur_id', $req->unsur);
                                        }
                                );
      }


       $pagination = $req->pagination ? (int)$req->pagination : 15;

      if ($pagination) 
      {
                       $data = $data->orderBy('created_at', 'desc')->paginate($pagination);
      } 
      else 
      {
        $data = $data->orderBy('created_at', 'desc')->get();
      }

      if ($req->export) 
      {
        set_time_limit(6000);
        $pdf = PDF::loadView('view_pdf.konsultasi_terverifikasi', $data);

        return $pdf->download('konsultasi_terverifikasi.pdf');
      }
      return view('view_admin_rekammedik.rekammedik_prekomorbid')->with('filter', $filter)
                                                                 ->with('data', $data);

    }
      

  




   // public function prosesTahapan(Request $req, $konsultasi_id)
   // {
   //   $req->validate([
   //     'tahapan.*' => 'nullable|integer',
   //   ]);

   //   $tahapan = $req->tahapan ? $req->tahapan : [];

   //   Tahapan::where('konsultasi_id', $konsultasi_id)->whereIn('no', $tahapan)->update([
   //     'selesai' => 1,
   //   ]);

   //   Tahapan::where('konsultasi_id', $konsultasi_id)->whereNotIn('no', $tahapan)->update([
  //      'selesai' => 0,
 //     ]);

   //   $no_registrasi = Konsultasi::select(['id', 'no_registrasi'])
   //                             ->where('id', $konsultasi_id)
   //                             ->firstOrFail()->no_registrasi;

   //   return redirect()->route('admin.rekammedik.terekap')
   //                    ->with('success', count($tahapan).' Tahapan di konsultasi dengan no registrasi '.$no_registrasi.' berhasil diselesaikan');
  //  }



    public function undo($id, $status)
    {
      JurnalKonsultasi::where('konsultasi_id', $id)
                      ->where('status_konsultasi_id', $status)->delete();

      if ($status == 2) 
      {
        $redirect = 'admin.rekammedik.normal';
      } 
      elseif ($status == 3) 
      {
        $redirect = 'admin.rekammedik.prekomorbid';
      } 
      elseif ($status == 4) 
      {
        $redirect = 'admin.rekammedik.komorbid';
        Terjadwal::where('konsultasi_id', $id)->delete();
      } 
      elseif ($status == 5) 
      {
        $redirect = 'admin.rekammedik.komplikasi';
        Terekap::where('konsultasi_id', $id)->delete();
        Tahapan::where('konsultasi_id', $id)->delete();
      }




      $no_registrasi = Konsultasi::select(['id', 'no_registrasi'])
                                 ->where('id', $id)
                                 ->firstOrFail()->no_registrasi;

      return redirect()->route($redirect)
                      ->with('success', 'Rekam Medik dengan no registrasi '.$no_registrasi.' berhasil dibatalkan');

    }







    public function delete(Request $req)
    {
      $req->validate(['check.*' => 'required|integer',]);

      $check = $req->check ? $req->check : [];
      

      $data = Konsultasi::with('dokumen')->whereIn('id', $check);

      $konsultasi = $data->get();


      foreach ($konsultasi as $key => $value) 
      {
        if ($value->dokumen) 
        {
          foreach ($value->dokumen as $i => $dokumen) 
          {
            try 
            {
              unlink(public_path('uploads/'.$dokumen->lokasi_file));
            } 
            catch (\Exception $e) 
            {

            }
          }
        }
      }

      $data->delete();

      return redirect()->route('admin.rekammedik.pending')
                       ->with('success', count($req->check).' Rekam Medik berhasil dihapus');
    }

}


