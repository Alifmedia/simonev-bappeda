<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Menu;
use App\Models\Pemangku;
use App\Models\Ruang;
use App\Models\Faq;
use App\Models\Peraturan;
use App\Models\JenisPeraturan;
use App\Models\Hal;

use App\Models\Soal;
use App\Models\TemaSoal;
use App\Models\Jawaban;
use App\Models\JawabanSoal;


class AdminDataMasterController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
      $this->middleware('level:superadmin');
    }

    public function pemangku(Request $req)
    {
      $data = Pemangku::select('*');
      if ($req->search) {
        $data = $data->where('nama', 'LIKE', '%'.$req->search.'%')
                     ->orWhere('nik', 'LIKE', '%'.$req->search.'%');
      }
      $data = $data->paginate(15);
      return view('view_admin_data_master.data_master_pemangku_kepentingan')->with('data', $data);
    }

    public function tambahPemangku()
    {
      return view('view_admin_data_master.data_master_pemangku_kepentingan_tambah');
    }

    public function simpanPemangku(Request $req)
    {
      $req->validate([
        'nama' => 'required|string',
        'nik' => 'required|numeric',
        'no_handphone' => 'required|numeric',
        'tempat_lahir' => 'required|string',
        'tanggal_lahir' => 'required|date',
      ]);

      $data = new Pemangku;
      $data->nama = $req->nama;
      $data->nik = $req->nik;
      $data->no_handphone = $req->no_handphone;
      $data->tempat_lahir = $req->tempat_lahir;
      $data->tanggal_lahir = $req->tanggal_lahir;
      $data->save();

      return redirect()->route('admin.master.pemangku')
            ->with('success', 'Data berhasil ditambah.');

    }

    public function editPemangku($id)
    {
      $data = Pemangku::findOrFail($id);
      return view('view_admin_data_master.data_master_pemangku_kepentingan_edit')->with('data', $data);
    }

    public function updatePemangku(Request $req, $id)
    {
      $req->validate([
        'nama' => 'required|string',
        'nik' => 'required|numeric',
        'no_handphone' => 'required|numeric',
        'tempat_lahir' => 'required|string',
        'tanggal_lahir' => 'required|date',
      ]);

      $data = Pemangku::find($id);
      $data->nama = $req->nama;
      $data->nik = $req->nik;
      $data->no_handphone = $req->no_handphone;
      $data->tempat_lahir = $req->tempat_lahir;
      $data->tanggal_lahir = $req->tanggal_lahir;
      $data->save();

      return redirect()->route('admin.master.pemangku.edit', $id)
            ->with('success', 'Data berhasil diedit.');
    }

    public function deletePemangku(Request $req)
    {
      $req->validate([
        'check.*' => 'required|integer',
      ]);

      $pemangku = $req->check ? $req->check : [];
      Pemangku::whereIn('id', $pemangku)->delete();

      return redirect()->route('admin.master.pemangku')
            ->with('success', count($pemangku).' data berhasil dihapus.');
    }

    public function ruang(Request $req)
    {
      $data = Ruang::orderBy('id', 'desc');
      if ($req->search) {
        $data = $data->where('nama', 'LIKE', '%'.$req->search.'%')
                     ->orWhere('instansi', 'LIKE', '%'.$req->search.'%')
                     ->orWhere('gudang', 'LIKE', '%'.$req->search.'%');
      }
      $data = $data->paginate(15);
      return view('view_admin_data_master.data_master_ruang')->with('data', $data);
    }

    public function tambahRuang()
    {
      return view('view_admin_data_master.data_master_ruang_tambah');
    }

    public function simpanRuang(Request $req)
    {
      $req->validate([
        'instansi' => 'required|string',
        'gedung' => 'nullable|string',
        'nama' => 'required|string',
        'lantai' => 'nullable|string',
        'alamat' => 'required|string',
      ]);

      $data = new Ruang;
      $data->instansi = $req->instansi;
      $data->gedung = $req->gedung;
      $data->nama = $req->nama;
      $data->lantai = $req->lantai;
      $data->alamat = $req->alamat;
      $data->save();

      return redirect()->route('admin.master.ruang')
            ->with('success', 'Data berhasil ditambah.');
    }

    public function editRuang($id)
    {
      $data = Ruang::findOrFail($id);
      return view('view_admin_data_master.data_master_ruang_edit')->with('data', $data);
    }

    public function updateRuang(Request $req, $id)
    {
      $req->validate([
        'instansi' => 'required|string',
        'gedung' => 'nullable|string',
        'nama' => 'required|string',
        'lantai' => 'nullable|string',
        'alamat' => 'required|string',
      ]);

      $data = Ruang::find($id);
      $data->instansi = $req->instansi;
      $data->gedung = $req->gedung;
      $data->nama = $req->nama;
      $data->lantai = $req->lantai;
      $data->alamat = $req->alamat;
      $data->save();

      return redirect()->route('admin.master.ruang.edit', $id)
            ->with('success', 'Data berhasil diedit.');
    }

    public function deleteRuang(Request $req)
    {
      $req->validate([
        'check.*' => 'required|integer',
      ]);

      $ruang = $req->check ? $req->check : [];
      Ruang::whereIn('id', $ruang)->delete();

      return redirect()->route('admin.master.ruang')
            ->with('success', count($ruang).' data berhasil dihapus.');
    }

    public function faq(Request $req)
    {
      $data = Faq::orderBy('id', 'desc');

      if ($req->search) {
        $data = $data->where('pertanyaan', 'LIKE', '%'.$req->search.'%');
      }

      $data = $data->paginate(15);

      return view('view_admin_data_master.data_master_faq')->with('data', $data);
    }

    public function tambahFaq()
    {
      return view('view_admin_data_master.data_master_faq_tambah');
    }

    public function simpanFaq(Request $req)
    {
      $req->validate([
        'pertanyaan' => 'required|string',
        'jawaban' => 'required|string',
      ]);

      $data = new Faq;
      $data->pertanyaan = $req->pertanyaan;
      $data->jawaban = $req->jawaban;
      $data->save();

      return redirect()->route('admin.master.faq')
            ->with('success', 'Data berhasil ditambah.');
    }

    public function editFaq($id)
    {
      $data = Faq::findOrFail($id);
      return view('view_admin_data_master.data_master_faq_edit')->with('data', $data);
    }

    public function updateFaq(Request $req, $id)
    {
      $req->validate([
        'pertanyaan' => 'required|string',
        'jawaban' => 'required|string',
      ]);

      $data = Faq::find($id);
      $data->pertanyaan = $req->pertanyaan;
      $data->jawaban = $req->jawaban;
      $data->save();

      return redirect()->route('admin.master.faq.edit', $id)
            ->with('success', 'Data berhasil diedit.');
    }

    public function deleteFaq($id)
    {
      Faq::findOrFail($id)->delete();

      return redirect()->route('admin.master.faq')
            ->with('success', 'Data berhasil dihapus.');
    }




    public function peraturan(Request $req)
    {
      $filter['hal']   = Hal::all();
      $filter['jenis'] = JenisPeraturan::all();

      $data = Peraturan::with(['jenisPeraturan', 'hal'])->orderBy('id', 'desc');

      if ($req->search) {
        $data = $data->where('nama', 'LIKE', '%'.$req->search.'%');
      }

      if ($req->hal) {
        $data = $data->where('hal_id', $req->hal);
      }

      if ($req->jenis) {
        $data = $data->where('jenis_peraturan_id', $req->jenis);
      }

      $data = $data->paginate(15);

      return view('view_admin_data_master.data_master_peraturan')->with('data', $data)
                                                                 ->with('filter', $filter);
    }

    public function tambahPeraturan()
    {
      $perihal = Hal::all();
      $jenis   = JenisPeraturan::all();
      return view('view_admin_data_master.data_master_peraturan_tambah')->with('perihal', $perihal)
                                                                  ->with('jenis', $jenis);
    }

    public function simpanPeraturan(Request $req)
    {
      $req->validate([
        'jenis' => 'required|integer',
        'perihal' => 'required|integer',
        'nama' => 'required|string',
        'tanggal_pengesahan' => 'required|date',
        'dokumen' => 'required|file|mimes:pdf,zip,rar',
      ]);

      $file = $req->dokumen;
      $name = time().uniqid().'.'.$file->getClientOriginalExtension();
      $file->move(public_path()."/peraturan/", $name);

      $data = new Peraturan;
      $data->jenis_peraturan_id = $req->jenis;
      $data->hal_id = $req->perihal;
      $data->nama = $req->nama;
      $data->tanggal_pengesahan = $req->tanggal_pengesahan;
      $data->lokasi_file = $name;
      $data->save();

      return redirect()->route('admin.master.peraturan')
            ->with('success', 'Data berhasil ditambah.');
    }

    public function editPeraturan($id)
    {
      $data    = Peraturan::findOrFail($id);
      $perihal = Hal::all();
      $jenis   = JenisPeraturan::all();

      return view('view_admin_data_master.data_master_peraturan_edit')->with('data', $data)
                                                                      ->with('perihal', $perihal)
                                                                      ->with('jenis', $jenis);
    }

    public function updatePeraturan(Request $req, $id)
    {
      $req->validate([
        'jenis' => 'required|integer',
        'perihal' => 'required|integer',
        'nama' => 'required|string',
        'tanggal_pengesahan' => 'required|date',
        'dokumen' => 'nullable|file|mimes:pdf,zip,rar',
      ]);

      $file = $req->dokumen;

      $data = Peraturan::find($id);
      $data->jenis_peraturan_id = $req->jenis;
      $data->hal_id = $req->perihal;
      $data->nama = $req->nama;
      $data->tanggal_pengesahan = $req->tanggal_pengesahan;
      if ($file) {

        $name = time().uniqid().'.'.$file->getClientOriginalExtension();
        $file->move(public_path()."/peraturan/", $name);

        try {
          unlink(public_path('peraturan/'.$data->lokasi_file));
        } catch (\Exception $e) {

        }

        $data->lokasi_file = $name;
      }
      $data->save();

      return redirect()->route('admin.master.peraturan.edit', $id)
            ->with('success', 'Data berhasil disunting.');
    }

    public function deletePeraturan(Request $req)
    {
      $req->validate([
        'check.*' => 'required|integer',
      ]);

      $check = $req->check ? $req->check : [];
      $data = Peraturan::whereIn('id', $check);

      $peraturan = $data->get();
      foreach ($peraturan as $key => $value) {
        try {
          unlink(public_path('peraturan/'.$value->lokasi_file));
        } catch (\Exception $e) {

        }
      }

      $data->delete();

      return redirect()->route('admin.master.peraturan')
            ->with('success', count($check).' data berhasil dihapus.');
    }

    public function penilaian(Request $req)
    {
      // $filter['hal'] = Hal::all();
      // $filter['jenis'] = JenisPeraturan::all();

      // $data = Peraturan::with(['jenisPeraturan', 'hal'])->orderBy('id', 'desc');

      // if ($req->search) {
      //   $data = $data->where('nama', 'LIKE', '%'.$req->search.'%');
      // }

      // if ($req->hal) {
      //   $data = $data->where('hal_id', $req->hal);
      // }

      // if ($req->jenis) {
      //   $data = $data->where('jenis_peraturan_id', $req->jenis);
      // }

      // $data = $data->paginate(15);
      // $filter['tema_soal'] = TemaSoal::all();
      $data = Soal::with(['jawaban']);
      $data = $data->paginate(15);

      return view('view_admin_data_master.data_master_penilaian')->with('data', $data);
                                                                 // ->with('filter', $filter);
    }


    public function deleteSoal(Request $req)
    {
      $req->validate([
        'check.*' => 'required|integer',
      ]);

      $soal = $req->check ? $req->check : [];
      Soal::whereIn('id', $soal)->delete();

      return redirect()->route('admin.master.penilaian')
            ->with('success', count($soal).' data berhasil dihapus.');
    }




    public function tambahSoal()
    {
      // $perihal = Hal::all();
      // $jenis = JenisPeraturan::all();
      $tema    = TemaSoal::all();
      //$jawaban = Jawaban::all();

      return view('view_admin_data_master.data_master_penilaian_tambah')
      ->with('tema', $tema);//->with('jawaban', $jawaban);
                                                                  // ->with('jenis', $jenis);
    }

    public function simpanSoal(Request $req)
    {
      //$req->validate([
      //   'tema' => 'required|string',
      //   'soal' => 'required|string',
      // ]);

      $data = new Soal;
      $data->tema_soal_id = $req->tema;
      $data->soal         = $req->soal;
      $data->save();

      return redirect()->route('admin.master.penilaian')
            ->with('success', 'Data berhasil ditambah.');
    }


