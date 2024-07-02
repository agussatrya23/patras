<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use App\Models\MdKlien;
use App\Models\MdPegawai;
use App\Models\Portofolio;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $klien = MdKlien::get();
        $layanan = Layanan::get();
        $portofolio = Portofolio::orderby('id','desc')->take(12)->get();
        return view ('welcome', compact('klien','layanan','portofolio'));
    }

    public function about()
    {
        $pegawai = MdPegawai::with('layanan')->orderby('idlayanan','asc')->orderby('id','asc')->get();
        return view ('about', compact('pegawai'));
    }

    public function services($slug)
    {
        $data = Layanan::with('portofolio')->where('slug',$slug)->first();

        return view ('services', compact('data'));
    }
}
