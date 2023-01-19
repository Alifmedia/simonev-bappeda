<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;


//use Illuminate\Database\Eloquent\Builder;

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

use App\Models\Periode;
use App\Models\Tujuan;
use App\Models\Renstra;
use App\Models\Renssasar;
use App\Models\Renssasarprog;
use App\Models\Renssasarprogkeg;
use App\Models\Renssasarprogkegsubkeg;

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

class AdminRenjaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
       // $this->middleware('level:umum');
    }





// public function setup(Request $req)
//     {


//       //$filter['status']   = StatusKonsultasi::all();

//       $filter['sektoral'] = Sektoral::all();
//       $filter['hal']      = Hal::all();
//       $filter['unsur']    = Unsur::all();
//       $filter['bagian']   = Bagian::all();
//       //$filter['dusun']     = [];

//         $filter['kabupaten'] = Kabupaten::all();
//       $filter['kecamatan'] = [];
//       $filter['kemukiman'] = [];
      
//       $filter['gampong']   = [];

//       $filter['dusun']   = [];
     
     
//         if ($req->kabupaten) 
//       {
//          $filter['kecamatan'] = Kecamatan::where('kabupaten_id', $req->kabupaten)->get();
//       }
//       if ($req->kecamatan) 
//       {
//          $filter['kemukiman'] = Kemukiman::where('kecamatan_id', $req->kecamatan)->get();
//        }
//        if ($req->kemukiman) 
//       {
//          $filter['gampong'] = Gampong::where('kemukiman_id', $req->kemukiman)->get();
//        }
         

      
      
//       $data = Gampong::with(['kemukiman.kecamatan.kabupaten']);

    

//          if ($req->gampong) 
//       {
//          $filter['dusun'] = Dusun::where('gampong_id', $req->gampong)->get();
//        }



//         elseif ($req->kemukiman) 
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



                                    

//       // if ($req->kabupaten) 
//       //{
//       //  $kecamatan = Kecamatan::where('kabupaten_id', $req->kabupaten)->get();

//         // $data = $data->whereHas('gampong.kemukiman.kecamatan', function($q)use($req)
//         // {
//         //        $q->where('kabupaten_id', $req->kabupaten);
//         // }
//     //  }
       


//     //    if ($req->kecamatan) 
//     //   {
//     //     $kemukiman = Kemukiman::where('kecamatan_id', $req->kecamatan)->get();

//     //     $data = $data->whereHas('gampong.kemukiman', function($q)use($req)
//     //      {
//     //        $q->where('kecamatan_id', $req->kecamatan);
//     //      }

//     //   }

//     //   if ($req->kemukiman) 
//     //   {
//     //     $gampong = Gampong::where('kemukiman_id', $req->kemukiman)->get();

//     //      $data = $data->whereHas('gampong', function($q)use($req)
//     //      {
//     //       $q->where('kemukiman_id', $req->kemukiman);
//     //      }

//     //   }

//     //    if ($req->gampong) 
//     //   {
//     //     $data = $data->where('gampong_id', $req->gampong);
//     //   }


//     // }
    

//       // if ($req->status_konsultasi) 
//       // {
//       //   $data = $data->whereHas('jurnalKonsultasi', function($q)use($req)
//       //                                              {
//       //                                               $q->where('status_konsultasi_id', $req->status_konsultasi);
//       //                                              }
//       //                           );
//       // }

    

//       // if ($req->search) 
//       // {
//       //   $data = $data->where('no_registrasi', 'LIKE' ,'%'.$req->search.'%')
//       //                ->orWhere('risalah', 'LIKE' ,'%'.$req->search.'%');
//       // }



//       if ($req->sektoral) 
//        {
//          $data = $data->where('sektoral_id', $req->sektoral);
                                  
//        }



//       if ($req->hal) 
//       {
//         $data = $data->where('hal_id', $req->hal);
        
//       }

//       if ($req->unsur) 
//       {
//         $data = $data->where('unsur_id', $req->unsur);
       
//       }


//        if ($req->bagian) 
//       {
//         $data = $data->where('bagian_id', $req->bagian);
       
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


//       // if ($req->export) 
//       // {
//       //   set_time_limit(6000);
//       //   $pdf = PDF::loadView('view_pdf.konsultasi_permohonan', $data);

//       //   return $pdf->download('konsultasi_permohonan.pdf');
//       // }


//       return view('view_admin_renja.renja_setup')->with('filter', $filter)
//                                               // ->with('bagian', $bagian)
//                                               // ->with('hal', $hal)
//                                               // ->with('unsur', $unsur)
//                                                ->with('data', $data);
//     }


