<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Facades\Builder;
use App\Models\Umum;



use App\Models\Hal;
use App\Models\Unsur;
use App\Models\Bagian;
use App\Models\Sektoral;
use App\Models\SatuanKerja;

use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kemukiman;
use App\Models\Gampong;
use App\Models\Dusun;
use App\Models\Item;

use App\Models\Renstra;
use App\Models\Tujuan;
use App\Models\Indikatortujuan;
use App\Models\Renssasar;
use App\Models\Indikatorrenssasar;
use App\Models\Renssasarprog;
use App\Models\Indikatorenssasarprog;
use App\Models\Renssasarprogkeg;
use App\Models\Indikatorrenssasarprogkeg;
use App\Models\Renssasarprogkegsubkeg;



use App\Models\Konsultasi;

//use App\Models\StatusKonsultasiTer;


use App\Models\StatusKonsultasi;
//use App\Models\KonsultasiTersurat;
use App\Models\JurnalKonsultasi;
use App\Models\VariabelKonsultasi;
use App\Models\Dokumen;
use App\Models\Peraturan;
use App\Models\JenisPeraturan;
use App\Models\Faq;
use Carbon\Carbon;
use Auth;
use PDF;



class KaryawanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('level:umum');
    }




//PROFIL KLINIK-------------------------------------------------------------------------------
    public function profil(Request $req)
    {
        

       $data = Umum::with('sektoral')->where('id',session('umum_atau_administrator_id')) 
                    ->first();
        // if ($req->search) 
        // {
        //   $data = $data->where('nama', 'LIKE', '%'.$req->search.'%');
        // }

        // // if ($req->hal) 
        // // {
        // //   $data = $data->where('hal_id', $req->hal);
        // // }

        // if ($req->jenis) 
        // {
        //   $data = $data->where('jenis_peraturan_id', $req->jenis);
        // }

       // $data = $data->paginate(15);

        return view('view_karyawan_klinik.karyawan_profil')->with('data', $data);
                                                       //->with('filter', $filter);
    }



     public function manajemen(Request $req)
    {
        

       $data = Umum::with('sektoral')
                    ->where('id',session('umum_atau_administrator_id')) 
                    ->first();
        // if ($req->search) 
        // {
        //   $data = $data->where('nama', 'LIKE', '%'.$req->search.'%');
        // }

        // // if ($req->hal) 
        // // {
        // //   $data = $data->where('hal_id', $req->hal);
        // // }

        // if ($req->jenis) 
        // {
        //   $data = $data->where('jenis_peraturan_id', $req->jenis);
        // }

       // $data = $data->paginate(15);

        return view('view_karyawan_klinik.karyawan_manajemen')->with('data', $data);
                                                       //->with('filter', $filter);
    }


     
    //DATA KARYAWAN---------------------------------------------------------------------------
    public function biodata(Request $req)
    {
     // $hal      = Hal::all();
      $sektoral = Sektoral::all();
      //$unsur    = Unsur::all();

      //$kabupaten= Kabupaten::all();
      //$kecamatan= Kecamatan::all();

      $status   = StatusKonsultasi::all();

      
      $data = Umum::where('id',session('umum_atau_administrator_id'))
                              ->first();

      // if ($req->search) 
      // {
      //   $data = $data->where('no_registrasi', 'LIKE' ,'%'.$req->search.'%')->orWhere('risalah', 'LIKE' ,'%'.$req->search.'%');
      // }

      // if ($req->kabupaten) 
      // {
      //   $kecamatan = Kecamatan::where('kabupaten_id', $req->kabupaten)->get();
      // }

     // if ($req->hal) 
      //{
       // $data = $data->where('hal_id', $req->hal);
     // }

      //if ($req->sektoral) 
      //{
       // $data = $data->where('sektoral_id', $req->sektoral);
      //}

      // if ($req->status_konsultasi) 
      // {
      //   $data = $data->whereHas('jurnalKonsultasi', function($q)use($req){
      //     $q->where('status_konsultasi_id', $req->status_konsultasi);
      //   });
      // }

      
      //$data = $data->orderBy('id', 'desc')->paginate(20);

      return view('view_karyawan_biodata.karyawan_data_edit')->with('data', $data)
                                                        ->with('sektoral', $sektoral);
                                                       
                                                        
    }





    // public function createBiodata()
    // {

    //  // $sektoral = Sektoral::all();
    //   //$hal      = Hal::all();

    //   return view('view_karyawan_biodata.karyawan_data_add');
    //                                              //->with('sektoral', $sektoral)
                 
    //                                              //->with('hal', $hal);
    // }

   


    // public function saveBiodata(Request $req)
    // {
    //   $req->validate([
    //     'nik'                        => 'required|integer',
    //     'noktp'                      => 'required|string|max:65500',
    //     'namalengkap'                => 'required|integer',
    //     'dept_id'                    => 'required|date',
    //     'tempat_lahir'               => 'required|integer',
    //     'tanggal_lahir'              => 'required|integer',
    //     'jenis_kelamin'              => 'required|integer',
    //     'status_nikah'               => 'required|integer',
    //     'no_asuransi'                => 'required|integer',
    //     'no_bpjs'                    => 'required|integer',
    //     'no_bpjstk'                  => 'required|integer',
    //     'alamat'                     => 'required|integer',
    //     'kec_id'                     => 'required|integer',
    //     'goldar'                     => 'required|integer',
    //     'no_hp'                      => 'required|integer',
    //     'email'                      => 'required|integer',
    //     'merokok'                    => 'required|integer',
    //     'olahraga'                   => 'required|integer',
    //     'obat_konsumsi'              => 'required|integer',
    //     'riwayat_penyakit_pribadi'   => 'required|integer',
    //     'riwayat_penyakit_keluarga'  => 'required|integer',
    //     'paparan_linkungan'          => 'required|integer',
    //     'uraian_kerja'               => 'required|integer',
    //     'dokumen.*'                  => 'nullable|file|mimes:pdf',
    //   ]);


    // $hari_ini = Carbon::now('Asia/Jakarta');
    // // $jml_konsultasi_hari_ini = Konsultasi::whereDate('created_at', $hari_ini)
    // //                                      ->orderBy('created_at', 'desc')
    // //                                      ->orderBy('id', 'desc')
    // //                                      ->first();
    // // $jml_konsultasi_hari_ini = $jml_konsultasi_hari_ini ? substr($jml_konsultasi_hari_ini->no_registrasi, 12) : -1;

    // // $no_registrasi = str_pad($req->hal,2,'0',STR_PAD_LEFT)
    // //                 .str_pad($req->sektoral,2,'0',STR_PAD_LEFT)
    // //                 .$hari_ini->format('dmY')
    // //                 .str_pad(((int)$jml_konsultasi_hari_ini)+1,4,'0',STR_PAD_LEFT);


    //     $user_id                   = session('umum_atau_administrator_id');
    //     $unsur_id                  = $unsur_id;
    //     $hal_id                    = $hal_id;
    //     $sektoral_id               = $sektoral_id;
    //     $gampong_id                = $gampong_id;


    //     $data = new Umum;
     
    //     $data->user_id                   = $user_id;
    //     $data->unsur_id                  = $unsur_id;
    //     $data->hal_id                    = $hal_id;
    //     $data->sektoral_id               = $sektoral_id;
    //     $data->gampong_id                = $gampong_id;

    //     $data->noktp                     = $req->ktp;
    //     $data->namalengkap               = $req->nama;
    //     $data->tempat_lahir              = $req->tempat_lahir;
    //     $data->tanggal_lahir             = $req->tanggal_lahir;
    //     $data->jenis_kelamin             = $req->jenis_kelamin;
    //     $data->status_nikah              = $req->stat_nikah;
    //     $data->no_asuransi               = $req->noasuransi;
    //     $data->no_bpjs                   = $req->nobpjs;
    //     $data->no_bpjstk                 = $req->nobpjstk;
    //     $data->alamat                    = $req->alamat;
    //     $data->kec_id                    = $req->kec_id;
    //     $data->goldar                    = $req->goldar;
    //     $data->no_hp                     = $req->no_hp;
    //     $data->email                     = $req->email;
    //     $data->merokok                   = $req->merokok;
    //     $data->olahraga                  = $req->olahraga;
    //     $data->obat_konsumsi             = $req->obat_konsumsi;
    //     $data->riwayat_penyakit_pribadi  = $req->riwapenpri;
    //     $data->riwayat_penyakit_keluarga = $req->riwapenkel;
    //     $data->paparan_linkungan         = $req->paparan_lin;
    //     $data->uraian_kerja              = $req->uraian_krj;
    //     //$data->dokumen.*                 = $req->risalah;
    //     $data->save();

    //   // $konsulatsi_id = $data->id;

    //   // $data = new JurnalKonsultasi;
    //   // $data->konsultasi_id = $konsulatsi_id;
    //   // $data->status_konsultasi_id = 1;
    //   // $data->waktu = $req->tanggal_konsultasi." ".$req->pukul_konsultasi;
    //   // $data->jumlah_delegasi = $req->delegasi;
    //   // $data->save();

    //   if($req->hasfile('dokumen'))
    //   {
    //       foreach($req->file('dokumen') as $file)
    //       {
    //         $name = time().uniqid().'.'.$file->getClientOriginalExtension();

    //         $file->move(public_path()."/uploads/", $name);

    //         $data = new Dokumen;
    //         $data->konsultasi_id = $konsulatsi_id;
    //         $data->nama = $file->getClientOriginalName();
    //         $data->lokasi_file = $name;
    //         $data->save();
    //       }
    //   }

    //   return redirect()->route('karyawan_biodata.karyawan_data')
    //                    ->with('success', 'Permohonan konsultasi berhasil ditambah');
    // }




    // public function editBiodata($id)
    // {

    //   // $data= Sektoral::all();
    //   // $data= Unsur::all();
    //   // $data= Hal::all();

    //   $alamat['kabupaten']= Kabupaten::all();
    //   // $data= Kecamatan::all();

    //   //$filter['hal']      = Hal::all();
    //   //$filter['jenis']    = JenisPeraturan::all();
    //   //$filter['sektoral'] = Sektoral::all();

      
    //   $data = Umum::with([      'hal', 
    //                             'sektoral',
    //                             'unsur',
    //                             'user',
    //                             'gampong.kemukiman.kecamatan.kabupaten', 
    //                             'dokumen'
    //                           ])
    //                     ->where('id', session('umum_atau_administrator_id'))
    //                     ->first();


    //  // if ($data->jurnalKonsultasi->last()['status_konsultasi_id'] > 2) 
    //  // {
    //  //   return redirect()->route('karyawan_biodata.karyawan_data')
    //  //                    ->with('warning', 'Konsultasi tidak dapat disunting karena sudah diverifikasi');
    //  // }

    //  // $jurnalKonsultasi = $data->jurnalKonsultasi->first();

    //   //$data->tanggal_konsultasi = Carbon::parse($jurnalKonsultasi['waktu'])->format('Y-m-d');
    //   //$data->pukul_konsultasi = Carbon::parse($jurnalKonsultasi['waktu'])->format('H:i');
    //   //$data->jumlah_delegasi = $jurnalKonsultasi['jumlah_delegasi'];

    //  $sektoral = Sektoral::all();
    //  $hal      = Hal::all();
    //  $unsur    = Unsur::all();

    //  //$kabupaten= Kabupaten::all();
    //  //$kecamatan= Kecamatan::all();


    //   return view('view_karyawan_biodata.karyawan_data_edit')->with('data', $data)
    //                                                          ->with('sektoral', $sektoral)
    //                                                          ->with('hal', $hal)
    //                                                          ->with('unsur', $unsur)
    //                                                          ->with('alamat', $alamat);
    //                                              }


    public function updateBiodata(Request $req, $id)
    {
        $req->validate([
        
        'nik'                       => 'required|integer',
        'nama'                      => 'required|string|max:65500',
        'sektoral'                  => 'required|integer',
        'hal'                       => 'required|integer',
        'unsur'                     => 'required|integer',
        'tempat_lahir'              => 'required|string|max:65500',
        'tanggal_lahir'             => 'required|date',
        'alamat'                    => 'required|string|max:65500',
        'status_nikah'              => 'nullable|string|max:65500',
        'goldar'                    => 'nullable|string|max:65500',
        'riwapenpri'                => 'nullable|string|max:65500',
        'riwapenkel'                => 'nullable|string|max:65500',
        'paparanlingkungan'         => 'nullable|string|max:65500',
        'uraiankerja'               => 'nullable|string|max:65500',
        
         'kecamatan'                => 'required|integer',
       
         'ktp'                      => 'required|string|max:65500',
         'no_handphone'             => 'nullable|string|max:65500',
         'email'                    => 'nullable|string|max:65500',
         'no_asuransi'              => 'required|integer',
         'no_bpjskes'               => 'required|integer',
         'no_bpjskerja'             => 'required|integer',
         'status_merokok'           => 'nullable|string|max:65500',
         'status_olahraga'          => 'nullable|string|max:65500',
         'obatkonsumsi'             => 'nullable|string|max:65500',
         'alergiobat'               => 'nullable|string|max:65500',
         'alergimakanan'            => 'nullable|string|max:65500',
  
        ]);

        // $hari_ini = Carbon::now('Asia/Jakarta');
        // $jml_konsultasi_hari_ini = Konsultasi::whereDate('created_at', $hari_ini)
        //                                      ->orderBy('created_at', 'desc')
        //                                      ->orderBy('id', 'desc')
        //                                      ->first();

        $data = Umum::findOrFail($id);
        $data->NIK                       = $req->nik;
        $data->No_KTP                    = $req->ktp;
        $data->Nama                      = $req->nama;
        $data->sektoral_id               = $req->sektoral;
        $data->kec_id                    = $req->kecamatan;
        $data->hal_id                    = $req->hal;
        $data->unsur_id                  = $req->unsur;
        $data->Tempat_Lahir              = $req->tempat_lahir;
        $data->Tanggal_Lahir             = $req->tanggal_lahir;
        $data->Status_Nikah              = $req->status_nikah;
        $data->No_Asuransi               = $req->no_asuransi;
        $data->No_BPJSKes                = $req->no_bpjskes;
        $data->No_BPJSKerja              = $req->no_bpjskerja;
        $data->Alamat                    = $req->alamat;
       
        $data->Goldar                    = $req->goldar;
        $data->no_handphone              = $req->no_handphone;
        $data->Email                     = $req->email;
        $data->Status_Merokok            = $req->status_merokok;
        $data->Olahraga                  = $req->status_olahraga;
        $data->Obat_Konsumsi             = $req->obatkonsumsi;
        $data->Riwayat_Penyakit          = $req->riwapenpri;
        $data->Riwayat_Penyakit_Keluarga = $req->riwapenkel;
        $data->Alergi_Makanan            = $req->alergimakanan;
        $data->Alergi_Obat               = $req->alergiobat;
        $data->Paparan_Lingkungan        = $req->paparanlingkungan;
        $data->Uraian_Kerja              = $req->uraiankerja;
        
        $data->save();


        // JurnalKonsultasi::where('konsultasi_id', $id)
        //                 ->where('status_konsultasi_id', 1)
        //                 ->update([
        //                           'waktu' => $req->tanggal_konsultasi." ".$req->pukul_konsultasi,
        //                           'jumlah_delegasi' => $req->delegasi,
        //                         ]);

        // JurnalKonsultasi::where('konsultasi_id', $id)
        //                 ->where('status_konsultasi_id', '!=', 1)
        //                 ->delete();


        // if($req->hasfile('dokumen'))
        // {
        //     foreach($req->file('dokumen') as $file)
        //     {
        //       $name = time().uniqid().'.'.$file->getClientOriginalExtension();

        //       $file->move(public_path()."/uploads/", $name);

        //       $data = new Dokumen;
        //       $data->konsultasi_id = $id;
        //       $data->nama          = $file->getClientOriginalName();
        //       $data->lokasi_file   = $name;
        //       $data->save();
        //     }
        // }

        return redirect()->route('karyawan_biodata.karyawan_data', $id)
                         ->with('success', 'Biodata Berhasil di Edit');
    }





    public function deleteFileKTP(Request $req)
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

      return redirect()->route('pengguna.permohonan.edit', $konsultasi_id)
                       ->with('success', 'Dokumen '.$nama.' berhasil dihapus');
    }

    public function deleteKaryawan(Request $req)
    {
      $req->validate([
        'check.*' => 'required|integer',
      ]);

      $check = $req->check ? $req->check : [];
      $data = Umum::with('dokumen')
                        ->whereIn('id', $check)
                        ->where('id', session('umum_atau_administrator_id'));

      $konsultasi = $data->get();

      // foreach ($konsultasi as $key => $value) {
      //   foreach ($value->dokumen as $i => $dokumen) {
      //       try {
      //           unlink(public_path('uploads/'.$dokumen->lokasi_file));
      //       } catch (\Exception $e) {

      //       }
      //   }
      // }

      $data->delete();

      return redirect()->route('karyawan_biodata.karyawan_data')
                       ->with('success', count($req->check).' permohonan konsultasi dengan berhasil dihapus');
    }




   
    //MENAMPILKAN REKAM MEDIK--------------------------------------------------------------
    public function rekammedik(Request $req)
    {
      
      $filter['status']    = StatusKonsultasi::all();
      $filter['kabupaten'] = Kabupaten::all();
      $filter['kecamatan'] = [];
      $filter['kemukiman'] = [];
      $filter['gampong']   = [];
      $filter['dusun']     = Dusun::all();//where('konsultasi.sektoral.umum', 
                                            //  function($q)
                                             //  {
                                             //    $q->where('umum_id',session('umum_atau_administrator_id'));
                                             //  }
                                             // )->get();

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

                               
      //                          'item.jurnalKonsultasi',
                              
      //                          'sektoral'=> function($q)
      //                                                   {
      //                                                   $q->where('umum_id',
      //                                                              session('umum_atau_administrator_id')
      //                                                            );
      //                                                   }
                                                        

                               
      //                         )->whereHas(
                                          
                                            
      //                                  )->get();



       $data = Renssasarprogkegsubkeg::with(['konsultasi.item.jurnalKonsultasi'=>function($q)
                                                                      {
                                                                        $q->where('status_konsultasi_id',2);
                                                                      }
                                ],

                                ['indikatorrenssasarprogkeg.renssasarprogkeg.indikatorrenssasarprog.renssasarprog.indikatorrenssasar.renssasar.indikatortujuan.tujuan.renstra'=>function($q)
                                                                      {
                                                                        $q->where('sektoral_id',21);
                                                                      }
                                ]



                            )->get();
                               
                               
                               

        // => function($query)
        //                                                     {
        //                                                     $query->where('umum_id',session('umum_atau_administrator_id'));
        //                                                     }],
        //                             'item.jurnalKonsultasi'

//dd(session('umum_atau_administrator_id'));

         // $data = JurnalKonsultasi::with([
                                         
         //                                 'item.konsultasi.sektoral'=> function($q)
         //                                                              {
         //                                                                $q->where('umum_id',
         //                                                                           session('umum_atau_administrator_id')
         //                                                                         );
         //                                                              }
                                    

         //                             ])->where('status_konsultasi_id',2)->orderBy('created_at', 'asc')
         //                               ->get();



    //dd($data);


      // $data = JurnalKonsultasi::with([
                                
      //                                 'konsultasi',
      //                                 'konsultasi.dokumen',
      //                                 // 'konsultasi.sektoral.umum'=> function($q)
      //                                 //                              {
      //                                 //                               $q->where('umum_id',
      //                                 //                                          session('umum_atau_administrator_id')
      //                                 //                                        );
      //                                 //                               }

      //                                ])->where('status_konsultasi_id',3)->get();

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





    

      // if ($req->status_konsultasi) 
      // {
      //   $data = $data->whereHas('jurnalKonsultasi', function($q)use($req)
      //                                              {
      //                                               $q->where('status_konsultasi_id', $req->status_konsultasi);
      //                                              }
      //                           );
      // }

      //$data = $data->orderBy('id', 'desc')->paginate(20);

      //dd($data);

      return view('view_karyawan_rekammedik.karyawan_rm')->with('data', $data)
                                                         //->with('data_realisasi',$data_realisasi)
                                                          ->with('filter', $filter);
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
