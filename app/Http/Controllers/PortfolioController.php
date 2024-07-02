<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use App\Models\Portofolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index( Request $request)
    {
        if ($request->layanan != 'semua'){
            $idlayanan = Layanan::where('nama', $request->layanan)->first();
        } else {
            $idlayanan = null;
        }
        $portofolio = Portofolio::when(!empty($idlayanan), function ($query) use ($idlayanan) {
            return $query->where('idlayanan', $idlayanan->id);
        })->paginate(9);
        $layanan  = Layanan::get();
        return view ('portfolio.index', compact('portofolio','layanan'));
    }

    public function detail($slug)
    {
        $data = Portofolio::with('galeri')->where('slug',$slug)->first();
        return view ('portfolio.detail', compact('data'));
    }
}
