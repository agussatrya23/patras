@extends('layouts.page')

@section('title-head', 'Project')

@section('cssspage')
<style>
    .table td {
        /* border-top: unset; */
        padding: 0.50rem 0;
        vertical-align: top;
    }
</style>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-12 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Detail Project
                    </h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Manajemen Project</a></li>
                            <li class="breadcrumb-item active">Project</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="mb-1">{{$data->nama}}</h3>
                        <div class="table-responsive-lg mb-50">
                            <table class="table">
                            <tr>
                                <td style="width: 20%"><b>Divisi</b></td>
                                <td>{{$data->layanan->nama}}</td>
                                <td style="width: 20%"><b>Tanggal Awal</b></td>
                                <td>{{(new \App\Helper)->haritanggal(date($data->tglawal))}}</td>
                            </tr>
                            <tr>
                                <td><b>Klien</b></td>
                                <td>{{$data->klien->nama}}</td>
                                <td><b>Tanggal Akhir</b></td>
                                <td>{{(new \App\Helper)->haritanggal(date($data->tglakhir))}}</td>
                            </tr>
                            <tr>
                                <td><b>Harga</b></td>
                                <td>Rp. {{number_format($data->harga,0,'.','.')}}</td>
                                <td><b>Status</b></td>
                                <td>{{$data->status==1 ? 'Proses':'Selesai'}}</td>
                            </tr>
                            <tr>
                                <td><b>Pembayaran</b></td>
                                <td>Rp. {{number_format($data->harga - $data->sisa,0,'.','.')}}</td>
                                <td><b>Sisa</b></td>
                                <td>Rp. {{number_format($data->sisa,0,'.','.')}}</td>
                            </tr>
                            <tr>
                                <td><b>Team</b></td>
                                <td>
                                    <ul class="list-style-icons pl-0 mb-0">
                                        @foreach ($data->tim as $dt)
                                        <li>
                                            <i data-feather='user'></i>
                                            {{$dt->pegawai->nama}}
                                        </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td></td>
                                <td></td>
                            </tr>
                            </table>
                        </div>
                        <hr>
                        <div class="d-flex">
                            <a href="{{route('admin.project.edit', $data->id)}}" class="btn btn-sm btn-outline-warning waves-effect waves-float waves-light mr-1"><i data-feather="edit"></i> Ubah</a>
                            {{-- <form class="d-inline btnhapus" action="{{route('admin.portofolio.delete')}}"  onsubmit="return confirm('Lanjutkan proses hapus portofolio {{$data->nama}}?')" method="post">
                                <input type="hidden" name="id" value="{{$data->id}}">
                                <button type="submit" class="btn btn-sm btn-outline-danger waves-effect waves-float waves-light" target="_blank" name="button"><i data-feather="trash"></i> Hapus</button>
                                {{ csrf_field() }}
                            </form> --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                      <a class="nav-link active" id="dd-tab" data-toggle="pill" href="#pengeluaran" aria-expanded="true">Pengeluaran</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="keluarga-tab" data-toggle="pill" href="#pembayaran" aria-expanded="true">Pembayaran</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="pengeluaran" aria-labelledby="dd-tab" aria-expanded="true">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <div class="head-label">
                                    <h4 class="card-title">Daftar Pengeluaran</h4>
                                </div>
                                <div class="dt-action-buttons text-right">
                                    <div class="dt-buttons d-inline-flex">
                                      <button class="btn btn-gradient-danger btntambahpengeluaran" data-toggle="modal" data-target="#modal-pengeluaran"><i data-feather="plus"></i> Tambah Pengeluaran</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-hover" id="tablepengeluaran">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Keterangan</th>
                                            <th>Nominal</th>
                                            <th>Pegawai</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="pembayaran" aria-labelledby="dd-tab" aria-expanded="true">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <div class="head-label">
                                    <h4 class="card-title">Daftar Pembayaran</h4>
                                </div>
                                <div class="dt-buttons d-inline-flex">
                                    <button class="btn btn-gradient-danger btntambahpembayaran" data-toggle="modal" data-target="#modal-pengeluaran"><i data-feather="plus"></i> Tambah Pembayaran</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered table-hover" id="tablepembayaran">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Keterangan</th>
                                            <th>Nominal</th>
                                            <th>Pegawai</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('modal')
<div class="modal fade text-left" id="modal-pengeluaran" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="jquery-val-form" class="formpengeluaran" action="#" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" id="id">
          <input type="hidden" name="idproject" id="idproject" value="{{$data->id}}">
          <div class="modal-body">
            <div class="row">
                <div class="form-group col-12 sisa">
                    <label class="col-form-label"><b>Sisa Pembayaran</b></label>
                    <input type="text" class="form-control rp" id="sisa" name="sisa" readonly value="{{$data->sisa}}">
                </div>
              <div class="form-group col-12">
                  <label class="col-form-label"><b>Tanggal</b></label>
                  <input type="text" class="form-control flatpickr-basic" id="tgl" name="tgl" placeholder="Pilih"
                                                style="background-color: white" required>
              </div>
              <div class="form-group col-12">
                  <label class="col-form-label"><b>Keterangan</b></label>
                  <input type="text" class="form-control" id="keterangan" name="keterangan">
              </div>
              <div class="form-group col-12">
                  <label class="col-form-label"><b>Nominal</b></label>
                  <input type="text" class="form-control rp" id="nominal" name="nominal">
              </div>
  
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" id="btn-submit" class="btn btn-primary">Simpan</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
          </div>
          @csrf
        </form>
      </div>
    </div>
  </div>
@endsection

@section('jspage')
<script>
    $(document).ready(function() {
        var table = $('#tablepengeluaran').DataTable({
          processing: true,
          serverSide: true,
          autoWidth: false,
          paging: true,
          info: true,
          "drawCallback": function( settings ) {
            feather.replace();
          },
          dom: '<"box-body"<"row"<"col-sm-3"l><"col-sm-5"<"toolbar">><"col-sm-4"f>>><"box-body table-responsive"tr><"box-body"<"row"><"row"<"col-sm-6"i><"col-sm-6"p>>>',
          ajax: '{!! route('admin.project.pengeluaran.dt',$data->id) !!}',
          columns: [
            { data: 'tgl', name: 'tgl', class: 'text-center'},
            { data: 'keterangan', name: 'keterangan'},
            { data: 'nominal', name: 'nominal', class: 'text-center'},
            { data: 'user.pegawai.panggilan', name: 'user.pegawai.panggilan', class: 'text-center'},
            { data: 'action', name: 'action',class: 'text-center'},
          ],
          order:[[0,"asc"]],
        });
        $.fn.DataTable.ext.pager.numbers_length = 5;

        $('.btntambahpengeluaran').on('click', function() {
            $('#modal-pengeluaran .modal-title').text('TAMBAH PENGELUARAN')
            $('.formpengeluaran').attr('action', '{{route('admin.project.pengeluaran.store')}}')
            $('#tgl').val('')
            $('#keterangan').val('')
            $('#nominal').val('')
            $('.sisa').hide('')
        });

        $('#tablepengeluaran tbody').on('click', '.btnubahpengeluaran', function() {
            $('#modal-pengeluaran .modal-title').text('UBAH PENGELUARAN')
            $('.formpengeluaran').attr('action', '{{route('admin.project.pengeluaran.update')}}')
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var data = row.data()
            $('#id').val(data.id)
            var tgl = moment(data.tgl).format('YYYY-DD-MM');
            $('#tgl').val(tgl)
            $('#keterangan').val(data.keterangan)
            $('#nominal').val(data.nominal)
            $('.sisa').hide('')
        });

        var table = $('#tablepembayaran').DataTable({
          processing: true,
          serverSide: true,
          autoWidth: false,
          paging: true,
          info: true,
          "drawCallback": function( settings ) {
            feather.replace();
          },
          dom: '<"box-body"<"row"<"col-sm-3"l><"col-sm-5"<"toolbar">><"col-sm-4"f>>><"box-body table-responsive"tr><"box-body"<"row"><"row"<"col-sm-6"i><"col-sm-6"p>>>',
          ajax: '{!! route('admin.project.pembayaran.dt',$data->id) !!}',
          columns: [
            { data: 'tgl', name: 'tgl', class: 'text-center'},
            { data: 'keterangan', name: 'keterangan'},
            { data: 'nominal', name: 'nominal', class: 'text-center'},
            { data: 'user.pegawai.panggilan', name: 'user.pegawai.panggilan', class: 'text-center'},
            { data: 'action', name: 'action',class: 'text-center'},
          ],
          order:[[0,"asc"]],
        });
        $.fn.DataTable.ext.pager.numbers_length = 5;

        $('.btntambahpembayaran').on('click', function() {
            $('#modal-pengeluaran .modal-title').text('TAMBAH PEMBAYARAN')
            $('.formpengeluaran').attr('action', '{{route('admin.project.pembayaran.store')}}')
            $('#tgl').val('')
            $('#keterangan').val('')
            $('#nominal').val('')
            $('.sisa').show('')
        });
    });
</script>
@endsection
