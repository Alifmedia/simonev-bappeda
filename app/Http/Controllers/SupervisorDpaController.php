<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Builder;


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

use App\Models\Indikatortujuan;
use App\Models\Indikatorrenssasar;
use App\Models\Indikatorrenssasarprog;
use App\Models\Indikatorrenssasarprogkeg;


use App\Models\KelompokBelanja;
use App\Models\JenisBelanja;
use App\Models\ObjekBelanja;
use App\Models\RinobBelanja;
use App\Models\SubrinobBelanja;

use App\Models\Renssasar;




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

class SupervisorDpaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('level:umum');
    }





public function renja(Request $req)
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


      return view('view_supervisor_dpa.dpa_renja')->with('filter', $filter)
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

                                   


      //  if ($req->gampong) 
      // {
      //   $data = $data->where('id',$req->gampong);
                                                

      // } 
      // elseif ($req->kemukiman) 
      // {
      //   $data = $data->whereHas('gampong', function(Builder $query)use($req)
      //                                           {
      //                                             $query->where('kemukiman_id', $req->kemukiman);
      //                                           }
      //                           );

      // } 
      // elseif ($req->kecamatan) 
      // {
      //   $data = $data->whereHas('gampong.kemukiman', function(Builder $query)use($req)
      //                                                     {
      //                                                      $query->where('kecamatan_id', $req->kecamatan);
      //                                                     }
      //                           );
      // } 
      // elseif ($req->kabupaten) 
      // {
      //   $data = $data->whereHas('gampong.kemukiman.kecamatan', function(Builder $query)
      //                                                               {
      //                                                                $query->where('kabupaten_id', $req->kabupaten);
      //                                                               }
      //                           );
      // }




      // if ($req->kabupaten) 
      // {
      //   $data = $data->where('gampong->kemukiman->kecamatan->kabupaten_id',$req->kabupaten);
                              
      // }
      //  elseif ($req->kecamatan) 
      //  {
      //   $data = $data->whereHas('gampong.kemukiman.kecamatan', function($query)use($req)
      //                                                     {
      //                                                      $query->where('kecamatan_id', $req->kecamatan);
      //                                                     }
      //                           )->get();
      // } 
      //  elseif ($req->kemukiman) 
      // {
      //   $data = $data->whereHas('gampong.kemukiman', function($query)use($req)
      //                                           {
      //                                             $query->where('kemukiman_id', $req->kemukiman);
      //                                           }
      //                           )->get();

      // } 
     
      // elseif  ($req->gampong) 
      // {
      //   $data = $data->whereHas('gampong', function($query)use($req)
      //                                           {
      //                                             $query->where('gampong_id', $req->gampong);
      //                                           }
      //                           )->get();
      // } 

     
     
 




      // if ($req->search) 
      // {
      //   $data = $data->where('no_registrasi', 'LIKE' ,'%'.$req->search.'%')
      //                ->orWhere('risalah', 'LIKE' ,'%'.$req->search.'%');
      // }


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


    //   return view('view_admin_dpa.dpa_pending')->with('filter', $filter)
    //                                            ->with('data', $data);
    // }








 public function rincian(Request $req)
    {


      //$filter['status']   = StatusKonsultasi::all();

      $filter['sektoral'] = Sektoral::all();
       $filter['periode']     = Periode::all();
      $filter['hal']      = Hal::all();
      $filter['unsur']    = Unsur::all();
      $filter['bagian']   = Bagian::all();
     

      
      

      



       // $data = Konsultasi::with(['dusun.renssasarprogkegsubkeg.renssasarprogkeg.renssasarprog.renssasar.renstra.sektoral'=> function($query)
       //                                       {
       //                                        $query->where('umum_id', session('umum_atau_administrator_id'));
       //                                       }
       //                           ]



       //                         )->get();


 $data = Konsultasi::whereHas('renssasarprogkegsubkeg.indikatorrenssasarprogkeg.renssasarprogkeg.indikatorrenssasarprog.renssasarprog.indikatorrenssasar.renssasar.indikatortujuan.tujuan.renstra.sektoral.umumsektoral',
                       function($query)
                         {   $query->where('umum_id',  session('umum_atau_administrator_id'));
                          
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


      return view('view_supervisor_dpa.dpa_rincian')->with('filter', $filter)
                                              // ->with('bagian', $bagian)
                                              // ->with('hal', $hal)
                                              // ->with('unsur', $unsur)
                                               ->with('data', $data);
    }





    public function setuju(Request $req)
    {


      //$filter['status']   = StatusKonsultasi::all();

      $filter['sektoral'] = Sektoral::all();
      $filter['periode']      = Periode::all();
      $filter['hal']      = Hal::all();
      $filter['unsur']    = Unsur::all();
      $filter['bagian']   = Bagian::all();
      //$filter['dusun']     = [];

      
      

      



       // $data = Konsultasi::with(['dusun.renssasarprogkegsubkeg.renssasarprogkeg.renssasarprog.renssasar.renstra.sektoral'=> function($query)
       //                                       {
       //                                        $query->where('umum_id', session('umum_atau_administrator_id'));
       //                                       }
       //                           ]



       //                         )->get();



        $data = Konsultasi::with(['renssasarprogkegsubkeg.indikatorrenssasarprogkeg.renssasarprogkeg.indikatorrenssasarprog.renssasarprog.indikatorrenssasar.renssasar.indikatortujuan.tujuan.renstra'=> function($query)
                                                                                                              {
                                                                                                                $query->where('sektoral_id', 18);
                                                                                                              }

                                 ]
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


      return view('view_supervisor_dpa.dpa_setuju')->with('filter', $filter)
                                              // ->with('bagian', $bagian)
                                              // ->with('hal', $hal)
                                              // ->with('unsur', $unsur)
                                               ->with('data', $data);
    }



     public function rekapitulasi(Request $req)
    {


      //$filter['status']   = StatusKonsultasi::all();

      $filter['sektoral'] = Sektoral::all();
      $filter['periode']      = Periode::all();
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


      return view('view_supervisor_dpa.dpa_rekapitulasi')->with('filter', $filter)
                                              // ->with('bagian', $bagian)
                                              // ->with('hal', $hal)
                                              // ->with('unsur', $unsur)
                                               ->with('data', $data);
    }









     public function createDPA(Request $req, $id, $dusun_kode, $nama)
    {
      $bagian        = Bagian::all(); 
      $unsur         = Unsur::all();
      $hal           = Hal::all();
      $sektoral      = Sektoral::all();
      $subrinob      = SubrinobBelanja::all();



      //$req = Request();


      // $filter['kelompok'] = KelompokBelanja::all();
      // $filter['jenis']    = [];
      // $filter['objek']    = [];
      // $filter['rinob']    = [];
     // $filter['subrinob'] = SubrinobBelanja::all();


     
      //  if ($req->kelompok) 
      // {
      //    $filter['jenis'] = JenisBelanja::where('kelompok_id', $req->kelompok)->get();
      // }
      // if ($req->jenis) 
      // {
      //    $filter['objek'] = ObjekBelanja::where('jenis_id', $req->jenis)->get();
      //  }
      //  if ($req->objek) 
      // {
      //    $filter['rinob'] = RinobBelanja::where('objek_id', $req->objek)->get();
      //  }
      //    if ($req->rinob) 
      // {
      //    $filter['subrinob'] = SubrinobBelanja::where('rinob_id', $req->rinob)->get();
      //  }



     


     return view('view_supervisor_dpa.dpa_add')->with('id', $id)
                                             ->with('dusun_kode', $dusun_kode)
                                             ->with('nama', $nama)
                                             ->with('bagian', $bagian)
                                             ->with('unsur', $unsur)
                                             ->with('hal', $hal)
                                             //->with('filter', $filter)
                                            ->with('subrinob', $subrinob)
                                             ->with('sektoral', $sektoral);
                                         
    }


    //  <div class="filter" >

    //     <div class="filter__input__sub">
        
    //         <div class="form-group" >
    //         <label for="filter1" ><font size="2">  KELOMPOK</font></label>
    //         <select class="form-control"  id="filter1" name="kelompok">
    //           <option value="0" >Semua</option>
    //           @foreach ($filter['kelompok'] as $key => $value)
    //             <option value="{{ $value->id }}" 
    //                            {{ app('request')->input('kelompok') == $value->id?'selected':''}}>{{ $value->kelompok_nama }}
    //             </option>
    //           @endforeach
    //         </select>
    //       </div>



    //       <div class="form-group">
    //         <label for="filter2" class="col-sm-3.5"><font size="2">JENIS</font></label>
    //         <select class="form-control" id="filter2" name="jenis" {{ count($filter['jenis']) > 0 ? '' : 'disabled' }}>
    //           <option value="0">Semua</option>
    //           @foreach ($filter['jenis'] as $key => $value)
    //             <option value="{{ $value->id }}" 
    //                            {{ app('request')->input('jenis') == $value->id ? 'selected' : '' }}>{{ $value->jenis_nama }}</option>
    //           @endforeach
    //         </select>
    //       </div>

    //        <div class="form-group">
    //         <label for="filter3" class="col-sm-3.5"><font size="2">OBJEK</font></label>
    //         <select class="form-control" id="filter3" name="objek" {{ count($filter['objek']) > 0 ? '' : 'disabled' }}>
    //           <option value="0">Semua</option>
    //           @foreach ($filter['objek'] as $key => $value)
    //             <option value="{{ $value->id }}" {{ app('request')->input('objek') == $value->id ? 'selected' : '' }}>{{ $value->objek_nama }}</option>
    //           @endforeach
    //         </select>
    //       </div>
         
    // </div>


    // <div class="filter__input__sub">
    //    <div class="form-group">
    //         <label for="filter4" class="col-sm-3.5"><font size="2">RINOB</font></label>
    //         <select class="form-control" id="filter4" name="rinob" {{ count($filter['rinob']) > 0 ? '' : 'disabled' }}>
    //           <option value="0">Semua</option>
    //           @foreach ($filter['rinob'] as $key => $value)
    //             <option value="{{ $value->id }}" 
    //                            {{ app('request')->input('rinob') == $value->id ? 'selected' : '' }}
    //             >
    //                            {{ $value->rinob_nama }}
    //             </option>
    //           @endforeach
    //         </select>
    //       </div>


    //         <div class="form-group">
    //         <label for="filter5" class="col-sm-3.5"><font size="2">SUBRINOB</font></label>
    //         <select class="form-control" id="filter5" name="subrinob" {{ count($filter['subrinob']) > 0 ? '' : 'disabled' }}>
    //           <option value="0">Semua</option>
    //           @foreach ($filter['subrinob'] as $key => $value)
    //             <option value="{{ $value->id }}" {{ app('request')->input('subrinob') == $value->id ? 'selected' : '' }}>{{ $value->subrinob_nama }}</option>
    //           @endforeach
    //         </select>
    //       </div>
    //      </div> 
    //   </div> -->






     //SETELAH KLIK MENU SIMPAN, PASSING PARAMETER2 TAMBAH DAN DIVALIDASI SERTA DISIMPAN
    public function saveDPA(Request $req, $id)
    {
      $req->validate([
           
   
        
        
        'unsur'                 => 'required|integer',
        'bagian'                => 'required|integer',
        'lokasi'                => 'required|string',
        'waktu'                 => 'required|string',
        'subrinob'              => 'required|integer',

        // 'bel_operasi'           => 'required|integer',
        // 'bel_modal'             => 'required|integer',
        // 'bel_takterduga'        => 'required|integer',
        // 'bel_transfer'          => 'required|integer',

    
        'item_nama.*'             => 'required|string',
        'item_lingkup.*'          => 'required|string',
        'item_koefisien.*'        => 'required|integer',
        'item_satuan.*'           => 'required|string',
        'item_harga.*'            => 'required|integer',
        'item_ppn.*'              => 'required|integer',
        'item_targetfisik.*'      => 'required|integer',
        'item_sumberdana.*'       => 'required|integer'
        
       
       
      ]);


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
      $data                              = new Konsultasi;
      $data->renssasarprogkegsubkeg_id   = $id;
      $data->subrinob_id                 = $req->subrinob;
      $data->unsur_id                    = $req->unsur;
      $data->bagian_id                   = $req->bagian;
      $data->lokasi                      = $req->lokasi;
      $data->waktu                       = $req->waktu;

      $data->save(); 

      $konsultasi_id=$data->id;

      $data_dpa=$req->item_nama ? $req->item_nama :[];

      foreach($data_dpa as $key => $value)
      {
      $data                       = new Item;
      $data->konsultasi_id        = $konsultasi_id;
      $data->item_nama            = $req->item_nama[$key];
      $data->item_lingkup         = $req->item_lingkup[$key];
      $data->item_koefisien       = $req->item_koefisien[$key];
      $data->item_satuan          = $req->item_satuan[$key];
      $data->item_harga           = $req->item_harga[$key];
      $data->item_ppn             = $req->item_ppn[$key];
      $data->item_targetfisik     = $req->item_targetfisik[$key];
      $data->bagian_id            = $req->item_sumberdana[$key];
      $data->save();
      }


    //KETIKA DATA KONSULTASI SUDAH DISIMPAN KE TABEL, MAKA DIDAPATILAH ID KONSULTASI 
     // $konsultasi_id              = $data->id;

    //SIMPAN KE TABEL JURNALKONSULTASI
    //  $data                       = new JurnalKonsultasi;
    //$data->id                   = AI(BELUM DIKETAHUI SEBELUM DIINPUTKAN KE TABEL)
    //  $data->konsultasi_id        = $konsultasi_id;
    //  $data->status_konsultasi_id = 1;
      
   //   $data->save();


      // //SIMPAN KE TABEL DOKUMEN
      // if($req->hasfile('dokumen'))
      // {
      //     foreach($req->file('dokumen') as $file)
      //     {
      //       $name = time().uniqid().'.'.$file->getClientOriginalExtension();

      //       $file->move(public_path()."/uploads/", $name);

      //       $data                = new Dokumen;
      //       $data->konsultasi_id = $konsultasi_id;
      //       $data->nama          = $file->getClientOriginalName();
      //       $data->lokasi_file   = $name;
      //       $data->save();
      //     }
      // }

      return redirect()->route('supervisor.dpa.setuju')
                       ->with('success', 'PENAMBAHAN DPA berhasil');
    }



    public function prosesDetail(Request $req, $konsultasi_id)
    {
     $req->validate([
                       'tahapan.*' => 'nullable|integer',
                     ]);


     $tahapan = $req->tahapan ? $req->tahapan : [];

     Tahapan::where('konsultasi_id', $konsultasi_id)
            ->whereIn('no', $tahapan)
            ->update(['selesai' => 1,]);


     Tahapan::where('konsultasi_id', $konsultasi_id)
            ->whereNotIn('no', $tahapan)
            ->update(['selesai' => 0,]);



     // $no_registrasi = Konsultasi::select(['id', 'no_registrasi'])
     //                           ->where('id', $konsultasi_id)
     //                           ->firstOrFail()->no_registrasi;




     return redirect()->route('supervisor.rekammedik.terekap')
                      ->with('success', count($tahapan).' Tahapan di konsultasi dengan no registrasi '.$no_registrasi.' berhasil diselesaikan');
   }

   





  //PENGEDITAN REKAM MEDIK
    public function editDPA($id)
    {
    
      //$data = JurnalKonsultasi::where('jurkon_id', $id)->first();
      $bagian        = Bagian::all(); 
      $unsur         = Unsur::all();
      $hal           = Hal::all();
      $sektoral      = Sektoral::all();


      $data = Konsultasi::with(
        [
                                 'jurnalKonsultasi' => function($q)
                                                       {
                                                        $q->orderBy('status_konsultasi_id', 'asc')->get();
                                                       },
                                 ],
                                  'jurnalKonsultasi.statusKonsultasi',
                                 'dokumen',
                                'sektoral'
                              )
                       // ->where('umum_id', session('umum_atau_administrator_id'))
                        ->where('id', $id)
                        ->first();


      // if ($data->jurnalKonsultasi->last()['status_konsultasi_id'] > 1) 
      // {
      //   return redirect()->route('karyawan_rekammedik.karyawan_rm')
      //                    ->with('warning', 'Rekam Medik ini tidak dapat diedit karena sudah diverifikasi');
      // }

     // $jurnalKonsultasi = $data->jurnalKonsultasi->first();

     // $data->tanggal_konsultasi = Carbon::parse($jurnalKonsultasi['waktu'])->format('Y-m-d');
    //  $data->pukul_konsultasi   = Carbon::parse($jurnalKonsultasi['waktu'])->format('H:i');
    

      return view('view_supervisor_dpa.dpa_edit')->with('data', $data)
                                            ->with('hal', $hal)
                                            ->with('unsur', $unsur)
                                            ->with('sektoral', $sektoral)
                                            ->with('bagian', $bagian);
    }






    public function updateDPA(Request $req, $id, $dusun_id)
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
                        'lokasi'                => 'required|string'
                     
                     
                      ]
                    );

        $hari_ini                = Carbon::now('Asia/Jakarta');
        $jml_konsultasi_hari_ini = Konsultasi::whereDate('created_at', $hari_ini)
                                             ->orderBy('created_at', 'desc')
                                             ->orderBy('id', 'desc')
                                             ->first();

        
        $data = Konsultasi::findOrFail($id);
       
        $data->sektoral_id          = $req->sektoral;
        $data->unsur_id             = $req->unsur;
        $data->hal_id               = $req->hal;
        $data->bagian_id            = $req->bagian; 
        $data->bel_operasi          = $req->bel_operasi;
        $data->bel_modal            = $req->bel_modal;
        $data->bel_takterduga       = $req->bel_takterduga;
        $data->bel_transfer         = $req->bel_transfer;
        $data->no_registrasi        = $req->lokasi;
      
        $data->save();

        return redirect()->route('admin.dpa.setuju')
                         ->with('success', 'DPA berhasil diedit');
    }


    
    
    public function deleteFileDPA(Request $req)
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

      return redirect()->route('supervisor_rekammedik.supervisor_rm_edit.edit', $konsultasi_id)
                       ->with('success', 'Dokumen '.$nama.' berhasil dihapus');
    }




    public function deleteDPA(Request $req)
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
       return redirect()->route('supervisor_dpa.dpa')
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

      return redirect()->route('supervisor_dpa.dpa')
                        ->with('success', count($req->check).' data DPA berhasil dihapus');
     }
    }




}


