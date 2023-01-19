<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Kemukiman;
use App\Models\Gampong;
use App\Models\Dusun;


use App\Models\KelompokBelanja;
use App\Models\JenisBelanja;
use App\Models\ObjekBelanja;
use App\Models\RinobBelanja;
use App\Models\SubrinobBelanja;

class AjaxController extends Controller
{
    public function getData(Request $req)
    {
        $db = $req->db;
        switch ($db) 
        {
          case 'kecamatan':
            $data = Kecamatan::where('kabupaten_id', $req->fk)->get();
            break;
          case 'kemukiman':
            $data = Kemukiman::where('kecamatan_id', $req->fk)->get();
            break;
          case 'gampong':
            $data = Gampong::where('kemukiman_id', $req->fk)->get();
            break;
          case 'dusun':
            $data = Dusun::where('gampong_id', $req->fk)->get();
            break;

          default:
            $data = null;
            break;
        }

        return $data;
    }


     public function getDataBelanja(Request $req)
    {
        $db = $req->db;
        switch ($db) 
        {
          case 'jenis':
            $data_belanja = JenisBelanja::where('kelompok_id', $req->fk)->get();
            break;
          case 'objek':
            $data_belanja = ObjekBelanja::where('jenis_id', $req->fk)->get();
            break;
          case 'rinob':
            $data_belanja = RinobBelanja::where('objek_id', $req->fk)->get();
            break;
          case 'subrinob':
            $data_belanja = SubrinobBelanja::where('rinob_id', $req->fk)->get();
            break;

          default:
            $data_belanja = null;
            break;
        }

        return $data_belanja;
    }


}