public function tahunan(Request $req)
    {


     //$filter['status']   = StatusKonsultasi::all();
      $filter['periode'] = Periode::all(); 
      $filter['sektoral'] = Sektoral::all();
      $filter['hal']      = Hal::where('periode_id',1)->get();
      $filter['unsur']    = Unsur::all();
      $filter['bagian']   = Bagian::all();
      //$filter['dusun']     = [];

      
      
//carilah semua KEGIATAN/GAMPONG YANG TELAH DIMASUKKAN KEDALAM RENSSASARPROGKEG YANG MANA UMUM_ID OPD nya adalah sama dengan session
    //  $data = Renssasarprog::with('indikatorrenssasarprog')->whereHas('renssasar.tujuan.renstra.sektoral',
   //                                         function($query)
    //                                         {
   //                                           $query->where('umum_id', session('umum_atau_administrator_id'));
    //                                         }
    //                            )->get();


  $data = Renssasarprog::whereHas('indikatorrenssasar.renssasar.indikatortujuan.tujuan.renstra.sektoral')->get();


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

      return view('view_admin_renja.renja_tahunan')->with('filter', $filter)
                                              
                                                      ->with('data', $data);
    }





    public function rekapitulasi(Request $req)
    {


      //$filter['status']   = StatusKonsultasi::all();
       $filter['periode'] = Periode::all();
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


      return view('view_admin_renja.renja_rekapitulasi')->with('filter', $filter)
                                              // ->with('bagian', $bagian)
                                              // ->with('hal', $hal)
                                              // ->with('unsur', $unsur)
                                               ->with('data', $data);
    }





//  public function setujuopd(Request $req)
//     {


     
//       //$filter['status']   = StatusKonsultasi::all();
//       $periode            = Periode::all(); 
//       $filter['sektoral'] = Sektoral::all();
//       $filter['hal']      = Hal::all();
//       $filter['unsur']    = Unsur::all();
//       $filter['bagian']   = Bagian::all();
//       //$filter['dusun']     = [];

      
      
// //carilah semua KEGIATAN/GAMPONG YANG TELAH DIMASUKKAN KEDALAM RENSSASARPROGKEG YANG MANA UMUM_ID OPD nya adalah sama dengan session
//       $data = Indikatortujuan::with('renssasar.indikatorrenssasar.renssasarprog.indikatorrenssasarprog.renssasarprogkeg')->whereHas('tujuan.renstra.sektoral')->get();



//       //dd($data);
//       // if ($req->sektoral) 
//       // {
//       //    $filter['kecamatan'] = Kecamatan::where('kabupaten_id', $req->kabupaten)->get();
//       // }
//       // if ($req->kecamatan) 
//       // {
//       //    $filter['kemukiman'] = Kemukiman::where('kecamatan_id', $req->kecamatan)->get();
//       //  }
//       //  if ($req->kemukiman) 
//       // {
//       //    $filter['gampong'] = Gampong::where('kemukiman_id', $req->kemukiman)->get();
//       //  }
//       //    if ($req->kemukiman) 
//       // {
//       //    $filter['dusun'] = Dusun::where('gampong_id', $req->gampong)->get();
//       //  }
                                    

//       // if ($req->kabupaten) 
//       //{
//       //  $kecamatan = Kecamatan::where('kabupaten_id', $req->kabupaten)->get();

//         // $data = $data->whereHas('gampong.kemukiman.kecamatan', function($q)use($req)
//         // {
//         //        $q->where('kabupaten_id', $req->kabupaten);
//         // }
//     //  }
       


//     //    if ($req->kecamatan) 
//     //   {
//     //     $kemukiman = Kemukiman::where('kecamatan_id', $req->kecamatan)->get();

//     //     $data = $data->whereHas('gampong.kemukiman', function($q)use($req)
//     //      {
//     //        $q->where('kecamatan_id', $req->kecamatan);
//     //      }

//     //   }

//     //   if ($req->kemukiman) 
//     //   {
//     //     $gampong = Gampong::where('kemukiman_id', $req->kemukiman)->get();

//     //      $data = $data->whereHas('gampong', function($q)use($req)
//     //      {
//     //       $q->where('kemukiman_id', $req->kemukiman);
//     //      }

//     //   }

//     //    if ($req->gampong) 
//     //   {
//     //     $data = $data->where('gampong_id', $req->gampong);
//     //   }


//     // }
    

//       // if ($req->status_konsultasi) 
//       // {
//       //   $data = $data->whereHas('jurnalKonsultasi', function($q)use($req)
//       //                                              {
//       //                                               $q->where('status_konsultasi_id', $req->status_konsultasi);
//       //                                              }
//       //                           );
//       // }

    

//       // if ($req->search) 
//       // {
//       //   $data = $data->where('no_registrasi', 'LIKE' ,'%'.$req->search.'%')
//       //                ->orWhere('risalah', 'LIKE' ,'%'.$req->search.'%');
//       // }



