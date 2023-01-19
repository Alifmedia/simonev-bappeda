<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Umum;
use App\Models\Unsur;
use App\Models\Administrator;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kemukiman;
use App\Models\Gampong;



class AdminPenggunaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('level:superadmin');

    }

    public function umum(Request $req)
    {
        $filter['unsur']     = Unsur::all();
        $filter['kabupaten'] = Kabupaten::all();
        $filter['kecamatan'] = [];
        $filter['kemukiman'] = [];
        $filter['gampong']   = [];

        if ($req->kabupaten) 
        {
          $filter['kecamatan'] = Kecamatan::where('kabupaten_id', $req->kabupaten)->get();
        }
        if ($req->kecamatan) 
        {
          $filter['kemukiman'] = Kemukiman::where('kecamatan_id', $req->kecamatan)->get();
        }
        if ($req->kemukiman) 
        {
          $filter['gampong']   = Gampong::where('kemukiman_id', $req->kemukiman)->get();
        }


        //MENDAPATKAN DATA PENGGUNA UMUM
        // $data = Umum::with([
        //                       'user',
        //                       'unsur' => function($q)use($req)
        //                                   {
        //                                     if ($req->unsur) 
        //                                     {
        //                                       $q->where('unsur_id', $req->unsur);
        //                                     }
        //                                   },
        //                       'gampong.kemukiman.kecamatan.kabupaten'
        //                     ]);


        $level=1;
        $data = User::where('level', $level);
                                           
                                          
                          


        if ($req->search) 
        {
          $data = $data->where('nama', 'LIKE' ,'%'.$req->search.'%');
        }

        if ($req->unsur) 
        {
          $data = $data->whereHas('umum', function($q)use($req)
                                          {
                                            $q->where('unsur_id', $req->unsur);
                                          }
                                  );
        }

        if ($req->gampong) 
        {
          $data = $data->whereHas('gampong', function($q)use($req)
                                              {
                                                $q->where('id',$req->gampong);
                                              }
                                  );
        } 
        elseif ($req->kemukiman) 
        {
          $data = $data->whereHas('gampong', function($q)use($req)
                                             {
                                              $q->where('kemukiman_id',$req->kemukiman);
                                             }
                                  );
        } 
        elseif ($req->kecamatan) 
        {
          $data = $data->whereHas('gampong.kemukiman', 
                                   function($q)use($req)
                                    {
                                      $q->where('kecamatan_id', $req->kecamatan);
                                    }
                                  );
        } 
        elseif ($req->kabupaten) 
        {
          $data = $data->whereHas('gampong.kemukiman.kecamatan', 
                                   function($q)use($req)
                                    {
                                      $q->where('kabupaten_id', $req->kabupaten);
                                    }
                                  );
        }

        $data = $data->paginate(20);

        return view('view_admin_pengguna.pengguna_umum')->with('data', $data)
                                                        ->with('filter', $filter);
    }


    public function tambahUmum()
    {
      $unsur = Unsur::all();
      $alamat['kabupaten'] = Kabupaten::all();

      return view('view_admin_pengguna.pengguna_umum_add')
           ->with('unsur', $unsur)
           ->with('alamat', $alamat);
    }



     public function simpanUmum(Request $req)
    {
      $req->validate([
        'nama'              => ['required', 'string', 'max:190'],
        'nik'               => ['required', 'numeric'],
        'jenis_kelamin'     => ['required', 'boolean'],
        'tempat_lahir'      => ['required', 'string', 'max:190'],
        'tanggal_lahir'     => ['required', 'date'],
        'ktp'               => ['required', 'image'],
        'unsur'             => ['required', 'integer'],
        'gampong'           => ['required', 'integer'],
        'alamat'            => ['required', 'string', 'max:190'],
        'no_handphone'      => ['required', 'numeric'],

        'email'             => ['required', 'string', 'max:255', 'unique:users'],
        'password'          => ['required', 'string', 'min:8', 'confirmed'],
        'operator_kecamatan'=> 'nullable|integer',
      ]);

      $level=0;

      $user = User::create([
          'email' => $req->email,
          'password' => Hash::make($req->password),
          'level' => $level,
      ]);

      $file = $req->ktp;
      $name = time().uniqid().'.'.$file->getClientOriginalExtension();
      $file->move(public_path()."/umum/ktp/", $name);

      Umum::create([
          'nama'          => $req->nama,
          'nik'           => $req->nik,
          'jenis_kelamin' => $req->jenis_kelamin,
          'tempat_lahir'  => $req->tempat_lahir,
          'tanggal_lahir' => $req->tanggal_lahir,
          'ktp'           => $name,
          'unsur_id'      => $req->unsur,
          'user_id'       => $user->id,
          'gampong_id'    => $req->gampong,
          'alamat'        => $req->alamat,
          'no_handphone'  => $req->no_handphone,
      ]);

      return redirect()->route('admin.tambahUmum')->with('success', 'Akun baru berhasil ditambah');
    }


    public function deleteUmum(Request $req)
    {
        $req->validate([
          'check.*' => 'required|integer',
        ]);

        foreach ($req->check as $key => $value) {
          $data = User::findOrFail($value);
          
          try {
            unlink(public_path('/umum/ktp/'.$data->ktp));
          } catch (\Exception $e) {

          }

          $data->delete();
        }

        return redirect()->route('admin.pengguna.umum')
                         ->with('success', count($req->check).' pengguna berhasil dihapus');
    }


   

  


    public function admin(Request $req)

    {   //MENDAPATKAN DATA ADMIN


        $level=2;
        $data = User::where('level',$level);

        if ($req->search) 
        {
          $data = $data->where('nama', 'LIKE' ,'%'.$req->search.'%');
        }

        $data = $data->paginate(20);

        return view('view_admin_pengguna.pengguna_admin')->with('data', $data);
    }



      public function tambahAdministrator()
    {
      return view('view_admin_pengguna.pengguna_admin_add');
    }

    public function simpanAdministrator(Request $req)
    {
      $req->validate([
          'nama'          => ['required', 'string', 'max:190'],
          'nik'           => ['required', 'numeric'],
          'jenis_kelamin' => ['required', 'boolean'],
          'gelar'         => ['required', 'string', 'max:190'],
          'level'         => ['required', 'numeric'],
          'alamat'        => ['required', 'string', 'max:190'],
          'email'         => ['required', 'string', 'max:255', 'unique:users'],
          'password'      => ['required', 'string', 'min:8', 'confirmed'],
      ]);

      //$level

      $user = User::create([
          'email'    => $req->email,
          'password' => Hash::make($req->password),
          'level'    => $req->level,
      ]);

      Administrator::create([
          'nama'          => $req->nama,
          'nik'           => $req->nik,
          'jenis_kelamin' => $req->jenis_kelamin,
          'gelar'         => $req->gelar,
          'user_id'       => $user->id,
          'alamat'        => $req->alamat,
      ]);

      return redirect()->route('admin.tambahAdministrator')->with('success', 'Akun baru berhasil ditambah');
    }

    


    public function deleteAdmin(Request $req)
    {
        $req->validate([
          'check.*' => 'required|integer',
        ]);

        foreach ($req->check as $key => $value) {
          $data = User::findOrFail($value);
          $data->delete();
        }

        return redirect()->route('admin.pengguna.admin')
                         ->with('success', count($req->check).' administrator berhasil dihapus');
    }
}
