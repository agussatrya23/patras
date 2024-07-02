<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\MdKelas;
use App\Models\Siswa;
use App\Models\Pegawai;
use App\Models\JadwalPelajaran;
use App\Models\MdJamPelajaran;
use App\Models\TagihanSiswa;
use App\Helper;
use DB;
use PDF;
use auth;
use DataTables;
use DateTime;
use Session;
class HomeController extends Controller
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

  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Contracts\Support\Renderable
  */

  public function sessiontema($id)
  {
    Session::put('tema',$id);
  }

  public function index()
  {
    return view('index');
  }
}
