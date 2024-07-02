<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use App\Models\MdKlien;
use App\Models\MdPegawai;
use Illuminate\Http\Request;

class Select2Controller extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function layanan(Request $request)
    {
      $term = trim($request->q);
      $datas = Layanan::when(!empty($term), function ($query) use ($term) {
            return $query->where('nama', 'LIKE', '%'. $term .'%');
        })->get();
      $ta  = array();
      foreach ($datas as $data) {
          $ta[] = ['id' => $data->id, 'text' => $data->nama];
      }
      return response()->json($ta);
    }

    public function klien(Request $request)
    {
      $term = trim($request->q);
      $datas = MdKlien::when(!empty($term), function ($query) use ($term) {
            return $query->where('nama', 'LIKE', '%'. $term .'%');
        })->get();
      $ta  = array();
      foreach ($datas as $data) {
          $ta[] = ['id' => $data->id, 'text' => $data->nama];
      }
      return response()->json($ta);
    }

    public function pegawai(Request $request)
    {
      $term = trim($request->q);
      $datas = MdPegawai::when(!empty($term), function ($query) use ($term) {
            return $query->where('nama', 'LIKE', '%'. $term .'%');
        })->get();
      $ta  = array();
      foreach ($datas as $data) {
          $ta[] = ['id' => $data->id, 'text' => $data->nama];
      }
      return response()->json($ta);
    }
}