//       if ($req->sektoral) 
//        {
//          $data = $data->where('sektoral_id', $req->sektoral);
                                  
//        }



//       if ($req->hal) 
//       {
//         $data = $data->where('hal_id', $req->hal);
        
//       }

//       if ($req->unsur) 
//       {
//         $data = $data->where('unsur_id', $req->unsur);
       
//       }


//        if ($req->bagian) 
//       {
//         $data = $data->where('bagian_id', $req->bagian);
       
//       }

   

   

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


//       return view('view_admin_renja.renja_setujuopd')->with('filter', $filter)
//                                               ->with('periode', $periode)
//                                               // ->with('hal', $hal)
//                                               // ->with('unsur', $unsur)
//                                                ->with('data', $data);

//     }
    
// public function deleteProgram(Request $req)
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


// public function deleteKegiatan(Request $req)
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
//                           ->with('warning', 'Rekam Medik ini tidak dapat dihapus karena sudah diverifikasi');

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

//       return redirect()->route('karyawan_renstra.renstra')
//                         ->with('success', count($req->check).' data DPA berhasil dihapus');
//      }
//     }

   




   

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




     


// public function createSubkegiatan($renssasarprogkeg_id, $kegiatan_id, $kegiatan_kode, $kegiatan_nama)
//     {
//       $bagian        = Bagian::all(); 
//       $unsur         = Unsur::all();
//       $hal           = Hal::all();

//       $sektoral           = Sektoral::where('umum_id',session('umum_atau_administrator_id'))->get();

//       $indikator_kegiatan = Indikatorrenssasarprogkeg::where('renssasarprogkeg_id', $renssasarprogkeg_id)->get();

//       $list_subkegiatan   = Dusun::where('gampong_id',$kegiatan_id)->get();



//      return view('view_karyawan_renja.renja_add')->with('renssasarprogkeg_id', $renssasarprogkeg_id)
//                                                  ->with('indikator_kegiatan', $indikator_kegiatan)
//                                                  ->with('kegiatan_id', $kegiatan_id)
//                                                  ->with('kegiatan_kode', $kegiatan_kode)
//                                                  ->with('kegiatan_nama', $kegiatan_nama)
//                                                  ->with('list_subkegiatan', $list_subkegiatan)
//                                                  ->with('bagian', $bagian)
//                                                  ->with('unsur', $unsur)
//                                                  ->with('hal', $hal)
//                                                  ->with('sektoral', $sektoral);
                                         
//     }






//      //SETELAH KLIK MENU SIMPAN, PASSING PARAMETER2 TAMBAH DAN DIVALIDASI SERTA DISIMPAN
//     public function saveSubkegiatan(Request $req, $renssasarprogkeg_id)
//     {
//       $req->validate([
           
//         'subkegiatan'         => 'required|integer',
//         'indikator'           => 'required|string',
//         'lokasi'              => 'required|string',
//         'pagu'                => 'required|integer',
//         'sumberdana'          => 'required|integer',          
//         'hal'                 => 'required|integer',
//         'target'              => 'required|integer'
        
        
       
       
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
//       $data                                       = new Renssasarprogkegsubkeg;
//       $data->renssasarprogkeg_id                  = $renssasarprogkeg_id;
//       $data->dusun_id                             = $req->subkegiatan;
//       $data->tahun_id                             = $req->hal;
//       $data->renssasarprogkegsubkeg_indikator     = $req->indikator;
//       $data->renssasarprogkegsubkeg_target        = $req->target;
//       $data->bagian_id                            = $req->sumberdana;     
//       $data->renssasarprogkegsubkeg_lokasi        = $req->lokasi;
//       $data->renssasarprogkegsubkeg_paguindikatif = $req->pagu;
//       $data->save(); 

     


   

//       //return view('view_karyawan_renstra.renstra_kegiatan')
//       return redirect()->route('karyawan.renja.setujuopd')
//                        ->with('success', 'PENAMBAHAN Subkegiatan RENJA berhasil');
//     }




// //   public function editSubkegiatan($id)
// //     {
    
// //       //$data = JurnalKonsultasi::where('jurkon_id', $id)->first();
// //       $bagian        = Bagian::all(); 
// //       $unsur         = Unsur::all();
// //       $kegiatan      = Gampong::all();
// //       $sasaran       = Renssasar::all();


// //       $data = Renssasarprogkeg::where('id', $id)->first();


// //       // if ($data->jurnalKonsultasi->last()['status_konsultasi_id'] > 1) 
// //       // {
// //       //   return redirect()->route('karyawan_rekammedik.karyawan_rm')
// //       //                    ->with('warning', 'Rekam Medik ini tidak dapat diedit karena sudah diverifikasi');
// //       // }

