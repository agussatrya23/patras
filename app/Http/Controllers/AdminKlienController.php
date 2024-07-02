<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MdKlien;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class AdminKlienController extends Controller
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
        return view('admin.klien.index');
    }
    
    public function dt()
    {
        $data = MdKlien::get();
        return DataTables::of($data)
        ->addColumn('action', function($data) {
            return '
            <button type="button" value="'.$data->id.'" class="btn btn-sm btn-outline-warning waves-effect waves-float waves-light btnubah" data-toggle="modal" data-target="#modal-klien"><i
            data-feather="edit"></i> Ubah
            </button>
            <form class="d-inline btnhapus" action="'.route('md.klien.delete').'" method="post">
              <input type="hidden" name="id" value="' . $data->id . '">
              <button type="submit" class="btn btn-sm btn-outline-danger waves-effect waves-float waves-light" target="_blank" name="button"><i data-feather="trash"></i> Hapus</button>
              ' . csrf_field() . '
            </form>
          ';
        })
        ->make(true);
    }

    public function store(Request $request)
    {
        $ceknama = MdKlien::where('nama',$request->nama)->count();
        if ($ceknama > 0) {
            return back()->with('notif', json_encode([
            'title' => "KLIEN",
            'text' => "Gagal manambah klien".$request->nama.", klien sudah terdaftar",
            'type' => "warning"
            ]));
        }

        try {
            $logo = '';
            if ($request->file('logo') != null) {
                $logo = $request->file('logo')->store('klien');
            }

           MdKlien::create([
            'logo' => $logo,
            'nama' => $request->nama,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'link' => $request->link,
            'iduser' => auth()->user()->id
           ]);

           return back()->with('notif', json_encode([
            'title' => "KLIEN",
            'text' => "Berhasil menambah klien",
            'type' => "success"
            ]));
        } catch (\Throwable $e) {
            return back()->with('notif', json_encode([
                'title' => "KLIEN",
                'text' => "Gagal menambah klien".$e->getMessage(),
                'type' => "error"
              ]));
        }
    }

    public function update(Request $request)
    {
        $ceknama = MdKlien::where('nama',$request->nama)->where('id','!=',$request->id)->count();
        if ($ceknama > 0) {
            return back()->with('notif', json_encode([
            'title' => "KLIEN",
            'text' => "Gagal mengubah klien".$request->nama.", klien sudah terdaftar",
            'type' => "warning"
            ]));
        }

        try {
            $logo = MdKlien::where('id',$request->id)->pluck('logo')->first();

            if ($request->file('logo') != null) {
                Storage::delete($logo);
                $logo = $request->file('logo')->store('klien');
            }

            MdKlien::where('id',$request->id)->update([
            'logo' => $logo,
            'nama' => $request->nama,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'link' => $request->link,
            'iduser' => auth()->user()->id
            ]);

            return back()->with('notif', json_encode([
                'title' => "KLIEN",
                'text' => "Berhasil mengubah klien",
                'type' => "success"
            ]));
        } catch (\Exception $e) {
            return back()->with('notif', json_encode([
                'title' => "KLIEN",
                'text' => "Gagal mengubah klien".$e->getMessage(),
                'type' => "error"
            ]));
        }
    }

    public function delete(Request $request)
    {
        try {
            $logo = MdKlien::where('id',$request->id)->pluck('logo')->first();
            Storage::delete($logo);
            MdKlien::where('id', $request->id)->delete();
            return back()->with('notif', json_encode([
                'title' => "KLIEN",
                'text' => "Berhasil menghapus klien.",
                'type' => "success"
            ]));
        } catch (\Throwable $e) {
            return back()->with('notif', json_encode([
                'title' => "KLIEN",
                'text' => "Gagal menghapus klien.".$e->getMessage(),
                'type' => "error"
            ]));
        }
    }
}
