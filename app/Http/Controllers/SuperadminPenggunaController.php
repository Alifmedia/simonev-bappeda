<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Umum;
use App\Models\UmumSektoral;
use App\Models\Unsur;
use App\Models\Sektoral;
use App\Models\Hal;
use App\Models\Administrator;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kemukiman;
use App\Models\Gampong;



class SuperadminPenggunaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('level:superadmin');

    }







    public function umum(Request $req)
    {
        $filter['sektoral'] = Sektoral::all();

        //$level=1;
        //$data = User::where('level', $level)->get();

        $data = UmumSektoral::whereHas('umum.user', function($q)
                                                {
                                                  $q->where('level',0);
                                                }
                                  )->get();
                                           
      //dd($data);                   
                          


        // if ($req->search) 
        // {
        //   $data = $data->where('Nama', 'LIKE' ,'%'.$req->search.'%');
        // }


        if ($req->sektoral) 
         {
           $data = $data->where('id', $req->sektoral);
                                                   
         }


        //  if ($req->hal) 
        // {
        //   $data = $data->whereHas('umum.hal', function($q)use($req)
        //                                   {
        //                                     $q->where('hal_id', $req->hal);
        //                                   }
        //                           );
        // }

        //  if ($req->unsur) 
        // {
        //   $data = $data->whereHas('umum.unsur', function($q)use($req)
        //                                   {
        //                                     $q->where('unsur_id', $req->unsur);
        //                                   }
        //                           );
        // }

        // if ($req->kabupaten) 
        // {
        //   $data = $data->whereHas('umum.kecamatan.kabupaten', 
        //                            function($q)use($req)
        //                             {
        //                               $q->where('id', $req->kabupaten);
        //                             }
        //                           );
        // }

        // $data = $data->paginate(20);

        return view('view_superadmin_pengguna.pengguna_umum')->with('filter', $filter)
                                                        ->with('data', $data);
                                                    
    }





    public function tambahUmum()
    {
      $unsur               = Unsur::all();
      $hal                 = Hal::all();
      $sektoral            = Sektoral::all();
      $alamat['kabupaten'] = Kabupaten::all();

      return view('view_superadmin_pengguna.pengguna_umum_add')
           ->with('unsur', $unsur)
           ->with('hal', $hal)
           ->with('sektoral', $sektoral)
           ->with('alamat', $alamat);
    }



     public function simpanUmum(Request $req)
    {
      $req->validate(
        [
        
        'nik'               => ['required', 'numeric'],
        'nama'              => ['required', 'string', 'max:190'],
        'tempat_lahir'      => ['required', 'string', 'max:190'],
        'tanggal_lahir'     => ['required', 'date'],
       // 'ktp'               => ['required', 'image'],
        'unsur'             => ['required', 'integer'],
        'hal'               => ['required', 'integer'],
        'sektoral'           => ['required', 'integer'],
        'alamat'            => ['required', 'string', 'max:190'],
        'no_handphone'      => ['required', 'numeric'],
        'email'             => ['required', 'string', 'max:255', 'unique:users'],
        'password'          => ['required', 'string', 'min:8', 'confirmed'],
       // 'operator_kecamatan'=>  'nullable | integer',
        ]
       );

      $level=0;

      $user = User::create([
                              'email'    => $req->email,
                              'password' => Hash::make($req->password),
                              'level'    => $level,
                          ]);

      //$file = $req->ktp;
      //$name = time().uniqid().'.'.$file->getClientOriginalExtension();
      //$file->move(public_path()."/umum/ktp/", $name);

      Umum::create([
                    'NIK'           => $req->nik,
                    'Nama'          => $req->nama,
                  //'jenis_kelamin' => $req->jenis_kelamin,
                    'Tempat_Lahir'  => $req->tempat_lahir,
                    'Tanggal_Lahir' => $req->tanggal_lahir,
                  //'ktp'           => $name,
                    'unsur_id'      => $req->unsur,
                    'sektoral_id'   => $req->sektoral,
                    'hal_id'        => $req->hal,
                    'user_id'       => $user->id,
                //  'gampong_id'    => $req->gampong,
                    'Alamat'        => $req->alamat,
                    'No_Handphone'  => $req->no_handphone,
                  ]);

      return redirect()->route('superadmin.tambahUmum')->with('success', 'Akun baru berhasil ditambah');
    }





    public function deleteUmum(Request $req)
    {
       //  $req->validate(['check.*' => 'required|integer']);

       //   //$check = $req->check ? $req->check : [];



       //  foreach ($req->check as $key => $value) 
       //  {
       //    $data = User::findOrFail($value);
          
       //    try 
       //    {
       //      unlink(public_path('/umum/ktp/'.$data->umum->No_KTP));
       //    } 
       //    catch (\Exception $e)
       //    {

       //    }

       //    $data->delete();
       //  }

       //  return redirect()->route('admin.pengguna.umum')
       //                   ->with('success', count($req->check).' pengguna berhasil dihapus');
       // }



    //    public function delete(Request $req)
    // {
      $req->validate(['check.*' => 'required|integer',]);

      $check = $req->check ? $req->check : [];
      

      $data = User::with('umum')->whereIn('id', $check);

      $user = $data->get();


      foreach ($user as $key => $value) 
      {
        if ($value->umum) 
        {
          foreach ($value->umum as $i => $umum) 
          {
            try 
            {
              unlink(public_path('uploads/'.$umum->No_KTP));
            } 
            catch (\Exception $e) 
            {

            }
          }
        }
      }

      $data->delete();

      return redirect()->route('superadmin.pengguna.umum')
                       ->with('success', count($req->check).' pengguna karyawan berhasil dihapus');
    }





     public function supervisor(Request $req)
    {
        $filter['sektoral'] = Sektoral::all();

        //$level=1;
        //$data = User::where('level', $level)->get();

        $data = UmumSektoral::whereHas('umum.user', function($q)
                                                {
                                                  $q->where('level',2);
                                                }
                                  )->get();
                                           
      //dd($data);                   
                          


        // if ($req->search) 
        // {
        //   $data = $data->where('Nama', 'LIKE' ,'%'.$req->search.'%');
        // }


        if ($req->sektoral) 
         {
           $data = $data->where('id', $req->sektoral);
                                                   
         }


        //  if ($req->hal) 
        // {
        //   $data = $data->whereHas('umum.hal', function($q)use($req)
        //                                   {
        //                                     $q->where('hal_id', $req->hal);
        //                                   }
        //                           );
        // }

        //  if ($req->unsur) 
        // {
        //   $data = $data->whereHas('umum.unsur', function($q)use($req)
        //                                   {
        //                                     $q->where('unsur_id', $req->unsur);
        //                                   }
        //                           );
        // }

        // if ($req->kabupaten) 
        // {
        //   $data = $data->whereHas('umum.kecamatan.kabupaten', 
        //                            function($q)use($req)
        //                             {
        //                               $q->where('id', $req->kabupaten);
        //                             }
        //                           );
        // }

        // $data = $data->paginate(20);

        return view('view_superadmin_pengguna.pengguna_supervisor')->with('filter', $filter)
                                                        ->with('data', $data);
                                                    
    }





    public function tambahSupervisor()
    {
      $unsur               = Unsur::all();
      $hal                 = Hal::all();
      $sektoral            = Sektoral::all();
      $alamat['kabupaten'] = Kabupaten::all();

      return view('view_admin_pengguna.pengguna_supervisor_add')
           ->with('unsur', $unsur)
           ->with('hal', $hal)
           ->with('sektoral', $sektoral)
           ->with('alamat', $alamat);
    }



     public function simpanSupervisor(Request $req)
    {
      $req->validate(
        [
        
        'nik'               => ['required', 'numeric'],
        'nama'              => ['required', 'string', 'max:190'],
        'tempat_lahir'      => ['required', 'string', 'max:190'],
        'tanggal_lahir'     => ['required', 'date'],
       // 'ktp'               => ['required', 'image'],
        'unsur'             => ['required', 'integer'],
        'hal'               => ['required', 'integer'],
        'sektoral'           => ['required', 'integer'],
        'alamat'            => ['required', 'string', 'max:190'],
        'no_handphone'      => ['required', 'numeric'],
        'email'             => ['required', 'string', 'max:255', 'unique:users'],
        'password'          => ['required', 'string', 'min:8', 'confirmed'],
       // 'operator_kecamatan'=>  'nullable | integer',
        ]
       );

      $level=2;

      $user = User::create([
                              'email'    => $req->email,
                              'password' => Hash::make($req->password),
                              'level'    => $level,
                          ]);

      //$file = $req->ktp;
      //$name = time().uniqid().'.'.$file->getClientOriginalExtension();
      //$file->move(public_path()."/umum/ktp/", $name);

      Umum::create([
                    'NIK'           => $req->nik,
                    'Nama'          => $req->nama,
                  //'jenis_kelamin' => $req->jenis_kelamin,
                    'Tempat_Lahir'  => $req->tempat_lahir,
                    'Tanggal_Lahir' => $req->tanggal_lahir,
                  //'ktp'           => $name,
                    'unsur_id'      => $req->unsur,
                    'sektoral_id'   => $req->sektoral,
                    'hal_id'        => $req->hal,
                    'user_id'       => $user->id,
                //  'gampong_id'    => $req->gampong,
                    'Alamat'        => $req->alamat,
                    'No_Handphone'  => $req->no_handphone,
                  ]);

      return redirect()->route('superadmin.tambahSupervisor')->with('success', 'Akun Supervisor baru berhasil ditambah');
    }





    public function deleteSupervisor(Request $req)
    {
       //  $req->validate(['check.*' => 'required|integer']);

       //   //$check = $req->check ? $req->check : [];



       //  foreach ($req->check as $key => $value) 
       //  {
       //    $data = User::findOrFail($value);
          
       //    try 
       //    {
       //      unlink(public_path('/umum/ktp/'.$data->umum->No_KTP));
       //    } 
       //    catch (\Exception $e)
       //    {

       //    }

       //    $data->delete();
       //  }

       //  return redirect()->route('admin.pengguna.umum')
       //                   ->with('success', count($req->check).' pengguna berhasil dihapus');
       // }



    //    public function delete(Request $req)
    // {
      $req->validate(['check.*' => 'required|integer',]);

      $check = $req->check ? $req->check : [];
      

      $data = User::with('umum')->whereIn('id', $check);

      $user = $data->get();


      foreach ($user as $key => $value) 
      {
        if ($value->umum) 
        {
          foreach ($value->umum as $i => $umum) 
          {
            try 
            {
              unlink(public_path('uploads/'.$umum->No_KTP));
            } 
            catch (\Exception $e) 
            {

            }
          }
        }
      }

      $data->delete();

      return redirect()->route('superadmin.pengguna.supervisor')
                       ->with('success', count($req->check).' pengguna supervisor berhasil dihapus');
    }


   

  







    public function administrator(Request $req)

    {   //MENDAPATKAN DATA ADMIN

        $unsur               = Unsur::all();
        $sektoral            = Sektoral::all();
        $hal                 = Hal::all();
        //$alamat['kabupaten'] = Kabupaten::all();
       // $alamat['kabupaten'] = Kabupaten::all();
        //$alamat['kabupaten'] = Kabupaten::all();


      //  $level=3;

        $data = UmumSektoral::whereHas('umum.user', function($q)
                                                {
                                                  $q->where('level',3);
                                                }
                                  )->get();



       //dd($data);

        if ($req->search) 
        {
          $data = $data->where('nama', 'LIKE' ,'%'.$req->search.'%');
        }

        //$data = $data->paginate(20);

        return view('view_superadmin_pengguna.pengguna_administrator')->with('data',$data)
                                                              ->with('unsur',$unsur)
                                                              ->with('hal',$hal)
                                                              ->with('sektoral',$sektoral);
                                                       
    }



    public function tambahAdministrator()
    {

        $unsur               = Unsur::all();
        $sektoral            = Sektoral::all();
        $hal                 = Hal::all();
        //$alamat['kabupaten'] = Kabupaten::all();
       // $alamat['kabupaten'] = Kabupaten::all();
        //$alamat['kabupaten'] = Kabupaten::all();

      return view('view_superadmin_pengguna.pengguna_administrator_add')->with('unsur', $unsur)
                                                         ->with('hal', $hal)
                                                         ->with('sektoral',$sektoral);
    }


    


    public function simpanAdministrator(Request $req)
    {


     //dd($req);

      $req->validate([

          'email'         => ['required', 'string','max:255','unique:users'],
          'password'      => ['required', 'string','min:8','confirmed'],
        
          'unsur'         => ['required', 'integer'], 
          'sektoral'      => ['required', 'integer'], 
          'hal'           => ['required', 'integer'], 
          'nik'           => ['required', 'numeric'],
          'nama'          => ['required', 'string','max:190'],
          'tempat_lahir'  => ['required', 'string'], 
          'tanggal_lahir' => ['required', 'date'], 
          'nostr'         => ['required', 'string','max:190']
       
         
      ]);


     
       $level=2;

      $user = User::create([
                              'email'    => $req->email,
                              'password' => Hash::make($req->password),
                              'level'    => $level
                          ]);
      $umum = Umum::create([
                                'user_id'       => $user->id,
                                'unsur_id'      => $req->unsur,
                                'hal_id'        => $req->hal,
                                'sektoral_id'   => $req->sektoral,
                                'NIK'           => $req->nik,
                                'Nama'          => $req->nama,
                                'Tempat_Lahir'  => $req->tempat_lahir,
                                'Tanggal_Lahir' => $req->tanggal_lahir
                            ]);

      Administrator::create([
                                'umum_id'       => $umum->id,
                                'No_STR'        => $req->nostr
                               
                            ]);

      return redirect()->route('superadmin.tambahAdministrator')->with('success', 'Akun baru berhasil ditambah');
    }

    


    public function deleteAdmin(Request $req)
    {
        $req->validate([
                          'check.*' => 'required|integer',
                        ]);

        foreach ($req->check as $key => $value) 
        {
          $data = User::findOrFail($value);
          $data->delete();
        }

        return redirect()->route('superadmin.pengguna.administrator')
                         ->with('success', 
                           count($req->check).' administrator berhasil dihapus');
    }



}
