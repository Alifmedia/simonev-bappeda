<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hal;
use App\Models\Unsur;
use App\Models\Umum;
use App\Models\Konsultasi;
use App\Models\Sektoral;
use App\Models\KonsultasiTersurat;
use App\Models\StatusKonsultasiTer;
use App\Models\Administrator;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kemukiman;
use App\Models\Gampong;
use Carbon\Carbon;
use Auth;
use PDF;




class AdminKlinikController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('level:administrator');
    }

     public function profil(Request $req)
    {
        //$filter['hal'] = Hal::all();
        // $filter['jenis'] = JenisPeraturan::all();
         //$filter['sektoral'] = Sektoral::all();

       $data = Umum::with('sektoral','konsultasi')
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

        return view('view_admin_klinik.klinik_profil')->with('data', $data);
                                                       //->with('filter', $filter);
    }

    public function manajemen(Request $req)
    {
        //$filter['hal'] = Hal::all();
        // $filter['jenis'] = JenisPeraturan::all();
         //$filter['sektoral'] = Sektoral::all();

       $data = Umum::with('sektoral','konsultasi')
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

        return view('view_admin_klinik.klinik_manajemen')->with('data', $data);
                                                       //->with('filter', $filter);
    }




    public function jawabSurat($id)
    {
      $data = KonsultasiTersurat::findOrFail($id);
      $data->status_id = 2;
      $data->save();

      $no_registrasi = $data->no_registrasi;

      return redirect()->route('admin.konsultasi_tersurat.permohonan')
                      ->with('success', 'Konsultasi Tersurat dengan no registrasi '.$no_registrasi.' berhasil terjawab');

    }

    public function jawab($id)
    {
      $data = KonsultasiTersurat::findOrFail($id);
      return view('view_admin_konsultasi_tersurat.konsultasi_tersurat_permohonan_jawab')->with('data', $data);
    }


    public function simpanJawab(Request $req, $id)
    {
      //$req->validate(['file_jawab' => 'required|file|mimes:pdf']);

      $file = $req->file_jawab;

      $data = KonsultasiTersurat::findOrFail($id);
      $data->status_id = 2;
      
      
      if($file)
      {
      $filename = time().uniqid().'.'.$file->getClientOriginalExtension();
      $file->move(public_path()."/jawaban/", $filename);
      //unlink(public_path('jawaban/').$data->lokasi_file_jawab);

      $data->lokasi_file_jawab = $filename;
      }
      
      $data->save();

      return redirect()->route('admin.konsultasi_tersurat.jawab', $id)
            ->with('success', 'Data berhasil diedit.');
    }
    

    public function terjawab(Request $req)
    {
        $filter['hal'] = Hal::all();
        $filter['kabupaten'] = Kabupaten::all();
        $filter['unsur'] = Unsur::all();
        $filter['status']    = StatusKonsultasiTer::all();
        $filter['kecamatan'] = [];
        $filter['kemukiman'] = [];
        $filter['gampong'] = [];

        if ($req->kabupaten) {
          $filter['kecamatan'] = Kecamatan::where('kabupaten_id', $req->kabupaten)->get();
        }
        if ($req->kecamatan) {
          $filter['kemukiman'] = Kemukiman::where('kecamatan_id', $req->kecamatan)->get();
        }
        if ($req->kemukiman) {
          $filter['gampong'] = Gampong::where('kemukiman_id', $req->kemukiman)->get();
        }

        $data = KonsultasiTersurat::where('status_id',[2])->get();
                                                                 

       
        if ($req->search) {
          $data = $data->where('no_registrasi', 'LIKE' ,'%'.$req->search.'%')->orWhere('risalah', 'LIKE' ,'%'.$req->search.'%');
        }

        if ($req->hal) {
          $data = $data->where('hal_id', $req->hal);
        }

        if ($req->statusKonsultasiTer) {
          $data = $data->where('status_id', $req->statusKonsultasiTer);
        }
        if ($req->unsur) {
          $data = $data->whereHas('umum', function($q)use($req){
            $q->where('unsur_id', $req->unsur);
          });
        }

        if ($req->mulai) {
          $data = $data->whereDate('created_at', '>=' , $req->mulai);
        }

        if ($req->akhir) {
          $data = $data->whereDate('created_at', '<=' , $req->akhir);
        }

        if ($req->gampong) {
          $data = $data->whereHas('umum.gampong', function($q)use($req){
            $q->where('id',$req->gampong);
          });
        } elseif ($req->kemukiman) {
          $data = $data->whereHas('umum.gampong', function($q)use($req){
            $q->where('kemukiman_id', $req->kemukiman);
          });
        } elseif ($req->kecamatan) {
          $data = $data->whereHas('umum.gampong.kemukiman', function($q)use($req){
            $q->where('kecamatan_id', $req->kecamatan);
          });
        } elseif ($req->kabupaten) {
          $data = $data->whereHas('umum.gampong.kemukiman.kecamatan', function($q)use($req){
            $q->where('kabupaten_id', $req->kabupaten);
          });
        }

        




        return view('view_admin_konsultasi_tersurat.konsultasi_tersurat_terjawab')->with('filter', $filter)->with('data', $data);
    }

}
