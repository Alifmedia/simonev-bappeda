<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;


//use Illuminate\Database\Eloquent\Builder;

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

use App\Models\Periode;
use App\Models\Renstra;
use App\Models\Renssasar;
use App\Models\Renssasartarget;
use App\Models\Renssasarprog;
use App\Models\Renssasarprogtarget;
use App\Models\Renssasarprogkeg;
use App\Models\Renssasarprogkegtarget;
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



class KaryawanMatrixController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('level:umum');
    }



     
      
    //MENAMPILKAN REKAM MEDIK--------------------------------------------------------------
    public function matrix(Request $req)
    {


    
      $filter['periode']  = Periode::all();
      $filter['hal']      = Hal::all(); 
      $filter['sektoral'] = Sektoral::all();
      $filter['unsur']    = Unsur::all();
      $filter['bagian']   = Bagian::all();
     

       


       $data = Renssasar::with('indikatorrenssasar.renssasarprog.indikatorrenssasarprog.renssasarprogkeg')->whereHas('indikatortujuan.tujuan.renstra.sektoral.umumsektoral',
                                            function($query)
                                             {
                                              $query->where('umum_id', session('umum_atau_administrator_id'));
                                             }
                              )->get();


     
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


      return view('view_karyawan_matrix.karyawan_matrix')->with('filter', $filter)
                                                      ->with('data', $data);
    }



  public function matrixRenja(Request $req)
    {
    
    
      $filter['sektoral'] = Sektoral::all();
      $filter['unsur']    = Unsur::all();
      $filter['bagian']   = Bagian::all();
     
     //$filter['status']   = StatusKonsultasi::all();
     $filter['periode']   = Periode::all(); 
     
      $filter['hal']      = Hal::all();
     
      //$filter['dusun']     = [];

      
      
//carilah semua KEGIATAN/GAMPONG YANG TELAH DIMASUKKAN KEDALAM RENSSASARPROGKEG YANG MANA UMUM_ID OPD nya adalah sama dengan session
    //  $data = Renssasarprog::with('indikatorrenssasarprog')->whereHas('renssasar.tujuan.renstra.sektoral',
   //                                         function($query)
    //                                         {
   //                                           $query->where('umum_id', session('umum_atau_administrator_id'));
    //                                         }
    //                            )->get();


  $data = Kabupaten::whereHas('kecamatan.kemukiman.renssasarprog.indikatorrenssasar.renssasar.indikatortujuan.tujuan.renstra.sektoral.umumsektoral',
                                            function($query)
                                             {
                                              $query->where('umum_id', session('umum_atau_administrator_id'));
                                             }
                                )->get();


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
      //    $filter['gampong'] = Gampong::where('kemukiman_id', $req->kiman)->get();
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

return view('view_karyawan_matrix.karyawan_matrix_renja')->with('filter', $filter)
                                                       
                                                      ->with('data', $data);
    }



    //SETELAH KLIK MENU TAMBAH, TAMPILKAN FORM PENAMBAHAN
    public function createRM($id,$dusun_id,$dusun_kode,$nama)
    { 
      $bagian        = Bagian::all(); 
      $unsur         = Unsur::all();
      $hal           = Hal::all();
      $sektoral      = Sektoral::all();


      //$data=Item::where('dusun_id', $dusun_id);
       $data=Item::where('konsultasi_id', $id)->get();

      //dd($data);


     return view('view_karyawan_rekammedik.karyawan_rm_add')->with('id', $id)
                                                            ->with('dusun_id',$dusun_id)
                                                            ->with('dusun_kode', $dusun_kode)
                                                            ->with('nama', $nama)
                                                            ->with('bagian', $bagian)
                                                            ->with('unsur', $unsur)
                                                            ->with('hal', $hal)
                                                            ->with('data', $data)
                                                            ->with('sektoral', $sektoral);
    }



    //dd()

    //SETELAH KLIK MENU SIMPAN, PASSING PARAMETER2 TAMBAH DAN DIVALIDASI SERTA DISIMPAN
    public function saveRM(Request $req,$id)
    {
      $req->validate([
           
      //   // 'sektoral'              => 'required|integer',
      //   // 'hal'                   => 'required|integer',
      //   // 'unsur'                 => 'required|integer',
      //   // 'bagian'                => 'required|integer',
      //   // 'lokasi'                => 'required|string',

         'jumlah_fisik.*'           => 'required|integer',
         'jumlah_keuangan.*'        => 'required|integer',
      //   //'dokumen.*'                => 'nullable|file|mimes:pdf'

      ]);

       //$pemangku = $req->pemangku ? $req->pemangku : [];
       
       //$konsultasi->pemangku()->sync($pemangku);

//$nama=$req->nama_item ? ;

//dd($nama);
    // $hari_ini = Carbon::now('Asia/Jakarta');

    // //JUMLAH REKAM MEDIK HARI INI
    // $jml_konsultasi_hari_ini = Konsultasi::whereDate('created_at', $hari_ini)
    //                                      ->orderBy('created_at', 'desc')
    //                                      ->orderBy('id', 'desc')
    //                                      ->first();

    // $jml_konsultasi_hari_ini = $jml_konsultasi_hari_ini ? substr($jml_konsultasi_hari_ini->no_registrasi, 12) : -1;

    // $no_registrasi = str_pad(2,2,'0',STR_PAD_LEFT)
    //                 .str_pad(2,2,'0',STR_PAD_LEFT)
    //                 .$hari_ini->format('dmY')
    //                 .str_pad(((int)$jml_konsultasi_hari_ini)+1,4,'0',STR_PAD_LEFT);


      
      //SIMPAN KE TABEL KONSULTASI DENGAN ID(PRIMARY KEY) NYA AUTO INCREMENT

       $data_realisasi=$req->nama_item ? $req->nama_item :[];
      
       //dd($data_realisasi);
       
       foreach($data_realisasi as $key =>$value )
       {
        
        $data = new JurnalKonsultasi;

        $data->item_id                   = $req->id_item[$key];
        $data->status_konsultasi_id      = 1;
        $data->administrator_id          = 1;
        $data->realisasi_fisik           = $req->jumlah_fisik[$key];
        $data->realisasi_keuangan        = $req->jumlah_keuangan[$key];
        $data->save();
                                          
       }

      // jurnalKonsultasi::insert($finalArray);

      //SIMPAN KE TABEL DOKUMEN
      // if($req->hasfile('dokumen'))
      // {
      //     foreach($req->file('dokumen') as $file)
      //     {
      //       $name = time().uniqid().'.'.$file->getClientOriginalExtension();

      //       $file->move(public_path()."/uploads/", $name);

      //       $data                = new Dokumen;
      //       $data->konsultasi_id = $id;
      //       $data->nama          = $file->getClientOriginalName();
      //       $data->lokasi_file   = $name;
      //       $data->save();
      //     }
      // }

      return redirect()->route('karyawan_rekammedik.karyawan_rm')
                       ->with('success', 'PENAMBAHAN REALISASI berhasil');
    }






    public function rekammedik_pending(Request $req)
    {
      
      $filter['status']   = StatusKonsultasi::all();

      $filter['kabupaten'] = Kabupaten::all();
      $filter['kecamatan'] = [];
      $filter['kemukiman'] = [];
      $filter['gampong']   = [];
      $filter['dusun']     = [];

      $filter['unsur']         = Unsur::all();
      $filter['hal']           = Hal::all();
      $filter['bagian']        = Bagian::all(); 
      $filter['satuankerja']   = Satuankerja::all();

      
      // $data = Konsultasi::with('sektoral')->with(['sektoral.umum'=>function($q)
      //                                                {
      //                                                $q->where('umum_id', 
      //                                                           session('umum_atau_administrator_id'));
      //                                               } ])->get();


      // $data = Konsultasi::with(
      //                          'jurnalKonsultasi'
                                                   
      //                         )->whereHas('sektoral.umum',
      //                                        function($q)
      //                                                   {
      //                                                   $q->where('umum_id',
      //                                                              session('umum_atau_administrator_id')
      //                                                            );
      //                                                   }
      //                                   )->get();


      $data = JurnalKonsultasi::with(
                                
                                      'item.konsultasi',
                                      'item.konsultasi.dokumen'
                                      // ['konsultasi.sektoral'=>function($q)
                                      //                         {
                                      //                          $q->where('umum_id',
                                      //                                     session('umum_atau_administrator_id')
                                      //                                   )->get();
                                      //                         }
                                      // ]


                                                                                  
                                                  

                                     
                                     )->where('status_konsultasi_id',1)->get();

    // $data= Konsultasi::select

    //   $totalbelanja=DB::table('konsultasi')->where('konsultasi_id',$id)->count(var)->get();
      
    //   $totalrealisasi=DB::table('jurnalKonsultasi')->where('konsultasi_id',$id)->count(var)->get();

    //   $persentase=($totalrealisasi/$totalbelanja)x100;
      // dd($data->id);
      // $dpa_id = $data->id;                                              
     
      // $data_realisasi = JurnalKonsultasi::where('konsultasi_id',$dpa_id)->get();




     //   if ($req->kabupaten) 
     //  {
     //    $kecamatan = Kecamatan::where('kabupaten_id', $req->kabupaten)->get();

     //    $data = $data->whereHas('gampong.kemukiman.kecamatan', function($q)use($req)
     //    {
     //           $q->where('kabupaten_id', $req->kabupaten);
     //    }
     // }


     //   if ($req->kecamatan) 
     //  {
     //    $kemukiman = Kemukiman::where('kecamatan_id', $req->kecamatan)->get();

     //    $data = $data->whereHas('gampong.kemukiman', function($q)use($req)
     //     {
     //       $q->where('kecamatan_id', $req->kecamatan);
     //     }

     //  }

     //    if ($req->kemukiman) 
     //  {
     //    $gampong = Gampong::where('kemukiman_id', $req->kemukiman)->get();

     //     $data = $data->whereHas('gampong', function($q)use($req)
     //     {
     //      $q->where('kemukiman_id', $req->kemukiman);
     //     }

     //  }

     //   if ($req->gampong) 
     //  {
     //    $data = $data->where('gampong_id', $req->gampong);
     //  }





    

      if ($req->status_konsultasi) 
      {
        $data = $data->whereHas('jurnalKonsultasi', function($q)use($req)
                                                   {
                                                    $q->where('status_konsultasi_id', $req->status_konsultasi);
                                                   }
                                );
      }

      //$data = $data->orderBy('id', 'desc')->paginate(20);

      //dd($data);

      return view('view_karyawan_rekammedik.karyawan_rm_pending')->with('data', $data)
                                                         //->with('data_realisasi',$data_realisasi)
                                                          ->with('filter', $filter);
    }





