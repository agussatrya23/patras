@extends('layouts.page')

@section('title-head', 'Pegawai')

@section('content')
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-12 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Pegawai
                    </h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                            <li class="breadcrumb-item active">Pegawai</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-body">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <div class="head-label">
                            <h4 class="card-title">Daftar Pegawai</h4>
                        </div>
                        <div class="dt-action-buttons text-right">
                            <div class="dt-buttons d-inline-flex">
                                <a href="{{route('md.pegawai.create')}}" class="btn btn-gradient-danger btntambah"><i data-feather="plus"></i> Tambah Pegawai</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover" id="pegawai">
                            <thead class="text-center">
                                <tr>
                                    <th>Photo</th>
                                    <th>Nama</th>
                                    <th>Divisi</th>
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
@endsection

@section('jspage')
<script>
$(document).ready(function() {
    var table = $('#pegawai').DataTable({
      processing: true,
      serverSide: true,
      autoWidth: false,
      paging: true,
      info: true,
      "drawCallback": function( settings ) {
        feather.replace();
      },
      dom: '<"box-body"<"row"<"col-sm-3"l><"col-sm-5"<"toolbar">><"col-sm-4"f>>><"box-body table-responsive"tr><"box-body"<"row"><"row"<"col-sm-6"i><"col-sm-6"p>>>',
      ajax: '{!! route('md.pegawai.dt') !!}',
      columns: [
        {
            data: 'foto',
            name: 'foto',
            class: 'text-center',
            'render': function(data, type, row) {
                return '<img class="rounded" src="{{ asset('') }}/' + row.foto +
                    '" height="50" alt="Logo">';
            }
        },
        { data: 'nama', name: 'nama', class: 'text-center'},
        { data: 'layanan.nama', name: 'layanan.nama', class: 'text-center'},
        { data: 'action', name: 'action',class: 'text-center'},
      ],
      order:[[0,"asc"]],
    });
    $.fn.DataTable.ext.pager.numbers_length = 5;

    $('#klien tbody').on('click', '.btnhapus', function() {
        var tr = $(this).closest('tr');
        var row = table.row(tr);
        var data = row.data()
        if (!confirm('Lanjutkan proses hapus klien ' + data.nama + '?')) {
            event.preventDefault();
        }
    })
});
</script>
@stop