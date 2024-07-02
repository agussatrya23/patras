<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Layanan;
use App\Models\MdKlien;
use App\Models\MdPegawai;
use App\Models\Project;
use App\Models\ProjectBayar;
use App\Models\ProjectPegawai;
use App\Models\ProjectPengeluaran;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdminProjectController extends Controller
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
        return view('admin.project.index');
    }

    public function dt($idlayanan = null)
    {
        $data = Project::with('layanan','klien')
        ->when(!empty($idlayanan), function ($query) use ($idlayanan) {
            return $query->where('idlayanan',$idlayanan);
        })->get();
        return DataTables::of($data)
        ->addColumn('harga', function ($data) {
            return 'Rp. '.number_format($data->harga,0,'.','.') ;
        })
        ->addColumn('action', function($data) {
            return '
            <a href="'.route('admin.project.detail', $data->id).'" class="btn btn-sm btn-outline-info waves-effect waves-float waves-light"><i
            data-feather="info"></i> Detail
            </a>
          ';
        })
        ->make(true);
    }

    public function create()
    {
        return view('admin.project.create');
    }

    public function store(Request $request)
    {
      try {
        $project = Project::create([
            'idlayanan' => $request->idlayanan,
            'nama' => $request->nama,
            'idklien' => $request->idklien,
            'harga' => preg_replace('/\D/', '',$request->harga),
            'tglawal' => $request->tglawal,
            'tglakhir' => $request->tglakhir,
            'iduser' => auth()->user()->id
        ]);

        foreach ($request->idpegawai as $idpegawai) {
            ProjectPegawai::create([
                'idproject' => $project->id,
                'idpegawai' => $idpegawai,
                'iduser' => auth()->user()->id
            ]);
        }

        return redirect('admin/project')->with('notif', json_encode([
            'title' => "PROJECT",
            'text' => "Berhasil menambahkan data project",
            'type' => "success"
        ]));
      } catch (\Throwable $e) {
          return back()->with('notif', json_encode([
              'title' => "PROJECT",
              'text' => "Gagal menambahkan data project, ".$e->getMessage(),
              'type' => "error"
          ]));
      }
    }

    public function detail($id)
    {
        $data = Project::with('layanan','tim.pegawai')->where('id',$id)->first();
        return view('admin.project.detail', compact('data'));
    }

    public function edit($id)
    {
        $data = Project::with('layanan','tim.pegawai')->where('id',$id)->first();
        foreach ($data->tim as $p){
            $tim[] = $p->idpegawai;
        }
        $pegawai = MdPegawai::get();
        $layanan = Layanan::get();
        $klien = MdKlien::get();
        return view('admin.project.edit', compact('data','pegawai','tim','layanan','klien'));
    }

    public function update(Request $request)
    {
      try {
        $project = Project::where('id',$request->id)->update([
            'idlayanan' => $request->idlayanan,
            'nama' => $request->nama,
            'idklien' => $request->idklien,
            'harga' => preg_replace('/\D/', '',$request->harga),
            'tglawal' => $request->tglawal,
            'tglakhir' => $request->tglakhir,
            'iduser' => auth()->user()->id
        ]);

        ProjectPegawai::where('idproject',$request->id)->delete();

        foreach ($request->idpegawai as $idpegawai) {
            ProjectPegawai::create([
                'idproject' => $request->id,
                'idpegawai' => $idpegawai,
                'iduser' => auth()->user()->id
            ]);
        }

        return redirect('admin/project/detail/'.$request->id)->with('notif', json_encode([
            'title' => "PROJECT",
            'text' => "Berhasil mengubah data project",
            'type' => "success"
        ]));
      } catch (\Throwable $e) {
          return back()->with('notif', json_encode([
              'title' => "PROJECT",
              'text' => "Gagal mengubah data project, ".$e->getMessage(),
              'type' => "error"
          ]));
      }
    }

    public function dtpengeluaran($idproject)
    {
        $data = ProjectPengeluaran::with('user.pegawai')->where('idproject',$idproject)->get();
        return DataTables::of($data)
        ->addColumn('nominal', function ($data) {
            return 'Rp. '.number_format($data->nominal,0,'.','.') ;
        })
        ->addColumn('tgl', function($data) {
        return date('d/m/Y', strtotime($data->tgl));
        })
        ->addColumn('action', function($data) {
            return '
            <button type="button" value="'.$data->id.'" class="btn btn-sm btn-outline-warning waves-effect waves-float waves-light btnubahpengeluaran" data-toggle="modal" data-target="#modal-pengeluaran"><i
            data-feather="edit"></i> Ubah
            </button>';
        })
        ->make(true);
    }

    public function storepengeluaran(Request $request)
    {
      try {
        ProjectPengeluaran::create([
            'idproject' => $request->idproject,
            'tgl' => $request->tgl,
            'keterangan' => $request->keterangan,
            'nominal' => preg_replace('/\D/', '',$request->nominal),
            'iduser' => auth()->user()->id
        ]);

        return back()->with('notif', json_encode([
            'title' => "PENGELUARAN",
            'text' => "Berhasil menambahkan data pengeluaran",
            'type' => "success"
        ]));
      } catch (\Throwable $e) {
          return back()->with('notif', json_encode([
              'title' => "PENGELUARAN",
              'text' => "Gagal menambahkan data pengeluaran, ".$e->getMessage(),
              'type' => "error"
          ]));
      }
    }

    public function updatepengeluaran(Request $request)
    {
      try {
        ProjectPengeluaran::where('id',$request->id)->update([
            'idproject' => $request->idproject,
            'tgl' => $request->tgl,
            'keterangan' => $request->keterangan,
            'nominal' => preg_replace('/\D/', '',$request->nominal),
            'iduser' => auth()->user()->id
        ]);

        return back()->with('notif', json_encode([
            'title' => "PENGELUARAN",
            'text' => "Berhasil mengubah data pengeluaran",
            'type' => "success"
        ]));
      } catch (\Throwable $e) {
          return back()->with('notif', json_encode([
              'title' => "PENGELUARAN",
              'text' => "Gagal mengubah data pengeluaran, ".$e->getMessage(),
              'type' => "error"
          ]));
      }
    }

    public function dtpembayaran($idproject)
    {
        $data = ProjectBayar::with('user.pegawai')->where('idproject',$idproject)->get();
        return DataTables::of($data)
        ->addColumn('nominal', function ($data) {
            return 'Rp. '.number_format($data->nominal,0,'.','.') ;
        })
        ->addColumn('tgl', function($data) {
        return date('d/m/Y', strtotime($data->tgl));
        })
        ->addColumn('action', function($data) {
            return '
            <button type="button" value="'.$data->id.'" class="btn btn-sm btn-outline-warning waves-effect waves-float waves-light btnubahpembayaran" data-toggle="modal" data-target="#modal-pengeluaran"><i
            data-feather="edit"></i> Ubah
            </button>';
        })
        ->make(true);
    }

    public function storepembayaran(Request $request)
    {
      try {
        ProjectBayar::create([
            'idproject' => $request->idproject,
            'tgl' => $request->tgl,
            'keterangan' => $request->keterangan,
            'nominal' => preg_replace('/\D/', '',$request->nominal),
            'iduser' => auth()->user()->id
        ]);

        $project = Project::where('id', $request->idproject)->first();

        $sisa = $project->sisa - preg_replace('/\D/', '',$request->nominal);

        Project::where('id', $request->idproject)->update([
            'sisa' => $sisa
        ]);

        return back()->with('notif', json_encode([
            'title' => "PEMBAYARAN",
            'text' => "Berhasil menambahkan data pembayaran",
            'type' => "success"
        ]));
      } catch (\Throwable $e) {
          return back()->with('notif', json_encode([
              'title' => "PEMBAYARAN",
              'text' => "Gagal menambahkan data pembayaran, ".$e->getMessage(),
              'type' => "error"
          ]));
      }
    }



}