// //      // $jurnalKonsultasi = $data->jurnalKonsultasi->first();

// //      // $data->tanggal_konsultasi = Carbon::parse($jurnalKonsultasi['waktu'])->format('Y-m-d');
// //     //  $data->pukul_konsultasi   = Carbon::parse($jurnalKonsultasi['waktu'])->format('H:i');
    

// //       return view('view_karyawan_renstra.renstra_edit')->with('data', $data)
// //                                                        ->with('sasaran', $sasaran)
// //                                                        ->with('unsur', $unsur)
// //                                                        ->with('kegiatan', $kegiatan)
// //                                                        ->with('bagian', $bagian);
// //     }






// //     public function updateSubkegiatan(Request $req, $id, $gampong_id)
// //     {
  
// //         $req->validate(
// //                         [

// //                           'sasaran'             => 'required|integer',
// //                           'program'             => 'required|integer',

// //                           'indikator'           => 'required|string',
// //                           'satuan'              => 'required|string',
// //                           'nilaiawal'           => 'required|integer',
// //                           'unit'                => 'required|string',
                              

// //                           'targettahun.*'      => 'required|integer',
// //                           'targetfisik.*'      => 'required|integer',
// //                           'targetkeuangan.*'   => 'required|integer'
                     
// //                       ]
// //                     );



// //         // $hari_ini                = Carbon::now('Asia/Jakarta');
// //         // $jml_konsultasi_hari_ini = Konsultasi::whereDate('created_at', $hari_ini)
// //         //                                      ->orderBy('created_at', 'desc')
// //         //                                      ->orderBy('id', 'desc')
// //         //                                      ->first();

       



// //         //SIMPAN KE TABEL KONSULTASI DENGAN ID(PRIMARY KEY) NYA AUTO INCREMENT
// //       $data                            = Renssasarprogkeg::findOrFail($id);
// //       $data->renssasar_id              = $req->sasaran;
// //       $data->gampong_id                = $gampong_id;
// //       $data->renssasarprogkeg_indika   = $req->indikator;
// //       $data->renssasarprogkeg_satuan   = $req->satuan;
// //       $data->renssasarprogkeg_nilaiawal= $req->nilaiawal;
// //       $data->renssasarprogkeg_unit     = $req->unit;
// //       $data->save(); 

// //       $renssasarprogkeg_id=$data->id;

// //       $keg_target=$req->targettahun ? $req->targettahun :[];

// //       foreach($keg_target as $key => $value)
// //       {
// //       $data                                   = Renssasarprogkegtarget::findOrFail($id);
// //       $data->renssasarprogkeg_id              = $renssasarprogkeg_id;
// //       $data->renssasarprogkegtarget_tahun     = $req->targettahun[$key];
// //       $data->renssasarprogkegtarget_fisik     = $req->targetfisik[$key];
// //       $data->renssasarprogkegtarget_keuangan  = $req->targetkeuangan[$key];
// //       $data->save();
// //       }

// //         return redirect()->route('karyawan.renstra.kegiatan')
// //                          ->with('success', 'KEGIATAN berhasil diedit');
// //     }







// // public function deleteSubkegiatan(Request $req)
// //     {

// //       $req->validate(['check.*' => 'required|integer']);



// //        $check = $req->check ? $req->check : [];

// //        $data = Konsultasi::with([
// //                                 'jurnalKonsultasi',
// //                                 'jurnalKonsultasi.statusKonsultasi',
// //                                 'dokumen'
// //                               ])->whereIn('id', $check)
// //                                 ->where('umum_id', session('umum_atau_administrator_id'))
// //                                 ->first();


// //       //dd($id);

  
// //      if($data->jurnalKonsultasi->last()['status_konsultasi_id'] > 1)
// //      {
// //        return redirect()->route('karyawan_renstra.renstra')
// //                           ->with('warning', 'Rekam Medik ini tidak dapat dihapus karena sudah diverifikasi');

// //      }
// //      else
// //      {
    
// //       $konsultasi=$data->get();
     
// //       foreach ($konsultasi as $key => $value) 
// //       {
 
// //       foreach ($value->dokumen as $i => $dokumen) 
// //                {
// //                 try 
// //                   {
// //                    unlink(public_path('uploads/'.$dokumen->lokasi_file));
// //                   } 
// //                 catch(\Exception $e) 
// //                   {

// //                   }
// //                }
             
// //         }

// //       $data->delete();

// //       return redirect()->route('karyawan_renstra.renstra')
// //                         ->with('success', count($req->check).' data DPA berhasil dihapus');
// //      }
// //     }

   





  

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


