<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Umum;
use App\Models\Administrator;
use App\Models\Unsur;
use App\Models\Kabupaten;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('level:superadmin');
    }

   
    public function tambahAdministrator()
    {
      return view('view_admin_pengguna.pengguna_admin_add');
    }

    public function simpanAdministrator(Request $req)
    {
      $req->validate([
          'nama' => ['required', 'string', 'max:190'],
          'nik' => ['required', 'numeric'],
          'jenis_kelamin' => ['required', 'boolean'],
          'gelar' => ['required', 'string', 'max:190'],
          'level' => ['required', 'numeric'],
          'alamat' => ['required', 'string', 'max:190'],
          'email' => ['required', 'string', 'max:255', 'unique:users'],
          'password' => ['required', 'string', 'min:8', 'confirmed'],
      ]);

      $user = User::create([
          'email' => $req->email,
          'password' => Hash::make($req->password),
          'level' => $req->level,
      ]);

      Administrator::create([
          'nama' => $req->nama,
          'nik' => $req->nik,
          'jenis_kelamin' => $req->jenis_kelamin,
          'gelar' => $req->gelar,
          'user_id' => $user->id,
          'alamat' => $req->alamat,
      ]);

      return redirect()->route('admin.tambahAdministrator')->with('success', 'Akun baru berhasil ditambah');
    }

    public function tambahUmum()
    {
      $unsur = Unsur::all();
      $alamat['kabupaten'] = Kabupaten::all();

      return view('view_admin_pengguna.pengguna_umum_add')->with('unsur', $unsur)->with('alamat', $alamat);
    }

    public function simpanUmum(Request $req)
    {
      $req->validate([
        'nama' => ['required', 'string', 'max:190'],
        'nik' => ['required', 'numeric'],
        'jenis_kelamin' => ['required', 'boolean'],
        'tempat_lahir' => ['required', 'string', 'max:190'],
        'tanggal_lahir' => ['required', 'date'],
        'ktp' => ['required', 'image'],
        'unsur' => ['required', 'integer'],
        'gampong' => ['required', 'integer'],
        'alamat' => ['required', 'string', 'max:190'],
        'no_handphone' => ['required', 'numeric'],
        'email' => ['required', 'string', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'operator_kecamatan' => 'nullable|integer',
      ]);

      $user = User::create([
          'email' => $req->email,
          'password' => Hash::make($req->password),
          'level' => $req->operator_kecamatan ? 1 : 0,
      ]);

      $file = $req->ktp;
      $name = time().uniqid().'.'.$file->getClientOriginalExtension();
      $file->move(public_path()."/umum/ktp/", $name);

      Umum::create([
          'nama' => $req->nama,
          'nik' => $req->nik,
          'jenis_kelamin' => $req->jenis_kelamin,
          'tempat_lahir' => $req->tempat_lahir,
          'tanggal_lahir' => $req->tanggal_lahir,
          'ktp' => $name,
          'unsur_id' => $req->unsur,
          'user_id' => $user->id,
          'gampong_id' => $req->gampong,
          'alamat' => $req->alamat,
          'no_handphone' => $req->no_handphone,
      ]);

      return redirect()->route('admin.tambahUmum')->with('success', 'Akun baru berhasil ditambah');
    }
}