public function rekammedik_tertolak(Request $req)
    {
      
      $filter['status']   = StatusKonsultasi::all();

      $filter['kabupaten'] = Kabupaten::all();
      $filter['kecamatan'] = [];
      $filter['kemukiman'] = [];
      $filter['gampong']   = [];
      $filter['dusun']     = [];

      $filter['unsur']         = Unsur::all();
      $filter['hal']           = Hal::all();
      $filter['bagian']        = Bagian::all(); 
      $filter['satuankerja']   = Satuankerja::all();

      
      // $data = Konsultasi::with('sektoral')->with(['sektoral.umum'=>function($q)
      //                                                {
      //                                                $q->where('umum_id', 
      //                                                           session('umum_atau_administrator_id'));
      //                                               } ])->get();


      // $data = Konsultasi::with(
      //                          'jurnalKonsultasi'
                                                   
      //                         )->whereHas('sektoral.umum',
      //                                        function($q)
      //                                                   {
      //                                                   $q->where('umum_id',
      //                                                              session('umum_atau_administrator_id')
      //                                                            );
      //                                                   }
      //                                   )->get();


     $data = JurnalKonsultasi::with([
                                
                                      'item.konsultasi',
                                      'item.konsultasi.dokumen',
                                      // 'item.konsultasi.sektoral.umum'=> function($q)
                                      //                              {
                                      //                               $q->where('umum_id',
                                      //                                          session('umum_atau_administrator_id')
                                      //                                        );
                                      //                               }

                                      ])
                                                                    //->where('status_konsultasi_id',2)                                 ->orderBy('created_at', 'asc')
                                       ->get();


    // $data= Konsultasi::select

    //   $totalbelanja=DB::table('konsultasi')->where('konsultasi_id',$id)->count(var)->get();
      
    //   $totalrealisasi=DB::table('jurnalKonsultasi')->where('konsultasi_id',$id)->count(var)->get();

    //   $persentase=($totalrealisasi/$totalbelanja)x100;
      // dd($data->id);
      // $dpa_id = $data->id;                                              
     
      // $data_realisasi = JurnalKonsultasi::where('konsultasi_id',$dpa_id)->get();




     //   if ($req->kabupaten) 
     //  {
     //    $kecamatan = Kecamatan::where('kabupaten_id', $req->kabupaten)->get();

     //    $data = $data->whereHas('gampong.kemukiman.kecamatan', function($q)use($req)
     //    {
     //           $q->where('kabupaten_id', $req->kabupaten);
     //    }
     // }


     //   if ($req->kecamatan) 
     //  {
     //    $kemukiman = Kemukiman::where('kecamatan_id', $req->kecamatan)->get();

     //    $data = $data->whereHas('gampong.kemukiman', function($q)use($req)
     //     {
     //       $q->where('kecamatan_id', $req->kecamatan);
     //     }

     //  }

     //    if ($req->kemukiman) 
     //  {
     //    $gampong = Gampong::where('kemukiman_id', $req->kemukiman)->get();

     //     $data = $data->whereHas('gampong', function($q)use($req)
     //     {
     //      $q->where('kemukiman_id', $req->kemukiman);
     //     }

     //  }

     //   if ($req->gampong) 
     //  {
     //    $data = $data->where('gampong_id', $req->gampong);
     //  }





    

      if ($req->status_konsultasi) 
      {
        $data = $data->whereHas('jurnalKonsultasi', function($q)use($req)
                                                   {
                                                    $q->where('status_konsultasi_id', $req->status_konsultasi);
                                                   }
                                );
      }

      //$data = $data->orderBy('id', 'desc')->paginate(20);

      //dd($data);

      return view('view_karyawan_rekammedik.karyawan_rm_tertolak')->with('data', $data)
                                                         //->with('data_realisasi',$data_realisasi)
                                                          ->with('filter', $filter);
    }








  //PENGEDITAN REKAM MEDIK
    public function editRM($id)
    {

      //$data = JurnalKonsultasi::where('jurkon_id', $id)->first();


      $data = Konsultasi::with([
                                'jurnalKonsultasi' => function($q)
                                                      {
                                                       $q->orderBy('status_konsultasi_id', 'asc')
                                                       ->get();
                                                      },
                                'jurnalKonsultasi.statusKonsultasi',
                                'dokumen',
                              ])
                        ->where('umum_id', session('umum_atau_administrator_id'))
                        ->where('id', $id)
                        ->first();


      if ($data->jurnalKonsultasi->last()['status_konsultasi_id'] > 1) 
      {
        return redirect()->route('karyawan_rekammedik.karyawan_rm')
                         ->with('warning', 'Rekam Medik ini tidak dapat diedit karena sudah diverifikasi');
      }

     // $jurnalKonsultasi = $data->jurnalKonsultasi->first();

     // $data->tanggal_konsultasi = Carbon::parse($jurnalKonsultasi['waktu'])->format('Y-m-d');
    //  $data->pukul_konsultasi   = Carbon::parse($jurnalKonsultasi['waktu'])->format('H:i');
    

      return view('view_karyawan_rekammedik.karyawan_rm_edit')->with('data', $data);
    }




    public function updateRM(Request $req, $id)
    {
        $req->validate(
                        [


                        'sektoral'              => 'required|integer',
                        'hal'                   => 'required|integer',
                        'unsur'                 => 'required|integer',
                        'bagian'                => 'required|integer',

                        'bel_operasi'           => 'required|integer',
                        'bel_modal'             => 'required|integer',
                        'bel_takterduga'        => 'required|integer',
                        'bel_transfer'          => 'required|integer',
                        'lokasi'                => 'required|string',
                        'dokumen.*'             => 'nullable|file|mimes:pdf'
                    
                     
                      ]
                    );

        $hari_ini                = Carbon::now('Asia/Jakarta');
        $jml_konsultasi_hari_ini = Konsultasi::whereDate('created_at', $hari_ini)
                                             ->orderBy('created_at', 'desc')
                                             ->orderBy('id', 'desc')
                                             ->first();

        $data = Konsultasi::findOrFail($id);

        // $data->RM_risalah        = $req->risalah;
         $data->RM_Hemoglobin     = $req->Hemoglobin;
         $data->RM_Eritrosit      = $req->Eritrosit;
         $data->RM_Trombosit      = $req->Trombosit;
         $data->RM_Leukosit       = $req->Leukosit;
         $data->RM_Hematokrit     = $req->Hematokrit;
         $data->RM_LED            = $req->LED;
         $data->RM_GlukosaPuasa   = $req->GlukosaPuasa;
         $data->RM_HbA1C          = $req->HbA1C;
         $data->RM_Ureum          = $req->Ureum;
         $data->RM_Creatinin      = $req->Creatinin;
         $data->RM_AsamUrat       = $req->AsamUrat;
         $data->RM_KolesterolTotal= $req->KolesterolTotal;
         $data->RM_LDLKolesterol  = $req->LDLKolesterol;
         $data->RM_HDLKolesterol  = $req->HDLKolesterol;
         $data->RM_Trigliserida   = $req->Trigliserida;
         $data->RM_SGOT           = $req->SGOT;
         $data->RM_SGPT           = $req->SGPT;
         $data->RM_GammaGT        = $req->GammaGT;
         $data->RM_Sistole        = $req->Sistole;
         $data->RM_Diastole       = $req->Diastole;
         $data->RM_TinggiBadan    = $req->TinggiBadan;
         $data->RM_BeratBadan     = $req->BeratBadan;
         $data->RM_LingkarPerut   = $req->LingkarPerut;
             
        $data->save();


        // JurnalKonsultasi::where('jurkon_id', $id)
        //                 ->where('status_konsultasi_id', 1)
         //                ->update([
                            
                                
         //                       ]);

       // JurnalKonsultasi::where('konsultasi_id', $id)
        //                 ->where('status_konsultasi_id', '!=', 1)
       //                  ->delete();

        

        // // REVISI DOKUMEN
        // if($req->hasfile('dokumen'))
        // {
        //     foreach($req->file('dokumen') as $file)
        //     {
        //       $name = time().uniqid().'.'.$file->getClientOriginalExtension();

        //       $file->move(public_path()."/uploads/", $name);

        //       $data = new Dokumen;
        //      $data->konsultasi_id = $id;
        //      $data->nama          = $file->getClientOriginalName();
        //       $data->lokasi_file   = $name;
        //      $data->save();
        //     }
        //  }

        return redirect()->route('karyawan_rekammedik.karyawan_rm.edit', $id)
                         ->with('success', 'Rekam Medik berhasil diedit');
    }


    
    
    public function deleteFileRM(Request $req)
    {
      $lokasi_file = $req->file;
      $data = Dokumen::where('lokasi_file', $lokasi_file);
      $dokumen = $data->firstOrFail();

      try {
        unlink(public_path('uploads/'.$dokumen->lokasi_file));
      } catch (\Exception $e) {

      }

      $konsultasi_id = $dokumen->konsultasi_id;
      $nama = $dokumen->nama;

      $data->delete();

      return redirect()->route('karyawan_rekammedik.karyawan_rm_edit.edit', $konsultasi_id)
                       ->with('success', 'Dokumen '.$nama.' berhasil dihapus');
    }




    public function deleteRM(Request $req)
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
       return redirect()->route('karyawan_rekammedik.karyawan_rm')
                          ->with('warning', 'Rekam Medik ini tidak dapat dihapus karena sudah diverifikasi');

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

      return redirect()->route('karyawan_rekammedik.karyawan_rm')
                        ->with('success', count($req->check).' data rekam medik berhasil dihapus');
     }
    }


