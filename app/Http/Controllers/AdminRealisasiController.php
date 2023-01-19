<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hal;
use App\Models\Bagian;
use App\Models\Sektoral;
use App\Models\Unsur;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kemukiman;
use App\Models\Gampong;
use App\Models\Konsultasi;
use App\Models\JurnalKonsultasi;
use App\Models\Administrator;


use App\Models\Tujuan;
use App\Models\Renssasar;
use App\Models\Renssasarprog;
use App\Models\Renssasarprogkeg;
use App\Models\Renssasarprogkegsubkeg;

use App\Models\Terverivikasi;
use App\Models\Terjadwal;
use App\Models\Terekap;

use App\Models\Tahapan;
use App\Models\Ruang;
use App\Models\Pemangku;

use Carbon\Carbon;
use PDF;

class AdminRealisasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('level:administrator');
    }


    //REKAM MEDIK

    public function pending(Request $req)
    {
      $filter['hal']          = Hal::all();//TIPE KERJA
      $filter['unsur']        = Unsur::all();//KELAMIN
      $filter['sektoral']     = Sektoral::all();//DIVISI
      $filter['bagian']       = Bagian::all();//DIVISI
      //$filter['sektoral']     = Sektoral::all();//DIVISI

     
      //$filter['kabupaten'] = Kabupaten::all();
      //$filter['kecamatan'] = [];
      //$filter['kemukiman'] = [];
      //$filter['gampong']   = [];
     

      // if ($req->kabupaten) 
      // {
      //   $filter['kecamatan'] = Kecamatan::where('kabupaten_id', $req->kabupaten)->get();
      // }
      // if ($req->kecamatan) 
      // {
      //   $filter['kemukiman'] = Kemukiman::where('kecamatan_id', $req->kecamatan)->get();
      // }
      // if ($req->kemukiman) 
      // {
      //   $filter['gampong'] = Gampong::where('kemukiman_id', $req->kemukiman)->get();
      // }

      $data = JurnalKonsultasi::with([
                                
                                      'item.konsultasi'
                                     // 'konsultasi.dokumen'

                                     ])->where('status_konsultasi_id',1)       
                                       ->orderBy('created_at', 'asc')
                                       ->get();


      if ($req->search) 
      {
        $data = $data->where('no_registrasi', 'LIKE' ,'%'.$req->search.'%')
                     ->orWhere('risalah', 'LIKE' ,'%'.$req->search.'%');
      }



      //  if ($req->sektoral) 
      // {
      //   $data = $data->where('sektoral_id', $req->sektoral);
                               
      // }



      if ($req->hal) 
      {
        $data = $data->where('item.konsultasi.hal',  
                                 function($q)use($req)
                                {
                                  $q->where('id', $req->hal)->get();
                                }
                               );
      }

      if ($req->unsur) 
      {
        $data = $data->where('item.konsultasi.unsur', 
                              function($q)use($req)
                              {
                                $q->where('id', $req->unsur);
                              }
                            );
      }


      if ($req->bagian) 
      {
        $data = $data->where('item.konsultasi.bagian', 
                              function($q)use($req)
                              {
                               $q->where('id', $req->bagian)->get();
                              }
                             );
      }

      // if ($req->mulai) 
      // {
      //   $data = $data->whereDate('created_at', '>=' , $req->mulai);
      // }

      // if ($req->akhir) 
      // {
      //   $data = $data->whereDate('created_at', '<=' , $req->akhir);
      // }
      // if ($req->gampong) 
      // {
      //   $data = $data->whereHas('umum.gampong', function($q)use($req)
      //                                           {
      //                                             $q->where('id',$req->gampong);
      //                                           }
      //                          );

      // } 
      // elseif ($req->kemukiman) 
      // {
      //   $data = $data->whereHas('umum.gampong', function($q)use($req)
      //                                           {
      //                                             $q->where('kemukiman_id', $req->kemukiman);
      //                                           }
      //                           );

      // } 

      // else
      // if ($req->kecamatan) 
      // {
      //   $data = $data->whereHas('umum', function($q)use($req)
      //                                                     {
      //                                                      $q->where('kecamatan_id', $req->kecamatan);
      //                                                     }
      //                           );
      // } 
      // elseif ($req->kabupaten) 
      // {
      //   $data = $data->whereHas('umum.kecamatan', function($q)use($req)
      //                                                               {
      //                                                                $q->where('kabupaten_id', 
      //                                                                $req->kabupaten);
      //                                                               }
      //                           );
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


      return view('view_admin_realisasi.realisasi_pending')->with('filter', $filter)
                                                             ->with('data', $data);
    }




     public function rekapitulasi(Request $req)
    {
      $filter['hal']          = Hal::all();//TIPE KERJA
      $filter['unsur']        = Unsur::all();//KELAMIN
      $filter['sektoral']     = Sektoral::all();//DIVISI
      $filter['bagian']       = Bagian::all();//DIVISI
      //$filter['sektoral']     = Sektoral::all();//DIVISI

     
      //$filter['kabupaten'] = Kabupaten::all();
      //$filter['kecamatan'] = [];
      //$filter['kemukiman'] = [];
      //$filter['gampong']   = [];
     

      // if ($req->kabupaten) 
      // {
      //   $filter['kecamatan'] = Kecamatan::where('kabupaten_id', $req->kabupaten)->get();
      // }
      // if ($req->kecamatan) 
      // {
      //   $filter['kemukiman'] = Kemukiman::where('kecamatan_id', $req->kecamatan)->get();
      // }
      // if ($req->kemukiman) 
      // {
      //   $filter['gampong'] = Gampong::where('kemukiman_id', $req->kemukiman)->get();
      // }

      $data = JurnalKonsultasi::with([
                                
                                      'item.konsultasi'
                                     // 'konsultasi.dokumen'

                                     ])->where('status_konsultasi_id',1)       
                                       ->orderBy('created_at', 'asc')
                                       ->get();


      if ($req->search) 
      {
        $data = $data->where('no_registrasi', 'LIKE' ,'%'.$req->search.'%')
                     ->orWhere('risalah', 'LIKE' ,'%'.$req->search.'%');
      }



       if ($req->sektoral) 
      {
        $data = $data->where('sektoral_id', $req->sektoral);
                               
      }



      if ($req->hal) 
      {
        $data = $data->where('item.konsultasi.hal',  
                                 function($q)use($req)
                                {
                                  $q->where('id', $req->hal)->get();
                                }
                               );
      }

      if ($req->unsur) 
      {
        $data = $data->where('item.konsultasi.unsur', 
                              function($q)use($req)
                              {
                                $q->where('id', $req->unsur);
                              }
                            );
      }


      if ($req->bagian) 
      {
        $data = $data->where('item.konsultasi.bagian', 
                              function($q)use($req)
                              {
                               $q->where('id', $req->bagian)->get();
                              }
                             );
      }

      // if ($req->mulai) 
      // {
      //   $data = $data->whereDate('created_at', '>=' , $req->mulai);
      // }

      // if ($req->akhir) 
      // {
      //   $data = $data->whereDate('created_at', '<=' , $req->akhir);
      // }
      // if ($req->gampong) 
      // {
      //   $data = $data->whereHas('umum.gampong', function($q)use($req)
      //                                           {
      //                                             $q->where('id',$req->gampong);
      //                                           }
      //                          );

      // } 
      // elseif ($req->kemukiman) 
      // {
      //   $data = $data->whereHas('umum.gampong', function($q)use($req)
      //                                           {
      //                                             $q->where('kemukiman_id', $req->kemukiman);
      //                                           }
      //                           );

      // } 

      // else
      // if ($req->kecamatan) 
      // {
      //   $data = $data->whereHas('umum', function($q)use($req)
      //                                                     {
      //                                                      $q->where('kecamatan_id', $req->kecamatan);
      //                                                     }
      //                           );
      // } 
      // elseif ($req->kabupaten) 
      // {
      //   $data = $data->whereHas('umum.kecamatan', function($q)use($req)
      //                                                               {
      //                                                                $q->where('kabupaten_id', 
      //                                                                $req->kabupaten);
      //                                                               }
      //                           );
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


      return view('view_admin_realisasi.realisasi_rekapitulasi')->with('filter', $filter)
                                                             ->with('data', $data);
    }


    
