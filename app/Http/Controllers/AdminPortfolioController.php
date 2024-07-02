<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use App\Models\Portofolio;
use App\Models\PortofolioGaleri;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AdminPortfolioController extends Controller
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

    public function index()
    {
        return view('admin.portofolio.index');
    }

    public function dt()
    {
        $data = Portofolio::with('layanan')->get();
        return DataTables::of($data)
        ->addColumn('action', function($data) {
            return '
            <a href="'.route('admin.portofolio.detail', $data->id).'" class="btn btn-sm btn-outline-info waves-effect waves-float waves-light"><i
            data-feather="info"></i> Detail
            </a>
          ';
        })
        ->make(true);
    }

    public function create()
    {
        return view('admin.portofolio.create');
    }

    public function store(Request $request)
    {
      try {
        $ceknama = Portofolio::where('nama',$request->nama)->count();
        if($ceknama > 0) {
            return back()->with('notif', json_encode([
                'title' => "PORTOFOLIO",
                'text' => "Gagal menambahkan data".$request->nama.", nama sudah terdaftar",
                'type' => "warning"
            ]));
        }

        $slug = Str::slug($request->nama);

        $cover = '';
        if ($request->file('cover') != null) {
            $cover = $request->file('cover')->store('portofolio-img/'.$slug.'/cover');
        }

        $portofolio = Portofolio::create([
            'idlayanan' => $request->idlayanan,
            'nama' => $request->nama,
            'slug' => $slug,
            'klien' => $request->klien,
            'tanggal' => $request->tanggal,
            'lokasi' => $request->lokasi,
            'link' => $request->link,
            'cover' => $cover,
            'deskripsi' => $request->deskripsi,
            'iduser' => auth()->user()->id
        ]);

        return redirect('admin/portofolio')->with('notif', json_encode([
            'title' => "PORTOFOLIO",
            'text' => "Berhasil menambahkan data portofolio",
            'type' => "success"
        ]));
      } catch (\Throwable $e) {
          return back()->with('notif', json_encode([
              'title' => "PORTOFOLIO",
              'text' => "Gagal menambahkan data portofolio, ".$e->getMessage(),
              'type' => "error"
          ]));
      }
    }

    public function detail($id)
    {
        $data = Portofolio::withcount('galeri')->where('id', $id)->first();
        return view('admin.portofolio.detail', compact('data'));
    }

    public function edit($id)
    {
        $data = Portofolio::where('id', $id)->first();
        $layanan = Layanan::get();
        return view('admin.portofolio.edit', compact('data','layanan'));
    }

    public function update(Request $request)
    {
      try {
        $ceknama = Portofolio::where('nama',$request->nama)->where('id','!=',$request->id)->count();
        if($ceknama > 0) {
            return back()->with('notif', json_encode([
                'title' => "PORTOFOLIO",
                'text' => "Gagal mengubah data".$request->nama.", nama sudah terdaftar",
                'type' => "warning"
            ]));
        }

        $slug = Str::slug($request->nama);

        $cover = Portofolio::where('id',$request->id)->pluck('cover')->first();

        if ($request->file('cover') != null) {
            Storage::delete($cover);
            $cover = $request->file('cover')->store('portofolio-img/'.$slug.'/cover');
        }

        Portofolio::where('id',$request->id)->update([
            'idlayanan' => $request->idlayanan,
            'nama' => $request->nama,
            'slug' => $slug,
            'klien' => $request->klien,
            'tanggal' => $request->tanggal,
            'lokasi' => $request->lokasi,
            'link' => $request->link,
            'cover' => $cover,
            'deskripsi' => $request->deskripsi,
            'iduser' => auth()->user()->id
        ]);

        return redirect('admin/portofolio/detail/'.$request->id)->with('notif', json_encode([
            'title' => "PORTOFOLIO",
            'text' => "Berhasil mengubah data portofolio",
            'type' => "success"
        ]));
      } catch (\Throwable $e) {
          return back()->with('notif', json_encode([
              'title' => "PORTOFOLIO",
              'text' => "Gagal mengubah data portofolio, ".$e->getMessage(),
              'type' => "error"
          ]));
      }
    }

    public function delete(Request $request)
    {
        try {
            $cover = Portofolio::where('id',$request->id)->pluck('cover')->first();
            Storage::delete($cover);
            Portofolio::where('id', $request->id)->delete();
            $gambar_lama = PortofolioGaleri::where('idportofolio', $request->id)->get();
            foreach ($gambar_lama as $key => $value) {
                if (Storage::exists($value->file)) {
                    Storage::delete($value->file);
                }
            }

            PortofolioGaleri::where('id', $request->id)->delete();

            return redirect('admin/portofolio')->with('notif', json_encode([
                'title' => "PORTOFOLIO",
                'text' => "Berhasil menghapus data portofolio.",
                'type' => "success"
            ]));
        } catch (\Throwable $e) {
            return back()->with('notif', json_encode([
                'title' => "PORTOFOLIO",
                'text' => "Gagal menghapus data portofolio.".$e->getMessage(),
                'type' => "error"
            ]));
        }
    }


    public function storegaleri(Request $request)
    {
        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $key => $arr_gambar) {
                $allowed = array('png', 'jpg', 'jpeg');
                if (!in_array($arr_gambar->extension(), $allowed)) {
                  return back()->with('notif', json_encode([
                    'title' => "PORTOFOLIO GALERI",
                    'text' => "Gagal menambah foto, format gambar tidak diizinkan.",
                    'type' => "error"
                  ]));
                }
            }
        }

        try {

            if($request->hasFile('gambar')) {
                foreach($request->file('gambar') as $key => $arr_gambar){
                    $gambar = $arr_gambar->store('portofolio-img/'.$request->slug.'/galeri');
                    PortofolioGaleri::create([
                        'idportofolio' => $request->idportofolio,
                        'file' => $gambar,
                        'caption' => $request->caption,
                        'iduser' => auth()->user()->id
                    ]);
                }
            }

            return back()->with('notif', json_encode([
                'title' => "PORTOFOLIO GALERI",
                'text' => "Berhasil menambahkan foto.",
                'type' => "success"
            ]));
        } catch (\Exception $e) {
            return back()->with('notif', json_encode([
                'title' => "PORTOFOLIO GALERI",
                'text' => "Gagal menambahkan foto, ". $e->getMessage(),
                'type' => "error"
            ]));
        }
    }

    public function deletegaleri(Request $request)
    {
        try {
            Storage::delete($request->file);
            PortofolioGaleri::where('id', $request->id)->delete();
            return back()->with('notif', json_encode([
                'title' => "PORTOFOLIO GALERI",
                'text' => "Berhasil menghapus foto.",
                'type' => "success"
            ]));
        } catch (\Throwable $e) {
            return back()->with('notif', json_encode([
                'title' => "PORTOFOLIO GALERI",
                'text' => "Gagal menghapus foto.".$e->getMessage(),
                'type' => "error"
            ]));
        }
    }

    public function get($id)
    {
        $data = PortofolioGaleri::where('id', $id)->first();
        return $data;
    }

    public function updatecaption(Request $request)
    {
        try {
            PortofolioGaleri::where('id',$request->id)->update([
                'caption' => $request->caption,
                'iduser' => auth()->user()->id
            ]);
            return back()->with('notif', json_encode([
                'title' => "PORTOFOLIO GALERI",
                'text' => "Berhasil mengubah caption foto.",
                'type' => "success"
            ]));
        } catch (\Throwable $e) {
            return back()->with('notif', json_encode([
                'title' => "PORTOFOLIO GALERI",
                'text' => "Gagal mengubah caption foto.".$e->getMessage(),
                'type' => "error"
            ]));
        }
    }
}