public function editSoal($id)
    {
      $data          = Soal::findOrFail($id);
      $temaSoal      = temaSoal::all();
      //$jawaban       = Jawaban::all();
      //$selected_type = Menu::lists('title', 'id');
      
      return view('view_admin_data_master.data_master_penilaian_edit')->with('data', $data)
                                                                        ->with('temaSoal', $temaSoal);
                                                                        //->with('selected_type', $selected_type)
                                                                        // ->with('jawaban', $jawaban);
    }

    public function updateSoal(Request $req, $id)
    {

      $req->validate([
        'tema' => 'required|integer',
        'soal' => 'required|string',
      ]);

      
      $data               = Soal::findOrFail($id);
      $data->soal         = $req->soal;
      $data->tema_soal_id = $req->tema;
      $data->save(); 
      //$jawaban       = Jawaban::all();
      //$selected_type = Menu::lists('title', 'id');
      
      return redirect()->route('admin.master.penilaian.editSoal', $id)
            ->with('success', 'Soal berhasil diupdate.');
    }



    public function pilihJawaban($id)
    {
      // $perihal = Hal::all();
      // $jenis = JenisPeraturan::all();
      $soal         = Soal::find($id);
      $tema_soal    = TemaSoal::all();
      //$jawaban_soal = JawabanSoal::find($id);
      $jawaban      = Jawaban::all();
     

      return view('view_admin_data_master.data_master_penilaian_pilih_jawaban')
      ->with('soal', $soal)
      ->with('tema_soal', $tema_soal)
      //->with('jawaban_soal',$jawaban_soal)
      ->with('jawaban', $jawaban);
                                                                  // ->with('jenis', $jenis);
    }

    // public function simpanJawaban(Request $req)
    // {
    //   // $perihal = Hal::all();
    //   // $jenis = JenisPeraturan::all();
    //   $tema = TemaSoal::all();
    //   $jawaban = Jawaban::all();

    //   $data = new JawabanSoal;
    //   $data->soal_id = $req->tema_soal;
    //   $data->jawaban_id = $req->soal;
    //   $data->save();

    //   return redirect()->route('admin.master.penilaian')
    //         ->with('success', 'Jawaban berhasil ditambah.');
    // }

    

    

    public function updateJawaban(Request $req, $id)
    {
      // $req->validate([
      //   'jenis' => 'required|integer',
      //   'perihal' => 'required|integer',
      //   'nama' => 'required|string',
      //   'tanggal_pengesahan' => 'required|date',
      //   'dokumen' => 'nullable|file|mimes:pdf,zip,rar',
      // ]);

      //$check = $req->check ? $req->check : [];
      //foreach ($check as $value) 
      //{
      //  $data             = new JawabanSoal;

       // $data->soal_id    = $id;
       // $data->jawaban_id = $value;
       // $data->save(); 
      //}

      //return redirect()->route('admin.master.penilaian.pilihJawaban', $id)
      //      ->with('success', 'Jawaban berhasil ditambahkan.');

///////////////////////////////////////////////////////////////////////////
        $check = $req->check ? $req->check : [];
        
        foreach ($check as $value) 
        {

          //$data             = new JawabanSoal;

          //$data->soal_id    = $id;
          //$data->jawaban_id = $value;

                   JawabanSoal::updateOrCreate(
                                                [
                                                 'soal_id'      => $id,
                                                ],
                                                [
                                                  'jawaban_id' => $check,
                                                ]
                                              );
        }

        return redirect()->route('admin.master.penilaian.pilihJawaban', $id)
        ->with('success','Jawaban berhasil ditambahkan.');

        /////////////////////////////////////////////////////////////////////

    }

    
}