//----------------------------------------------------------------------------------------------
    public function undanganRM($id)
    {
        $data = Konsultasi::with(['jurnalKonsultasi' => function($q)
                                                         {
                                                              $q->where('status_konsultasi_id', 4)->get();
                                                               },  
                                  'jurnalKonsultasi.terjadwal.administrator',
                                  'jurnalKonsultasi.terjadwal.ruang',
                          ])
                          ->where('id', $id)
                          ->firstOrFail();

        if (!$data->terjadwal) {
          return redirect()->route('karyawan_rekammedik.karyawan_rm')
                           ->with('warning', 'Konsultasi belum dijadwalkan');
        }

        $jurnalKonsultasi = $data->jurnalKonsultasi->first();
        $data->tanggal_konsultasi = Carbon::parse($jurnalKonsultasi['waktu'])->formatLocalized('%A, %d %B %Y');
        $data->pukul_konsultasi = Carbon::parse($jurnalKonsultasi['waktu'])->format('H:i');
        $data->jumlah_delegasi = $jurnalKonsultasi['jumlah_delegasi'];
        $data->jurnal_konsultasi_created_at = Carbon::parse($data['jurnal_konsultasi']['created_at'])->formatLocalized('%A, %d %B %Y');

        // return view('view_pdf.pengguna_permohonan_pdf')->with('data', $data);

        // dd($data);

        set_time_limit(6000);
        $pdf = PDF::loadView('view_pdf.pengguna_permohonan_pdf', compact('data'));

        return $pdf->download('konsultasi_permohonan.pdf');
    }
 


    ///////////////////////////INFORMASI-------------------------------------------------------
    public function informasi(Request $req)
    {
        //$filter['hal'] = Hal::all();
        $filter['jenis'] = JenisPeraturan::all();

        $data = Peraturan::with(['jenisPeraturan', 'hal'])->orderBy('id', 'desc');

        if ($req->search) 
        {
          $data = $data->where('nama', 'LIKE', '%'.$req->search.'%');
        }

        // if ($req->hal) 
        // {
        //   $data = $data->where('hal_id', $req->hal);
        // }

        if ($req->jenis) 
        {
          $data = $data->where('jenis_peraturan_id', $req->jenis);
        }

        $data = $data->paginate(15);

        return view('view_karyawan_informasi.karyawan_informasi.informasi')->with('data', $data)
                                                       ->with('filter', $filter);
    }


    ///////////////////////////FAQ-------------------------------------------------------------
    public function faq(Request $req)
    {
        $data = Faq::orderBy('id', 'asc');

        if ($req->search) 
        {
          $data = $data->where('pertanyaan', 'LIKE', '%'.$req->search.'%');
        }

        $data = $data->get();

        return view('view_karyawan_faq.karyawan_faq.faq')->with('data', $data);
    }
}
