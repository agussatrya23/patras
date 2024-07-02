<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use App\Models\MdPegawai;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class AdminPegawaiController extends Controller
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
        return view('admin.pegawai.index');
    }

    public function create()
    {
        return view('admin.pegawai.create');
    }

    public function dt()
    {
        $data = MdPegawai::with('layanan')->get();
        return DataTables::of($data)
        ->addColumn('action', function($data) {
            return '
            <a href="'.route('md.pegawai.edit', $data->id).'" class="btn btn-sm btn-outline-warning waves-effect waves-float waves-light"><i
            data-feather="edit"></i> Ubah
            </a>
          ';
        })
        ->make(true);
    }

    public function store(Request $request)
    {
      try {
        $ceknama = MdPegawai::where('nama',$request->nama)->count();
        if($ceknama > 0) {
            return back()->with('notif', json_encode([
                'title' => "PEGAWAI",
                'text' => "Gagal menambahkan data".$request->nama.", nama sudah terdaftar",
                'type' => "warning"
            ]));
        }

        $foto = '';
        if ($request->file('foto') != null) {
            $foto = $request->file('foto')->store('pegawai-img');
        }

        MdPegawai::create([
            'nama' => $request->nama,
            'panggilan' => $request->panggilan,
            'idlayanan' => $request->idlayanan,
            'email' => $request->email,
            'foto' => $foto
        ]);

        return redirect('admin/masterdata/pegawai')->with('notif', json_encode([
            'title' => "PEGAWAI",
            'text' => "Berhasil menambahkan data pegawai",
            'type' => "success"
        ]));
      } catch (\Throwable $e) {
          return back()->with('notif', json_encode([
              'title' => "PEGAWAI",
              'text' => "Gagal menambahkan data pegawai, ".$e->getMessage(),
              'type' => "error"
          ]));
      }
    }

    public function edit($id)
    {
        $data = MdPegawai::where('id', $id)->first();
        $layanan = Layanan::get();
        return view('admin.pegawai.edit', compact('data','layanan'));
    }

    public function update(Request $request)
    {
      try {
        $ceknama = MdPegawai::where('nama',$request->nama)->where('id','!=',$request->id)->count();
        if($ceknama > 0) {
            return back()->with('notif', json_encode([
                'title' => "PEGAWAI",
                'text' => "Gagal mengubah data".$request->nama.", nama sudah terdaftar",
                'type' => "warning"
            ]));
        }

        $foto = MdPegawai::where('id',$request->id)->pluck('foto')->first();

        if ($request->file('foto') != null) {
            Storage::delete($foto);
            $foto = $request->file('foto')->store('pegawai-img');
        }

        MdPegawai::where('id',$request->id)->update([
            'nama' => $request->nama,
            'panggilan' => $request->panggilan,
            'idlayanan' => $request->idlayanan,
            'email' => $request->email,
            'foto' => $foto
        ]);

        return redirect('admin/masterdata/pegawai')->with('notif', json_encode([
            'title' => "PEGAWAI",
            'text' => "Berhasil mengubah data pegawai",
            'type' => "success"
        ]));
      } catch (\Throwable $e) {
          return back()->with('notif', json_encode([
              'title' => "PEGAWAI",
              'text' => "Gagal mengubah data pegawai, ".$e->getMessage(),
              'type' => "error"
          ]));
      }
    }
    


}
