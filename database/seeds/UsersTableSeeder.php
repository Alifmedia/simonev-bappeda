<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UsersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('users')->insert([
      'email' => 'user',
      'password' => Hash::make('12345678'),
      'level' => 0,
    ]);

    DB::table('users')->insert([
      'email' => 'kecamatan',
      'password' => Hash::make('12345678'),
      'level' => 1,
    ]);

    DB::table('users')->insert([
      'email' => 'operator',
      'password' => Hash::make('12345678'),
      'level' => 2,
    ]);

    DB::table('users')->insert([
      'email' => 'admin',
      'password' => Hash::make('12345678'),
      'level' => 3,
    ]);

    DB::table('umum')->insert([
      'user_id' => 1,
      'unsur_id' => 1,
      'gampong_id' => 1,
      'nama' => 'Mulqan',
      'nik' => '1234567890',
      'jenis_kelamin' => 1,
      'alamat' => 'Jl. qwertyuiop asdfghjkl zxcvbnm',
      'tempat_lahir' => 'qwerty',
      'tanggal_lahir' => '2019-08-30',
      'no_handphone' => '082335883016',
    ]);

    DB::table('umum')->insert([
      'user_id' => 2,
      'unsur_id' => 1,
      'gampong_id' => 1,
      'nama' => 'Kecamatan',
      'nik' => '1234567890',
      'jenis_kelamin' => 1,
      'alamat' => 'Jl. qwertyuiop asdfghjkl zxcvbnm',
      'tempat_lahir' => 'qwerty',
      'tanggal_lahir' => '2019-08-30',
      'no_handphone' => '082335883016',
    ]);

    DB::table('administrator')->insert([
      'user_id' => 3,
      'nama' => 'Adminah',
      'nik' => '1234567890',
      'jenis_kelamin' => 0,
      'gelar' => 'qwerty',
      'alamat' => 'Jl. qwertyuiop asdfghjkl zxcvbnm',
    ]);

    DB::table('administrator')->insert([
      'user_id' => 4,
      'nama' => 'Operatorin',
      'nik' => '1234567890',
      'jenis_kelamin' => 0,
      'gelar' => 'qwerty',
      'alamat' => 'Jl. qwertyuiop asdfghjkl zxcvbnm',
    ]);
  }
}
