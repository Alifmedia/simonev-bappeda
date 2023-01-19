<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Unsur;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kemukiman;
use App\Models\Gampong;
use App\Models\Umum;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Validator;

use Illuminate\Foundation\Auth\RegistersUsers;



class RegisterController extends Controller
{
    
    use RegistersUsers;

    
    protected $redirectTo = '/home';

    
    public function __construct()
    {
        $this->middleware('guest');
    }

    
     public function showRegistrationForm()
    {
        $unsur               = Unsur::all();
        $alamat['kabupaten'] = Kabupaten::all();

        return view('auth.register')->with('unsur', $unsur)
                                    ->with('alamat', $alamat);
    }





    protected function validator(array $data)
    {
        return Validator::make($data, 
                               [
                                'nama'          =>['required','string','max:190'],
                                'nik'           =>['required','numeric'         ],
                                'jenis_kelamin' =>['required','boolean'         ],
                                'alamat'        =>['required','string','max:190'],
                                'tempat_lahir'  =>['required','string','max:190'],
                                'tanggal_lahir' =>['required','date'            ],
                                'no_handphone'  =>['required','numeric'         ],
                                'ktp'           =>['required','image'           ],
                                'unsur'         =>['required','integer'         ],
                                'gampong'       =>['required','integer'         ],
                               
                                'email'         =>['required','string','max:255','unique:users'],
                                'password'      =>['required', 'string', 'min:8', 'confirmed'],
                            ]);
    }

    

    //METODE CREATE ATAU REGISTER
    protected function create(array $data)
    {  
        

        $data_masuk=$data->all();
        dd($data_masuk);


        $level=1;

        //MENYIMPAN DATA KE TABEL USER dan Variabel user akan di return
        $user = User::create([
                                'email'=>$data['email'],
                                'password'=>Hash::make($data['password']),
                                'level'=>$level,
                             ]);

        
        //MENANGKAP DATA FILE
        $file = $data['ktp'];

        //MEMBUAT FORMULA NAMA FILE
        $name = time().uniqid().'.'.$file->getClientOriginalExtension();
       
        //MENYIMPAN FILE DI DIREKTORI /UMUM/KTP DENGAN NAMA FILE YANG UNIK
        $file->move(public_path()."/umum/ktp/", $name);

        
        //MENYIMPAN DATA KE TABEL UMUM
        Umum::create([
                        'nama'=>$data['nama'],
                        'nik'=>$data['nik'],
                        'jenis_kelamin'=>$data['jenis_kelamin'],
                        'alamat'=> $data['alamat'],
                        'tempat_lahir'=>$data['tempat_lahir'],
                        'tanggal_lahir'=>$data['tanggal_lahir'],
                        'no_handphone'=>$data['no_handphone'],
                        //DATA DARI NAME DIATAS
                        'ktp'=>$name,
                        'unsur_id'=>$data['unsur'],
                        'gampong_id'=>$data['gampong'],
                        //DATA DARI USER DIATAS 
                        'user_id'=>$user->id,
                                               
                    ]);

        return $user;
    }




   
}
