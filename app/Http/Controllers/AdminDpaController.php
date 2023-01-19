<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Builder;

use App\Models\Hal;
use App\Models\Bagian;
use App\Models\Sektoral;
use App\Models\SatuanKerja;
use App\Models\Unsur;

use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kemukiman;
use App\Models\Gampong;
use App\Models\Dusun;

use App\Models\Tujuan;
use App\Models\Renssasar;
use App\Models\Renssasarprog;
use App\Models\Renssasarprogkeg;
use App\Models\Renssasarprogkegsubkeg;




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

class AdminDpaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('level:administrator');
    }




public function setuju(Request $req)
    {


      //$filter['status']   = StatusKonsultasi::all();

      $filter['sektoral'] = Sektoral::all();
      $filter['hal']      = Hal::all();
      $filter['unsur']    = Unsur::all();
      $filter['bagian']   = Bagian::all();
      //$filter['dusun']     = [];

      
      

      
      $data = Renssasarprogkegsubkeg::whereHas('indikatorrenssasarprogkeg.renssasarprogkeg.indikatorrenssasarprog.renssasarprog.indikatorrenssasar.renssasar.indikatortujuan.tujuan.renstra.sektoral')->get();

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


      return view('view_admin_dpa.dpa_setuju')->with('filter', $filter)
                                              // ->with('bagian', $bagian)
                                              // ->with('hal', $hal)
                                              // ->with('unsur', $unsur)
                                               ->with('data', $data);
    }



     public function rekapitulasi(Request $req)
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


      return view('view_admin_dpa.dpa_rekapitulasi')->with('filter', $filter)
                                              // ->with('bagian', $bagian)
                                              // ->with('hal', $hal)
                                              // ->with('unsur', $unsur)
                                               ->with('data', $data);
    }




    //REKAM MEDIK

    // public function pending(Request $req)
    // {


    //   //$filter['status']   = StatusKonsultasi::all();

    //   $filter['kabupaten'] = Kabupaten::all();
    //   $filter['kecamatan'] = [];
    //   $filter['kemukiman'] = [];
    //   $filter['gampong']   = [];
    //  // $filter['dusun']     = [];

      

    //   if ($req->kabupaten) 
    //   {
    //    $filter['kecamatan'] = Kecamatan::where('kabupaten_id', $req->kabupaten)->get();
    //   }

    //   if ($req->kecamatan) 
    //   {

    //   $filter['kemukiman'] = Kemukiman::where('kecamatan_id', $req->kecamatan)->get();

    //   }

    //   if ($req->kemukiman) 
    //   {
    //   $filter['gampong']   = Gampong::where('kemukiman_id', $req->kemukiman)->get();
    //   }




    //   $data = Dusun::with('gampong',
    //                       'gampong.kemukiman',
    //                       'gampong.kemukiman.kecamatan',
    //                       'gampong.kemukiman.kecamatan.kabupaten'
    //                      )->get();

                                   


    //   //  if ($req->gampong) 
    //   // {
    //   //   $data = $data->where('id',$req->gampong);
                                                

    //   // } 
    //   // elseif ($req->kemukiman) 
    //   // {
    //   //   $data = $data->whereHas('gampong', function(Builder $query)use($req)
    //   //                                           {
    //   //                                             $query->where('kemukiman_id', $req->kemukiman);
    //   //                                           }
    //   //                           );

    //   // } 
    //   // elseif ($req->kecamatan) 
    //   // {
    //   //   $data = $data->whereHas('gampong.kemukiman', function(Builder $query)use($req)
    //   //                                                     {
    //   //                                                      $query->where('kecamatan_id', $req->kecamatan);
    //   //                                                     }
    //   //                           );
    //   // } 
    //   // elseif ($req->kabupaten) 
    //   // {
    //   //   $data = $data->whereHas('gampong.kemukiman.kecamatan', function(Builder $query)
    //   //                                                               {
    //   //                                                                $query->where('kabupaten_id', $req->kabupaten);
    //   //                                                               }
    //   //                           );
    //   // }




    //   // if ($req->kabupaten) 
    //   // {
    //   //   $data = $data->where('gampong->kemukiman->kecamatan->kabupaten_id',$req->kabupaten);
                              
    //   // }
    //   //  elseif ($req->kecamatan) 
    //   //  {
    //   //   $data = $data->whereHas('gampong.kemukiman.kecamatan', function($query)use($req)
    //   //                                                     {
    //   //                                                      $query->where('kecamatan_id', $req->kecamatan);
    //   //                                                     }
    //   //                           )->get();
    //   // } 
    //   //  elseif ($req->kemukiman) 
    //   // {
    //   //   $data = $data->whereHas('gampong.kemukiman', function($query)use($req)
    //   //                                           {
    //   //                                             $query->where('kemukiman_id', $req->kemukiman);
    //   //                                           }
    //   //                           )->get();

    //   // } 
     
    //   // elseif  ($req->gampong) 
    //   // {
    //   //   $data = $data->whereHas('gampong', function($query)use($req)
    //   //                                           {
    //   //                                             $query->where('gampong_id', $req->gampong);
    //   //                                           }
    //   //                           )->get();
    //   // } 

     
     
 




    //   if ($req->search) 
    //   {
    //     $data = $data->where('no_registrasi', 'LIKE' ,'%'.$req->search.'%')
    //                  ->orWhere('risalah', 'LIKE' ,'%'.$req->search.'%');
    //   }


    //   // $pagination = $req->pagination ? (int)$req->pagination : 15;

    //   // if ($pagination) 
    //   // {
    //   //   $data = $data->orderBy('created_at', 'desc')->paginate($pagination);
    //   // } 
    //   // else 
    //   // {
    //   //   $data = $data->orderBy('created_at', 'desc')->get();
    //   // }


    //   // if ($req->export) 
    //   // {
    //   //   set_time_limit(6000);
    //   //   $pdf = PDF::loadView('view_pdf.konsultasi_permohonan', $data);

    //   //   return $pdf->download('konsultasi_permohonan.pdf');
    //   // }


    //   return view('view_admin_dpa.dpa_pending')->with('filter', $filter)
    //                                            ->with('data', $data);
    // }



 







   


  //    public function createDPA($id,$dusun_kode,$nama)
  //   {
  //     $bagian        = Bagian::all(); 
  //     $unsur         = Unsur::all();
  //     $hal           = Hal::all();
  //     $sektoral      = Sektoral::all();



  //    return view('view_admin_dpa.dpa_add')->with('dusun_id', $id)
  //                                         ->with('dusun_kode', $dusun_kode)
  //                                         ->with('nama', $nama)
  //                                         ->with('bagian', $bagian)
  //                                         ->with('unsur', $unsur)
  //                                         ->with('hal', $hal)
  //                                         ->with('sektoral', $sektoral);
                                         
  //   }






  //    //SETELAH KLIK MENU SIMPAN, PASSING PARAMETER2 TAMBAH DAN DIVALIDASI SERTA DISIMPAN
  //   public function saveDPA(Request $req, $dusun_id)
  //   {
  //     $req->validate([
           
   
  //       'sektoral'              => 'required|integer',
  //       'hal'                   => 'required|integer',
  //       'unsur'                 => 'required|integer',
  //       'bagian'                => 'required|integer',
  //       'lokasi'                => 'required|string',
  //       'waktu'                 => 'required|string',

  //       'bel_operasi'           => 'required|integer',
  //       'bel_modal'             => 'required|integer',
  //       'bel_takterduga'        => 'required|integer',
  //       'bel_transfer'          => 'required|integer',

    
  //       'item_nama.*'             => 'required|string',
  //       'item_lingkup.*'          => 'required|string',
  //       'item_koefisien.*'        => 'required|integer',
  //       'item_satuan.*'           => 'required|string',
  //       'item_harga.*'            => 'required|integer',
  //       'item_ppn.*'              => 'required|integer',
  //       'item_targetfisik.*'      => 'required|integer',
  //       'item_targetkeuangan.*'   => 'required|integer'
        
       
       
  //     ]);


  //   // $hari_ini = Carbon::now('Asia/Jakarta');

  //   // //JUMLAH REKAM MEDIK HARI INI
  //   // $jml_konsultasi_hari_ini = Konsultasi::whereDate('created_at', $hari_ini)
  //   //                                      ->orderBy('created_at', 'desc')
  //   //                                      ->orderBy('id', 'desc')
  //   //                                      ->first();

  //   // $jml_konsultasi_hari_ini = $jml_konsultasi_hari_ini ? substr($jml_konsultasi_hari_ini->no_registrasi, 12) : -1;

  //   // $no_registrasi = str_pad(2,2,'0',STR_PAD_LEFT)
  //   //                 .str_pad(2,2,'0',STR_PAD_LEFT)
  //   //                 .$hari_ini->format('dmY')
  //   //                 .str_pad(((int)$jml_konsultasi_hari_ini)+1,4,'0',STR_PAD_LEFT);


      
  //     //SIMPAN KE TABEL KONSULTASI DENGAN ID(PRIMARY KEY) NYA AUTO INCREMENT
  //     $data                       = new Konsultasi;
  //     $data->sektoral_id          = $req->sektoral;
  //     $data->dusun_id             = $dusun_id;
  //     $data->hal_id               = $req->hal;
  //     $data->unsur_id             = $req->unsur;
  //     $data->bagian_id            = $req->bagian;

  //     $data->bel_operasi          = $req->bel_operasi;
  //     $data->bel_modal            = $req->bel_modal;
  //     $data->bel_takterduga       = $req->bel_takterduga;
  //     $data->bel_transfer         = $req->bel_transfer;

  //     $data->lokasi               = $req->lokasi;
  //     $data->waktu                = $req->waktu;

  //     $data->save(); 

  //     $konsultasi_id=$data->id;

  //     $data_dpa=$req->item_nama ? $req->item_nama :[];

  //     foreach($data_dpa as $key => $value)
  //     {
  //     $data                       = new Item;
  //     $data->konsultasi_id        = $konsultasi_id;
  //     $data->belanja_id           = 2;
  //     $data->item_nama            = $req->item_nama[$key];
  //     $data->item_lingkup         = $req->item_lingkup[$key];
  //     $data->item_koefisien       = $req->item_koefisien[$key];
  //     $data->item_satuan          = $req->item_satuan[$key];
  //     $data->item_harga           = $req->item_harga[$key];
  //     $data->item_ppn             = $req->item_ppn[$key];
  //     $data->item_targetfisik     = $req->item_targetfisik[$key];
  //     $data->item_targetkeuangan  = $req->item_targetkeuangan[$key];
  //     $data->save();
  //     }


  //   //KETIKA DATA KONSULTASI SUDAH DISIMPAN KE TABEL, MAKA DIDAPATILAH ID KONSULTASI 
  //    // $konsultasi_id              = $data->id;

  //   //SIMPAN KE TABEL JURNALKONSULTASI
  //   //  $data                       = new JurnalKonsultasi;
  //   //$data->id                   = AI(BELUM DIKETAHUI SEBELUM DIINPUTKAN KE TABEL)
  //   //  $data->konsultasi_id        = $konsultasi_id;
  //   //  $data->status_konsultasi_id = 1;
      
  //  //   $data->save();


  //     // //SIMPAN KE TABEL DOKUMEN
  //     // if($req->hasfile('dokumen'))
  //     // {
  //     //     foreach($req->file('dokumen') as $file)
  //     //     {
  //     //       $name = time().uniqid().'.'.$file->getClientOriginalExtension();

  //     //       $file->move(public_path()."/uploads/", $name);

  //     //       $data                = new Dokumen;
  //     //       $data->konsultasi_id = $konsultasi_id;
  //     //       $data->nama          = $file->getClientOriginalName();
  //     //       $data->lokasi_file   = $name;
  //     //       $data->save();
  //     //     }
  //     // }

  //     return redirect()->route('admin.dpa.pending')
  //                      ->with('success', 'PENAMBAHAN DPA berhasil');
  //   }



  //   public function prosesDetail(Request $req, $konsultasi_id)
  //   {
  //    $req->validate([
  //                      'tahapan.*' => 'nullable|integer',
  //                    ]);


  //    $tahapan = $req->tahapan ? $req->tahapan : [];

  //    Tahapan::where('konsultasi_id', $konsultasi_id)
  //           ->whereIn('no', $tahapan)
  //           ->update(['selesai' => 1,]);


  //    Tahapan::where('konsultasi_id', $konsultasi_id)
  //           ->whereNotIn('no', $tahapan)
  //           ->update(['selesai' => 0,]);



  //    // $no_registrasi = Konsultasi::select(['id', 'no_registrasi'])
  //    //                           ->where('id', $konsultasi_id)
  //    //                           ->firstOrFail()->no_registrasi;




  //    return redirect()->route('admin.rekammedik.terekap')
  //                     ->with('success', count($tahapan).' Tahapan di konsultasi dengan no registrasi '.$no_registrasi.' berhasil diselesaikan');
  //  }

   





  // //PENGEDITAN REKAM MEDIK
  //   public function editDPA($id)
  //   {
    
  //     //$data = JurnalKonsultasi::where('jurkon_id', $id)->first();
  //     $bagian        = Bagian::all(); 
  //     $unsur         = Unsur::all();
  //     $hal           = Hal::all();
  //     $sektoral      = Sektoral::all();


  //     $data = Konsultasi::with(
  //       [
  //                                'jurnalKonsultasi' => function($q)
  //                                                      {
  //                                                       $q->orderBy('status_konsultasi_id', 'asc')->get();
  //                                                      },
  //                                ],
  //                                 'jurnalKonsultasi.statusKonsultasi',
  //                                'dokumen',
  //                               'sektoral'
  //                             )
  //                      // ->where('umum_id', session('umum_atau_administrator_id'))
  //                       ->where('id', $id)
  //                       ->first();


  //     // if ($data->jurnalKonsultasi->last()['status_konsultasi_id'] > 1) 
  //     // {
  //     //   return redirect()->route('karyawan_rekammedik.karyawan_rm')
  //     //                    ->with('warning', 'Rekam Medik ini tidak dapat diedit karena sudah diverifikasi');
  //     // }

  //    // $jurnalKonsultasi = $data->jurnalKonsultasi->first();

  //    // $data->tanggal_konsultasi = Carbon::parse($jurnalKonsultasi['waktu'])->format('Y-m-d');
  //   //  $data->pukul_konsultasi   = Carbon::parse($jurnalKonsultasi['waktu'])->format('H:i');
    

  //     return view('view_admin_dpa.dpa_edit')->with('data', $data)
  //                                           ->with('hal', $hal)
  //                                           ->with('unsur', $unsur)
  //                                           ->with('sektoral', $sektoral)
  //                                           ->with('bagian', $bagian);
  //   }






  //   public function updateDPA(Request $req, $id, $dusun_id)
  //   {
  
  //       $req->validate(
  //                       [

  //                       'sektoral'              => 'required|integer',
  //                       'hal'                   => 'required|integer',
  //                       'unsur'                 => 'required|integer',
  //                       'bagian'                => 'required|integer',

  //                       'bel_operasi'           => 'required|integer',
  //                       'bel_modal'             => 'required|integer',
  //                       'bel_takterduga'        => 'required|integer',
  //                       'bel_transfer'          => 'required|integer',
  //                       'lokasi'                => 'required|string'
                     
                     
  //                     ]
  //                   );

  //       $hari_ini                = Carbon::now('Asia/Jakarta');
  //       $jml_konsultasi_hari_ini = Konsultasi::whereDate('created_at', $hari_ini)
  //                                            ->orderBy('created_at', 'desc')
  //                                            ->orderBy('id', 'desc')
  //                                            ->first();

        
  //       $data = Konsultasi::findOrFail($id);
       
  //       $data->sektoral_id          = $req->sektoral;
  //       $data->unsur_id             = $req->unsur;
  //       $data->hal_id               = $req->hal;
  //       $data->bagian_id            = $req->bagian; 
  //       $data->bel_operasi          = $req->bel_operasi;
  //       $data->bel_modal            = $req->bel_modal;
  //       $data->bel_takterduga       = $req->bel_takterduga;
  //       $data->bel_transfer         = $req->bel_transfer;
  //       $data->no_registrasi        = $req->lokasi;
      
  //       $data->save();

  //       return redirect()->route('admin.dpa.setuju')
  //                        ->with('success', 'DPA berhasil diedit');
  //   }


    
    
  //   public function deleteFileDPA(Request $req)
  //   {
  //     $lokasi_file = $req->file;
  //     $data = Dokumen::where('lokasi_file', $lokasi_file);
  //     $dokumen = $data->firstOrFail();

  //     try {
  //       unlink(public_path('uploads/'.$dokumen->lokasi_file));
  //     } catch (\Exception $e) {

  //     }

  //     $konsultasi_id = $dokumen->konsultasi_id;
  //     $nama = $dokumen->nama;

  //     $data->delete();

  //     return redirect()->route('karyawan_rekammedik.karyawan_rm_edit.edit', $konsultasi_id)
  //                      ->with('success', 'Dokumen '.$nama.' berhasil dihapus');
  //   }




  //   public function deleteDPA(Request $req)
  //   {

  //     $req->validate(['check.*' => 'required|integer']);



  //      $check = $req->check ? $req->check : [];

  //      $data = Konsultasi::with([
  //                               'jurnalKonsultasi',
  //                               'jurnalKonsultasi.statusKonsultasi',
  //                               'dokumen'
  //                             ])->whereIn('id', $check)
  //                               ->where('umum_id', session('umum_atau_administrator_id'))
  //                               ->first();


  //     //dd($id);

  
  //    if($data->jurnalKonsultasi->last()['status_konsultasi_id'] > 1)
  //    {
  //      return redirect()->route('admin_dpa.dpa')
  //                         ->with('warning', 'Rekam Medik ini tidak dapat dihapus karena sudah diverifikasi');

  //    }
  //    else
  //    {
    
  //     $konsultasi=$data->get();
     
  //     foreach ($konsultasi as $key => $value) 
  //     {
 
  //     foreach ($value->dokumen as $i => $dokumen) 
  //              {
  //               try 
  //                 {
  //                  unlink(public_path('uploads/'.$dokumen->lokasi_file));
  //                 } 
  //               catch(\Exception $e) 
  //                 {

  //                 }
  //              }
             
  //       }

  //     $data->delete();

  //     return redirect()->route('admin_dpa.dpa')
  //                       ->with('success', count($req->check).' data DPA berhasil dihapus');
  //    }
  //   }








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