//BEGITU IKON DITEKAN KE NORMAL, MAKA DIARAHKAN RM TERSEBUT KE TAB NORMAL DAN RM HILANG,TAMPAK TAB PENDING
    public function penormalan($id) 


    { 

      $data=JurnalKonsultasi::find($id);
    
      $data->status_konsultasi_id = 2; 
                                      
      $data->administrator_id     = session('umum_atau_administrator_id');

      $data->save();

      // $no_registrasi = Konsultasi::select(['id', 'no_registrasi'])
      //                              ->where('id', $id)
      //                              ->firstOrFail()->no_registrasi;

      return redirect()->route('admin.realisasi.pending')
                       ->with('success', 'Realisasi Kegiatan Disetujui');
    }




    //TAMPAK TAB NORMAL
    public function normal(Request $req)
    {
      $filter['hal']          = Hal::all();//TIPE KERJA
      $filter['unsur']        = Unsur::all();//KELAMIN
      $filter['sektoral']     = Sektoral::all();//DIVISI
      $filter['bagian']       = Bagian::all();//DIVISI


      // if ($req->kabupaten) {
      //   $filter['kecamatan'] = Kecamatan::where('kabupaten_id', $req->kabupaten)->get();
      // }
      // if ($req->kecamatan) {
      //   $filter['kemukiman'] = Kemukiman::where('kecamatan_id', $req->kecamatan)->get();
      // }
      // if ($req->kemukiman) {
      //   $filter['gampong'] = Gampong::where('kemukiman_id', $req->kemukiman)->get();
      // }

      // $data = Konsultasi::with
      //                        ([
      //                       'bagian',
      //                       'unsur',
      //                       'dusun',
      //                       'hal',
      //                       'sektoral',
      //                       'dokumen',
      //                       'jurnalKonsultasi'=>function($q)
      //                                           {
      //                                            $q->orderBy('created_at', 'asc')
      //                                                ->where('status_konsultasi_id',3);
                                                       
      //                                           },
      //                        'jurnalKonsultasi.administrator'

      //                         ])->get();


     $data = JurnalKonsultasi::with([
                                         'item',
                                         'item.konsultasi'
                                    

                                     ])->where('status_konsultasi_id',2)->orderBy('created_at', 'asc')
                                       ->get();



                                         
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

      // $pagination = $req->pagination ? (int)$req->pagination : 15;

      // if ($pagination) {
      //   $data = $data->orderBy('created_at', 'desc')->paginate($pagination);
      // } else {
      //   $data = $data->orderBy('created_at', 'desc')->get();
      // }

      // if ($req->export) {
      //   set_time_limit(6000);
      //   $pdf = PDF::loadView('view_pdf.konsultasi_tertolak', $data);

      //   return $pdf->download('konsultasi_tertolak.pdf');
      // }


      return view('view_admin_realisasi.realisasi_normal')->with('filter', $filter)
                                                            ->with('data', $data);
    }

      

 












   


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

      return redirect()->route('admin.realisasi.pending')
                       ->with('success', count($req->check).' Rekam Medik berhasil dihapus');
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


    //  public function peprekomorbidan($id)
    // {
     

    //   // $filter['hal']       = Hal::all();
    //   // $filter['unsur']     = Unsur::all();
    //   // $filter['sektoral']  = Sektoral::all();


    //   $data     = JurnalKonsultasi::with([
    //                                        'sektoral.umum',

    //                                       ])->where('id', $id)->get();

    //   // $jurnalKonsultasi         = $data->jurnalKonsultasi->first();
    //   // $data->tanggal_konsultasi = Carbon::parse($jurnalKonsultasi['waktu'])->format('Y-m-d');
    //   // $data->pukul_konsultasi   = Carbon::parse($jurnalKonsultasi['waktu'])->format('H:i');
    //   //$data->jumlah_delegasi    = $jurnalKonsultasi['jumlah_delegasi'];

    //   return view('view_admin_rekammedik.rekammedik_peprekomorbid')->with('data', $data);

    // }
                                                               


 // public function prosesPeprekomorbidan(Request $req, $id)
 //    {
 //        $req->validate([
 //                        // 'administrator'      => 'required|integer',
 //                       //'ruangan'            => 'required|string',
 //                         'tanggal_konsultasi' => 'required|date',
 //                         'pukul_konsultasi'   => 'required',
 //                         'instruksiprekom'    => 'required|string',
 //                         'pemangku.*'         => 'nullable|integer'
 //                       ]);

 //       $konsultasi = Konsultasi::select(['id', 'no_registrasi'])
 //                                 ->where('id', $id)
 //                                 ->firstOrFail();

 //       JurnalKonsultasi::updateOrCreate(
 //                                         ['konsultasi_id'        => $id, 
 //                                          'status_konsultasi_id' => 2],
 //                                         [
                                          
 //                                         ]
 //                                      );

 //       Terverivikasi::updateOrCreate(
 //                                     ['konsultasi_id' => $id],
 //                                     ['dokter_id'     => session('umum_atau_administrator_id'),
 //                                      'instruksi_prekomorbid'   => $req->instruksiprekom
 //                                     ]
 //                                 );


 //       $pemangku = $req->pemangku ? $req->pemangku : [];
       
 //       $konsultasi->pemangku()->sync($pemangku);

 //       $no_registrasi = $konsultasi->no_registrasi;
 //       return redirect()->route('admin.rekammedik.pending')
 //                        ->with('success', 'Realisasi DITOLAK');
 //    }

    //TAMPILAN PREKOMORBID
    // public function prekomorbid(Request $req)
    // {

    //    $filter['hal']          = Hal::all();//TIPE KERJA
    //   $filter['unsur']        = Unsur::all();//KELAMIN
    //   $filter['sektoral']     = Sektoral::all();//DIVISI
    //   $filter['bagian']       = Bagian::all();//DIVISI


     

    //  $data = JurnalKonsultasi::with([
                                
    //                                   'konsultasi',
    //                                   'konsultasi.dokumen',
    //                                   'konsultasi.Terverivikasi'

    //                                  ])->where('status_konsultasi_id',3)                                 
    //                                    ->orderBy('created_at', 'asc')
    //                                    ->get();

                                                                               
    //  if ($req->search) 
    //   {
    //     $data = $data->where('no_registrasi', 'LIKE' ,'%'.$req->search.'%')->orWhere('risalah', 'LIKE' ,'%'.$req->search.'%');
    //   }

    //   if ($req->mulai) 
    //   {
    //     $data = $data->whereDate('created_at', '>=' , $req->mulai);
    //   }

    //   if ($req->akhir) 
    //   {
    //     $data = $data->whereDate('created_at', '<=' , $req->akhir);
    //   }

    //   //--------------------------------------------------------------------

    //   if ($req->hal) 
    //   {
    //        $data = $data->where('hal',  function($q)use($req)
    //                                     {
    //                                      $q->where('hal_id', $req->hal);
    //                                      }
    //                             );
    //   }

    //    if ($req->sektoral) {
    //     $data = $data->where('sektoral', function($q)use($req)
    //                                  {
    //                                  $q->where('sektoral_id', $req->sektoral);
    //                                  }
    //                         );
    //   }

    //   if ($req->unsur) {
    //     $data = $data->whereHas('unsur', function($q)use($req){
    //                                     $q->where('unsur_id', $req->unsur);
    //                                     }
    //                             );
    //   }


    //   //  $pagination = $req->pagination ? (int)$req->pagination : 15;

    //   // if ($pagination) 
    //   // {
    //   //                  $data = $data->orderBy('created_at', 'desc')->paginate($pagination);
    //   // } 
    //   // else 
    //   // {
    //   //   $data = $data->orderBy('created_at', 'desc')->get();
    //   // }

    //   // if ($req->export) 
    //   // {
    //   //   set_time_limit(6000);
    //   //   $pdf = PDF::loadView('view_pdf.konsultasi_terverifikasi', $data);

    //   //   return $pdf->download('konsultasi_terverifikasi.pdf');
    //   // }
    //   return view('view_admin_rekammedik.rekammedik_prekomorbid')->with('filter', $filter)
    //                                                              ->with('data', $data);

    // }



    

}
