<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//MODEL-MODEL YANG DILIBATKAN
use App\Models\Umum;
use App\Models\Hal;
use App\Models\Unsur;
use App\Models\Sektoral;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kemukiman;
use App\Models\Gampong;

use App\Models\Konsultasi;
use App\Models\JurnalKonsultasi;
use App\Models\StatusKonsultasi;
use App\Models\Administrator;
use App\Models\Terjadwal;
use App\Models\Terekap;
use App\Models\Tahapan;
use App\Models\Ruang;
use App\Models\Jawaban;
use App\Models\Pemangku;

use Carbon\Carbon;
use PDF;

class AdminKaryawanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('level:administrator');
    }



    public function pending(Request $req)
    {

      //PENGAMBILAN DATA UNTUK FILTER
      $filter['hal']       = Hal::all();//Tipe Kerja
      $filter['unsur']     = Unsur::all();//Kelamin
      $filter['sektoral']  = Sektoral::all();//Departemen
      
      $filter['kabupaten'] = Kabupaten::all();
      $filter['kecamatan'] = [];
      //$filter['kemukiman'] = [];
     // $filter['gampong']   = [];
     

      if ($req->kabupaten) 
      {
        $filter['kecamatan'] = Kecamatan::where('kabupaten_id', $req->kabupaten)->get();
      }
      // if ($req->kecamatan) 
      // {
      //   $filter['kemukiman'] = Kemukiman::where('kecamatan_id', $req->kecamatan)->get();
      // }
      // if ($req->kemukiman) 
      // {
      //   $filter['gampong']   = Gampong::where('kemukiman_id', $req->kemukiman)->get();
      // }

      //Ambil data semua kolom dari tabel Konsultasi,User,Unsur,Kabupaten,Hal,Sektoral,Dokumen,JurnalKonsultasi(dengan setup desc)
      $data = Umum::with([
                                'user',
                                'konsultasi',
                                'hal',
                                'sektoral',
                                'unsur',
                                'kecamatan',
                                'kecamatan.kabupaten',
                                'dokumen',
                               

                               ]);

      if ($req->search) 
      {
        $data = $data->where('no_registrasi', 'LIKE' ,'%'.$req->search.'%')
                     ->orWhere('RM_risalah', 'LIKE' ,'%'.$req->search.'%');
      }




      if ($req->hal) 
      {
        $data = $data->where('hal_id', $req->hal);
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
     if ($req->kecamatan) 
      {
        $data = $data->whereHas('umum', function($q)use($req)
                                                          {
                                                           $q->where('kecamatan_id', $req->kecamatan);
                                                          }
                                );
      } 
      elseif ($req->kabupaten) 
      {
        $data = $data->whereHas('umum.kecamatan', function($q)use($req)
                                                                    {
                                                                     $q->where('kabupaten_id', 
                                                                     $req->kabupaten);
                                                                    }
                                );
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


      if ($req->export) 
      {
        set_time_limit(6000);
        $pdf = PDF::loadView('view_pdf.konsultasi_permohonan', $data);

        return $pdf->download('konsultasi_permohonan.pdf');
      }


      return view('view_admin_karyawan.karyawan_pending')->with('filter', $filter)
                                                         ->with('data', $data);
    }



    // public function undo($id, $status)
    // {
    //   JurnalKonsultasi::where('konsultasi_id', $id)
    //                   ->where('status_konsultasi_id', $status)->delete();

    //   if ($status == 2) 
    //   {
    //     $redirect = 'admin.karyawan.tertolak';
    //   } 
    //   elseif ($status == 3) 
    //   {
    //     $redirect = 'admin.karyawan.terverifikasi';
    //   } 
    //   elseif ($status == 4) 
    //   {
    //     $redirect = 'admin.karyawan.terjadwal';
    //     Terjadwal::where('konsultasi_id', $id)->delete();
    //   } 
    //   elseif ($status == 5) 
    //   {
    //     $redirect = 'admin.karyawan.terekap';
    //     Terekap::where('konsultasi_id', $id)->delete();
    //     Tahapan::where('konsultasi_id', $id)->delete();
    //   }

    //   $no_registrasi = Konsultasi::select(['id', 'no_registrasi'])
    //                              ->where('id', $id)
    //                              ->firstOrFail()->no_registrasi;

    //   return redirect()->route($redirect)
    //                   ->with('success', 'Konsultasi dengan no registrasi '.$no_registrasi.' berhasil dibatalkan');

    // }







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

      return redirect()->route('admin.karyawan.pending')
                       ->with('success', count($req->check).' konsultasi berhasil dihapus');
    }





    public function verifikasi($id)
    {
      $no_registrasi = Konsultasi::select(['id', 'no_registrasi'])
                                 ->where('id', $id)
                                 ->firstOrFail()->no_registrasi;

      JurnalKonsultasi::updateOrCreate(
          ['konsultasi_id' => $id, 'status_konsultasi_id' => 3],
          ['administrator_id' => session('umum_atau_administrator_id')]
      );

      return redirect()->route('admin.karyawan.pending')
                       ->with('success', 'Konsultasi dengan no registrasi '.$no_registrasi.' berhasil diverifikasi');
    }





    public function decline($id)
    {
      JurnalKonsultasi::updateOrCreate(
          ['konsultasi_id' => $id, 'status_konsultasi_id' => 2],
          ['administrator_id' => session('umum_atau_administrator_id')]
      );

      $no_registrasi = Konsultasi::select(['id', 'no_registrasi'])
                                 ->where('id', $id)
                                 ->firstOrFail()->no_registrasi;

      return redirect()->route('admin.karyawan.pending')
                       ->with('success', 'Konsultasi dengan no registrasi '.$no_registrasi.' berhasil ditolak');
    }




    // DATA SEMUA KARYAWAN DI ZONA NORMAL
    public function normal(Request $req)
    {
      $filter['hal']       = Hal::all();
      $filter['unsur']     = Unsur::all();
      $filter['sektoral']  = Sektoral::all();
      $filter['kabupaten'] = Kabupaten::all();
      $filter['kecamatan'] = [];
      // $filter['kemukiman'] = [];
      // $filter['gampong']   = [];

      if ($req->kabupaten)
       {
        $filter['kecamatan'] = Kecamatan::where('kabupaten_id', $req->kabupaten)->get();
      }
      // if ($req->kecamatan) {
      //   $filter['kemukiman'] = Kemukiman::where('kecamatan_id', $req->kecamatan)->get();
      // }
      // if ($req->kemukiman) {
      //   $filter['gampong'] = Gampong::where('kemukiman_id', $req->kemukiman)->get();
      // }

      //  $data = Umum::with(['konsultasi'])->get();
                                                              
      // dd($data);

      $data = Umum::has('latestRM.jurnalKonsultasiLatest')->get();

      //dd($data);
     

      // $data = Umum::with([  'user',
      //                       'konsultasi',
      //                       'unsur',
      //                       'hal',
      //                       'sektoral',
      //                       'kecamatan',
      //                       'kecamatan.kabupaten',
      //                      // 'dokumen',
      //                      // 'konsultasi'=> function($q)
      //                      //                {
      //                       //                $q->orderBy('id',  'desc');
      //                        //               },
      //                       'konsultasi.jurnalKonsultasi'=> function($q)
      //                                       {
      //                                        $q->orderBy('created_at',  'desc');
      //                                      }

      //                      //'konsultasi.jurnalKonsultasi.administrator'
                         

      //                         ])->whereHas('konsultasi.jurnalKonsultasi', 
      //                                       function($q)
      //                                       {
      //                                         $q->where('status_konsultasi_id', 2);
      //                                       }
      //                                     );
                                           // ->whereDoesntHave('statusKonsultasi', 
                                           //         function($q)
                                           //         {
                                           //          $q->whereIn('id', [3,4,5]);
                                           //        }
                                           //      );

      if ($req->search) 
      {
        $data = $data->Where('NIK', $req->search);
      }

      // if ($req->mulai) {
      //   $data = $data->whereDate('created_at', '>=' , $req->mulai);
      // }

      // if ($req->akhir) {
      //   $data = $data->whereDate('created_at', '<=' , $req->akhir);
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

      // if ($req->gampong) {
      //   $data = $data->whereHas('umum.gampong', function($q)use($req){
      //     $q->where('id',$req->gampong);
      //   });
      // } elseif ($req->kemukiman) {
      //   $data = $data->whereHas('umum.gampong', function($q)use($req){
      //     $q->where('kemukiman_id', $req->kemukiman);
      //   });
      // } else

      if ($req->kecamatan) 
      {
        $data = $data->whereHas('umum', function($q)use($req){
          $q->where('kecamatan_id', $req->kecamatan);
        });
      } 
      elseif ($req->kabupaten) 
      {
        $data = $data->whereHas('umum.kecamatan', function($q)use($req)
                                  {
                                    $q->where('kabupaten_id', $req->kabupaten);
                                  }
                                );
      }

      

      // $pagination = $req->pagination ? (int)$req->pagination : 15;

      // if ($pagination) 
      // {
      //   $data = $data->orderBy('id', 'desc')->paginate($pagination);
      // } 
      // else 
      // {
      //   $data = $data->orderBy('id', 'desc')->get();
      // }

      if ($req->export) 
      {
        set_time_limit(6000);
        $pdf = PDF::loadView('view_pdf.konsultasi_tertolak', $data);

        return $pdf->download('konsultasi_tertolak.pdf');
      }

      return view('view_admin_karyawan.karyawan_normal')->with('filter', $filter)
                                                        ->with('data', $data);
    }

    




    public function prekomorbid(Request $req)
    {
      $filter['hal']       = Hal::all();
      $filter['unsur']     = Unsur::all();
      $filter['sektoral']  = Sektoral::all();
      $filter['jawaban']   = Jawaban::all();

      $filter['kabupaten'] = Kabupaten::all();
      $filter['kecamatan'] = [];
      // $filter['kemukiman'] = [];
      // $filter['gampong']   = [];

      if ($req->kabupaten) 
      {
        $filter['kecamatan'] = Kecamatan::where('kabupaten_id', $req->kabupaten)->get();
      }
      // if ($req->kecamatan) {
      //   $filter['kemukiman'] = Kemukiman::where('kecamatan_id', $req->kecamatan)->get();
      // }
      // if ($req->kemukiman) {
      //   $filter['gampong'] = Gampong::where('kemukiman_id', $req->kemukiman)->get();
      // }

      // $data = Konsultasi::with([
      //                       'umum.user',
      //                       'umum.unsur',
      //                       'umum.kecamatan.kabupaten',
      //                       'umum.hal',
      //                       'umum.sektoral',
      //                       'dokumen',
      //                       'jurnalKonsultasi' => function($q)
      //                                            {
      //                                             $q->orderBy('status_konsultasi_id', 'desc')->get();
      //                                            },
      //                        'jurnalKonsultasi.administrator',
      //                           ])->whereHas('statusKonsultasi', function($q)
      //                           {
      //                             $q->where('id', 3);
      //                           })->whereDoesntHave('statusKonsultasi', function($q)
      //                           {
      //                             $q->whereIn('id', [4,5]);
      //                           });

        // $data = Umum::with([  'user',
        //                     'konsultasi',
        //                     'unsur',
        //                     'hal',
        //                     'sektoral',
        //                     'kecamatan',
        //                     'kecamatan.kabupaten',
        //                    // 'dokumen',
        //                     'konsultasi'=> function($q)
        //                                    {
        //                                     $q->orderBy('id',  'desc')->first();
        //                                    },
        //                     // 'konsultasi.jurnalKonsultasi'=> function($q)
        //                     //                {
        //                     //                 $q->orderBy('id',  'desc')->first();
        //                     //                },

        //                    //'konsultasi.jurnalKonsultasi.administrator'
                         

        //                       ])->whereHas('konsultasi.jurnalKonsultasi', 
        //                                     function($q)
        //                                     {
        //                                       $q->where('status_konsultasi_id', 3);
        //                                     }
        //                                   );

        // $data = Umum::whereHas(['latestRM','latestRM.jurnalKonsultasiLatest',function($q)
        //                                     {
        //                                      $q->where('status_konsultasi_id',  3);
        //                                     }])->get();
                 /* 'latestRM.jurnalKonsultasiLatest',
                                'jurnalKonsultasiLatest'=>function($q)
                                            {
                                             $q->where('status_konsultasi_id',  3);
                                            }

                              //);//->get(); */

        $data = Umum::has('latestRM.jurnalKonsultasiLatest')->get();

        //dd($data);


        // $data->whereHas('latestRM.jurnalKonsultasiLatest', 
        //                  function($query)
        //                                    {
        //                                     return $query->where('latestRM.jurnalKonsultasiLatest.status_konsultasi_id',3);
        //                                    }
        //                    );


        //->whereHas('status_konsultasi_id',3);


                 //Umum::with('latestRM.jurnalKonsultasi')->get();
                     //->sortByDesc('latestRM.created_at');

        //dd($data);
                           //  'konsultasi',
                           //  'unsur',
                           //  'hal',
                           //  'sektoral',
                           //  'kecamatan',
                           //  'kecamatan.kabupaten',
                           // // 'dokumen',
                           //  'konsultasi'=> function($q)
                           //                 {
                           //                  $q->orderBy('id',  'desc')->first();
                           //                 },
                            // 'konsultasi.jurnalKonsultasi'=> function($q)
                            //                {
                            //                 $q->orderBy('id',  'desc')->first();
                            //                },

                           //'konsultasi.jurnalKonsultasi.administrator'
                         

                              // ])->whereHas('konsultasi.jurnalKonsultasi', 
                              //               function($q)
                              //               {
                              //                 $q->where('status_konsultasi_id', 3);
                              //               }
                              //             );


      if ($req->search) 
      {
        $data = $data->Where('NIK', $req->search);
      }

      // if ($req->mulai) {
      //   $data = $data->whereDate('created_at', '>=' , $req->mulai);
      // }

      // if ($req->akhir) {
      //   $data = $data->whereDate('created_at', '<=' , $req->akhir);
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

      // if ($req->gampong) {
      //   $data = $data->whereHas('umum.gampong', function($q)use($req){
      //     $q->where('id',$req->gampong);
      //   });
      // } elseif ($req->kemukiman) {
      //   $data = $data->whereHas('umum.gampong', function($q)use($req){
      //     $q->where('kemukiman_id', $req->kemukiman);
      //   });
      // } else

      if ($req->kecamatan) 
      {
        $data = $data->whereHas('umum', function($q)use($req){
          $q->where('kecamatan_id', $req->kecamatan);
        });
      } 
      elseif ($req->kabupaten) 
      {
        $data = $data->whereHas('umum.kecamatan', function($q)use($req)
        {
          $q->where('kabupaten_id', $req->kabupaten);
        });
      }

      // $pagination = $req->pagination ? (int)$req->pagination : 15;

      // if ($pagination)
      //  {
      //   $data = $data->orderBy('id', 'desc')->paginate($pagination);
      // } else
      //  {
      //   $data = $data->orderBy('id', 'desc')->get();
      // }

      // if ($req->export) 
      // {
      //   set_time_limit(6000);
      //   $pdf = PDF::loadView('view_pdf.konsultasi_terverifikasi', $data);

      //   return $pdf->download('konsultasi_terverifikasi.pdf');
      // }

      return view('view_admin_karyawan.karyawan_prekomorbid')->with('filter', $filter)
                                                                   ->with('data', $data);
    }





    public function komorbid(Request $req)
    {
      $filter['hal']       = Hal::all();
    
      $filter['unsur']     = Unsur::all();
      $filter['sektoral']  = Sektoral::all();
    
      $filter['kabupaten'] = Kabupaten::all();
      $filter['kecamatan'] = [];
      //$filter['kemukiman'] = [];
      //$filter['gampong'] = [];

      if ($req->kabupaten) {
        $filter['kecamatan'] = Kecamatan::where('kabupaten_id', $req->kabupaten)->get();
      }
      // if ($req->kecamatan) {
      //   $filter['kemukiman'] = Kemukiman::where('kecamatan_id', $req->kecamatan)->get();
      // }
      // if ($req->kemukiman) {
      //   $filter['gampong'] = Gampong::where('kemukiman_id', $req->kemukiman)->get();
      // }

      // $data = Konsultasi::with([
      //                       'umum.user',
      //                       'umum.unsur',
      //                       'umum.kecamatan.kabupaten',
      //                       'umum.hal',
      //                       'umum.sektoral',
      //                       'terjadwal.administrator',
      //                       'terjadwal.ruang',
      //                       'pemangku',
      //                       'dokumen',
      //                       'jurnalKonsultasi' => function($q){
      //                           $q->orderBy('created_at', 'asc')->get();
      //                        },
      //                     ])
      //                     ->whereHas('statusKonsultasi', function($q){
      //                       $q->where('id', 4);
      //                     })
      //                     ->whereDoesntHave('statusKonsultasi', function($q){
      //                       $q->where('id', 5);
      //                     });

      $data = Umum::has('latestRM.jurnalKonsultasiLatest')->get();
                               // 'konsultasi.jurnalKonsultasi'=>function($q)
                               //                                {
                               //                                 $q->where('status_konsultasi_id',3);
                               //                                }
                            

      //dd($data);


      // $data = Umum::with([  'user',
      //                       'konsultasi',
      //                       'unsur',
      //                       'hal',
      //                       'sektoral',
      //                       'kecamatan',
      //                       'kecamatan.kabupaten',
      //                      // 'dokumen',
      //                       'konsultasi'=> function($q)
      //                                      {
      //                                       $q->orderBy('id',  'desc')->first();
      //                                      },
      //                       'konsultasi.jurnalKonsultasi'=> function($q)
      //                                      {
      //                                       $q->orderBy('updated_at',  'desc')->first();
      //                                      },

      //                      //'konsultasi.jurnalKonsultasi.administrator'
                         

      //                         ])->whereHas('konsultasi.jurnalKonsultasi', 
      //                                       function($q)
      //                                       {
      //                                         $q->where('status_konsultasi_id', 4);
      //                                       }
      //                                     );

      if ($req->search) 
      {
        $data = $data->Where('NIK', $req->search);
      }


       if ($req->sektoral) {
        $data = $data->where('sektoral_id', $req->sektoral);
      }
     
      if ($req->hal) {
        $data = $data->where('hal_id', $req->hal);
      }

      if ($req->unsur) {
        $data = $data->where('unsur_id', $req->unsur);
        
      }

      // if ($req->gampong) {
      //   $data = $data->whereHas('umum.gampong', function($q)use($req){
      //     $q->where('id',$req->gampong);
      //   });
      // } elseif ($req->kemukiman) {
      //   $data = $data->whereHas('umum.gampong', function($q)use($req){
      //     $q->where('kemukiman_id', $req->kemukiman);
      //   });
      // } else
      if ($req->kecamatan) 
      {
        $data = $data->whereHas('umum', function($q)use($req){
          $q->where('kecamatan_id', $req->kecamatan);
        });
      } elseif ($req->kabupaten) 
      {
        $data = $data->whereHas('umum.kecamatan', function($q)use($req){
          $q->where('kabupaten_id', $req->kabupaten);
        });
      }


      // $pagination = $req->pagination ? (int)$req->pagination : 15;

      // if ($pagination) {
      //   $data = $data->orderBy('id', 'desc')->paginate($pagination);
      // } else {
      //   $data = $data->orderBy('id', 'desc')->get();
      // }

      if ($req->export) 
      {
        set_time_limit(6000);
        $pdf = PDF::loadView('view_pdf.konsultasi_terjadwal', $data);

        return $pdf->download('konsultasi_terjadwal.pdf');
      }

      return view('view_admin_karyawan.karyawan_komorbid')->with('filter', $filter)->with('data', $data);
    }






    public function penjadwalan($id)
    {
      $admins = Administrator::all();
      $ruang = Ruang::all();
      $pemangku = Pemangku::all();
      $data = Konsultasi::with(['jurnalKonsultasi'])->where('id', $id)->firstOrFail();

      $jurnalKonsultasi = $data->jurnalKonsultasi->first();
      $data->tanggal_konsultasi = Carbon::parse($jurnalKonsultasi['waktu'])->format('Y-m-d');
      $data->pukul_konsultasi = Carbon::parse($jurnalKonsultasi['waktu'])->format('H:i');
      $data->jumlah_delegasi = $jurnalKonsultasi['jumlah_delegasi'];

      return view('view_admin_karyawan.karyawan_penjadwalan')->with('data', $data)
                                                                ->with('admins', $admins)
                                                                ->with('ruang', $ruang)
                                                                ->with('pemangku', $pemangku);
    }





    public function prosesPenjadwalan(Request $req, $id)
    {
        $req->validate([
         'administrator' => 'required|integer',
         'ruangan' => 'required|string',
         'tanggal_konsultasi' => 'required|date',
         'pukul_konsultasi' => 'required',
         'jumlah_delegasi' => 'required|integer',
         'pemangku.*' => 'nullable|integer'
       ]);

       $konsultasi = Konsultasi::select(['id', 'no_registrasi'])
                                 ->where('id', $id)
                                 ->firstOrFail();

       JurnalKonsultasi::updateOrCreate(
           ['konsultasi_id' => $id, 'status_konsultasi_id' => 4],
           [
            'administrator_id' => session('umum_atau_administrator_id'),
            'waktu' => $req->tanggal_konsultasi." ".$req->pukul_konsultasi,
            'jumlah_delegasi' => $req->jumlah_delegasi,
           ]
       );

       Terjadwal::updateOrCreate(
           ['konsultasi_id' => $id],
           ['administrator_id' => $req->administrator,'ruang_id' => $req->ruangan]
       );

       $pemangku = $req->pemangku ? $req->pemangku : [];
       $konsultasi->pemangku()->sync($pemangku);

       $no_registrasi = $konsultasi->no_registrasi;
       return redirect()->route('admin.karyawan.terverifikasi')
                        ->with('success', 'Konsultasi dengan no registrasi '.$no_registrasi.' berhasil dijadwalkan');
    }





    public function komplikasi(Request $req)
    {
      $filter['hal']       = Hal::all();
      $filter['unsur']     = Unsur::all();
      $filter['sektoral']  = Sektoral::all();
     // $filter['jawaban']   = Jawaban::all();
      
      $filter['kabupaten'] = Kabupaten::all();
      $filter['kecamatan'] = [];
      //$filter['kemukiman'] = [];
     // $filter['gampong'] = [];

      if ($req->kabupaten) 
      {
        $filter['kecamatan'] = Kecamatan::where('kabupaten_id', $req->kabupaten)->get();
      }
      // if ($req->kecamatan) {
      //   $filter['kemukiman'] = Kemukiman::where('kecamatan_id', $req->kecamatan)->get();
      // }
      // if ($req->kemukiman) {
      //   $filter['gampong'] = Gampong::where('kemukiman_id', $req->kemukiman)->get();
      // }

      //$data = Umum::has('latestRM'

      //DATA KOMPLIKASI
      $data = Umum::has('latestRM.jurnalKonsultasiLatest')->get();
                               // 'konsultasi.jurnalKonsultasi'=>function($q)
                               //                                {
                               //                                 $q->where('status_konsultasi_id',3);
                               //                                }
                              //);



     //dd($data);

      // $data = Umum::with([  'user',
      //                       'konsultasi',
      //                       'unsur',
      //                       'hal',
      //                       'sektoral',
      //                       'kecamatan',
      //                       'kecamatan.kabupaten',
      //                      // 'dokumen',
      //                       'konsultasi'=> function($q)
      //                                      {
      //                                       $q->orderBy('id',  'desc')->first();
      //                                      },
      //                       'konsultasi.jurnalKonsultasi'=> function($q)
      //                                      {
      //                                       $q->orderBy('updated_at',  'desc')->first();
      //                                      },

      //                      //'konsultasi.jurnalKonsultasi.administrator'
                         

      //                         ])->whereHas('konsultasi.jurnalKonsultasi', 
      //                                       function($q)
      //                                       {
      //                                         $q->where('status_konsultasi_id', 5);
      //                                       }
      //                                     );

      // $data = Umum::with('konsultasi')->get();
      // dd($data);

      // $data = Umum::with([  
      //                       'konsultasi'=> function($q)
      //                                      {
      //                                       $q->orderBy('id',  'desc');
      //                                      },
      //                       'konsultasi.jurnalKonsultasi'=> function($q)
      //                                      {
      //                                       $q->where('status_konsultasi_id', 5);
      //                                      },
      //                       'konsultasi.pemangkuKonsultasi'
      //                     ])->get();
      //dd($data);


       // $data = Umum::with
       //                       ([
       //                      'user',
       //                      'unsur',
       //                      'hal',
       //                      'sektoral',
       //                      'kecamatan',
       //                      'kecamatan.kabupaten',
       //                     // 'dokumen',
       //                      'konsultasi'=> function($q)
       //                                     {
       //                                      $q->orderBy('id',  'desc')->first();
       //                                     },
       //                      'konsultasi.jurnalKonsultasi', 
       //                     // 'konsultasi.jurnalKonsultasi.administrator'

                           

       //                        ])->whereHas('konsultasi.jurnalKonsultasi', 
       //                                      function($q)
       //                                      {
       //                                        $q->where('status_konsultasi_id', 5);
       //                                      }
       //                                    );

      if ($req->search) 
      {
        $data = $data->Where('NIK', $req->search);
      }

    
    
       if ($req->sektoral) {
        $data = $data->where('sektoral_id', $req->sektoral);
      }
     
      if ($req->hal) {
        $data = $data->where('hal_id', $req->hal);
      }

      if ($req->unsur) {
        $data = $data->where('unsur_id', $req->unsur);
        
      }

      // if ($req->gampong) {
      //   $data = $data->whereHas('umum.gampong', function($q)use($req){
      //     $q->where('id',$req->gampong);
      //   });
      // } elseif ($req->kemukiman) {
      //   $data = $data->whereHas('umum.gampong', function($q)use($req){
      //     $q->where('kemukiman_id', $req->kemukiman);
      //   });
      // } else

       if ($req->kecamatan) 
      {
        $data = $data->whereHas('umum', function($q)use($req){
          $q->where('kecamatan_id', $req->kecamatan);
        });
      } elseif ($req->kabupaten) 
      {
        $data = $data->whereHas('umum.kecamatan', function($q)use($req){
          $q->where('kabupaten_id', $req->kabupaten);
        });
      }


      // if ($req->kecamatan) 
      // {
      //   $data = $data->whereHas('umum', function($q)use($req){
      //     $q->where('kecamatan_id', $req->kecamatan);
      //   });
      // } elseif ($req->kabupaten) {
      //   $data = $data->whereHas('umum.kecamatan', function($q)use($req){
      //     $q->where('kabupaten_id', $req->kabupaten);
      //   });
      // }

      // $pagination = $req->pagination ? (int)$req->pagination : 15;

      // if ($pagination) {
      //   $data = $data->orderBy('Nama', 'desc')->paginate($pagination);
      // } else {
      //   $data = $data->orderBy('Nama', 'desc')->get();
      // }

      if ($req->export) {
        set_time_limit(6000);
        $pdf = PDF::loadView('view_pdf.konsultasi_terekap', $data);

        return $pdf->download('konsultasi_terekap.pdf');
      }

      return view('view_admin_karyawan.karyawan_komplikasi')->with('filter', $filter)
                                                            ->with('data'  , $data);
    }







    public function perekapan($id)
    {
      $admins = Administrator::all();
      $ruang = Ruang::all();
      $pemangku = Pemangku::all();
      $data = Konsultasi::with(['jurnalKonsultasi' => function($q){
                                    $q->where('status_konsultasi_id', 4)->get();
                                 },
                                'terjadwal',
                                'pemangku',
                              ])
                         ->where('id', $id)->firstOrFail();

      $jurnalKonsultasi = $data->jurnalKonsultasi->first();
      $data->tanggal_konsultasi = Carbon::parse($jurnalKonsultasi['waktu'])->format('Y-m-d');
      $data->pukul_konsultasi = Carbon::parse($jurnalKonsultasi['waktu'])->format('H:i');
      $data->jumlah_delegasi = $jurnalKonsultasi['jumlah_delegasi'];

      return view('view_admin_karyawan.karyawan_perekapan')->with('data', $data)
                                                                ->with('admins', $admins)
                                                                ->with('ruang', $ruang)
                                                                ->with('pemangku', $pemangku);
    }






    public function prosesPerekapan(Request $req, $id)
    {
        $req->validate([
         'administrator' => 'required|integer',
         'ruangan' => 'required|string',
         'tanggal_konsultasi' => 'required|date',
         'pukul_konsultasi' => 'required',
         'jumlah_delegasi' => 'required|integer',
         'notulensi' => 'required|file|mimes:pdf,zip,rar',
         // 'tanggal_tahapan.*' => 'sometimes|date',
         // 'pukul_tahapan.*' => 'sometimes',
         'nama_tahapan.*' => 'sometimes|required|string',
         'keterangan_tahapan.*' => 'nullable|string',
         'pemangku.*' => 'nullable|integer',
       ]);

       $konsultasi = Konsultasi::select(['id', 'no_registrasi'])
                                 ->where('id', $id)
                                 ->firstOrFail();

       JurnalKonsultasi::updateOrCreate(
           ['konsultasi_id' => $id, 'status_konsultasi_id' => 5],
           [
             'administrator_id' => session('umum_atau_administrator_id'),
             'waktu' => $req->tanggal_konsultasi." ".$req->pukul_konsultasi,
             'jumlah_delegasi' => $req->jumlah_delegasi
           ]
       );

       $file = $req->notulensi;
       $name = time().uniqid().'.'.$file->getClientOriginalExtension();
       $file->move(public_path()."/notulensi/", $name);

       Terekap::updateOrCreate(
           ['konsultasi_id' => $id],
           [
             'administrator_id' => $req->administrator,
             'ruang_id' => $req->ruangan,
             'notulensi' => $name,
           ]
       );

       $pemangku = $req->pemangku ? $req->pemangku : [];
       $konsultasi->pemangku()->sync($pemangku);

       $tahapan = $req->nama_tahapan ? $req->nama_tahapan : [];
       foreach ($tahapan as $key => $value) {
         $data = new Tahapan;
         $data->konsultasi_id = $id;
         $data->no = ($key+1);
         $data->nama = $req->nama_tahapan[$key];
         $data->keterangan = $req->keterangan_tahapan[$key];
         $data->selesai = 0;
         $data->save();
       }

       $no_registrasi = $konsultasi->no_registrasi;
      return redirect()->route('admin.karyawan.terjadwal')
                       ->with('success', 'Konsultasi dengan no registrasi '.$no_registrasi.' berhasil direkap');
    }








    public function prosesTahapan(Request $req, $konsultasi_id)
    {
      $req->validate([
        'tahapan.*' => 'nullable|integer',
      ]);

      $tahapan = $req->tahapan ? $req->tahapan : [];

      Tahapan::where('konsultasi_id', $konsultasi_id)->whereIn('no', $tahapan)->update([
        'selesai' => 1,
      ]);

      Tahapan::where('konsultasi_id', $konsultasi_id)->whereNotIn('no', $tahapan)->update([
        'selesai' => 0,
      ]);

      $no_registrasi = Konsultasi::select(['id', 'no_registrasi'])
                                ->where('id', $konsultasi_id)
                                ->firstOrFail()->no_registrasi;

      return redirect()->route('admin.karyawan.terekap')
                       ->with('success', count($tahapan).' Tahapan di konsultasi dengan no registrasi '.$no_registrasi.' berhasil diselesaikan');
    }


}
