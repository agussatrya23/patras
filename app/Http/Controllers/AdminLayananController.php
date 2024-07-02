<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminLayananController extends Controller
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
        return view('admin.layanan.index');
    }

    public function dt()
    {
        $data = Layanan::get();
        return DataTables::of($data)
        ->addColumn('action', function($data) {
            return '
            <a href="'.route('md.layanan.edit',$data->id).'" class="btn btn-sm btn-outline-warning waves-effect waves-float waves-light"><i
            data-feather="edit"></i> Ubah
            </a>
          ';
        })
        ->make(true);
    }

    public function create()
    {
        return view('admin.layanan.create');
    }

    public function store(Request $request)
    {
      try {
        $ceknama = Layanan::where('nama',$request->nama)->count();
        if($ceknama > 0) {
            return back()->with('notif', json_encode([
                'title' => "LAYANAN",
                'text' => "Gagal menambahkan data".$request->nama.", nama sudah terdaftar",
                'type' => "warning"
            ]));
        }

        $slug = Str::slug($request->nama);

        $cover = '';
        if ($request->file('coverimg') != null) {
            $cover = $request->file('coverimg')->store('layanan-img/'.$slug.'/cover');
        }

        $desc = '';
        if ($request->file('descimg') != null) {
            $desc = $request->file('descimg')->store('layanan-img/'.$slug.'/desc');
        }

        Layanan::create([
            'nama' => $request->nama,
            'slug' => $slug,
            'namabrand' => $request->namabrand,
            'cp' => $request->cp,
            'sosmed' => $request->sosmed,
            'deskripsi' => $request->deskripsi,
            'coverimg' => $cover,
            'descimg'=> $desc,
            'iduser' => auth()->user()->id
        ]);

        return redirect('admin/masterdata/layanan')->with('notif', json_encode([
            'title' => "LAYANAN",
            'text' => "Berhasil menambahkan data layanan",
            'type' => "success"
        ]));
      } catch (\Throwable $e) {
          return back()->with('notif', json_encode([
              'title' => "LAYANAN",
              'text' => "Gagal menambahkan data layanan, ".$e->getMessage(),
              'type' => "error"
          ]));
      }
    }

    public function edit($id)
    {
        $data = Layanan::where('id',$id)->first();
        return view('admin.layanan.edit', compact('data'));
    }

    public function update(Request $request)
    {
        try {
            $ceknama = Layanan::where('nama', $request->nama)->where('id', '!=', $request->id)->count();
            if($ceknama > 0) {
                return back()->with('notif', json_encode([
                    'title' => "LAYANAN",
                    'text' => "Gagal mengubah data".$request->nama.", nama sudah terdaftar",
                    'type' => "warning"
                ]));
            }

            $slug = Str::slug($request->nama);
            
            $gbr = Layanan::where('id',$request->id)->first();

            if ($request->file('coverimg') != null) {
                Storage::delete($gbr->coverimg);
                $cover = $request->file('coverimg')->store('layanan-img/'.$slug.'/cover');
            }

            if ($request->file('descimg') != null) {
                Storage::delete($gbr->descimg);
                $desc = $request->file('descimg')->store('layanan-img/'.$slug.'/desc');
            }

            Layanan::where('id',$request->id)->update([
                'nama' => $request->nama,
                'slug' => $slug,
                'namabrand' => $request->namabrand,
                'cp' => $request->cp,
                'sosmed' => $request->sosmed,
                'deskripsi' => $request->deskripsi,
                'coverimg' => $cover,
                'descimg'=> $desc,
                'iduser' => auth()->user()->id
            ]);

            return redirect('admin/masterdata/layanan')->with('notif', json_encode([
                'title' => "LAYANAN",
                'text' => "Berhasil mengubah data layanan.",
                'type' => "success"
            ]));
        } catch (\Exception $e) {
            return back()->with('notif', json_encode([
                'title' => "LAYANAN",
                'text' => "Gagal mengubah data layanan, ". $e->getMessage(),
                'type' => "error"
            ]));
        }
    }

}
