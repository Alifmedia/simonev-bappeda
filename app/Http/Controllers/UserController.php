<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Validator;
use Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    //MENAMPILKAN HALAMAN PERUBAHAN USERNAME
    public function ubahEmail()
    {
      return view('auth.ubah_email');
    }




    public function prosesUbahEmail(Request $req)
    {
      $req->validate(['email' => 'required|unique:users,email,'.Auth::id().'id',
      ]);

      $data = User::find(Auth::id());
      $data->email = $req->email;
      $data->save();

      return redirect()->route('user.ubahEmail')
                      ->with('success', 'Email berhasil diubah');

    }




    //MENAMPILKAN HALAMAN PERUBAHAN PASSWORD
    public function ubahPassword()
    {
      return view('auth.ubah_password');
    }




    public function prosesUbahPassword(Request $req)
    {
      $validator = Validator::make($req->all(),[
                                                'password'         => 'required|string|min:8|max:100|confirmed',
                                                'password_current' => 'required|string',
                                                ]
                                  );

      $pass_baru       = $req->password;

      $pass            = $req->password_current;

      //password lama
      $hashedPass      = Auth::user()->password;

      

      $validator->after(function($validator) use($pass, $hashedPass) 
                                                {
                                                 if(!(Hash::check($pass, $hashedPass))) 
                                                 {
                                                  $validator->errors()->add('password_current', 'Your password doesn\'t match your current password');
                                                  }
                                                }
                        );                                       

      if ($validator->fails()) 
      {
          return redirect()->route('user.ubahPassword')->withErrors($validator)->withInput();
      }


      $user           = User::find(Auth::id());
      $user->password = Hash::make($pass_baru);
      $user->save();

      return redirect()->route('user.ubahPassword')->with('success', 'Password berhasil diubah');

    }
}
