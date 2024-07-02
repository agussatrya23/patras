@extends('layouts.page')

@section('title-head', 'Project')

@section('content')
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-12 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Project
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
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-header border-bottom">
                        <div class="head-label">
                            <h4 class="card-title">Daftar Project</h4>
                        </div>
                        <div class="dt-action-buttons text-right">
                            <div class="dt-buttons d-inline-flex">
                                <a href="{{route('admin.project.create')}}" class="btn btn-gradient-danger btntambah"><i data-feather="plus"></i> Tambah Project</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover" id="project">
                            <thead class="text-center">
                                <tr>
                                    <th>Divisi</th>
                                    <th>Nama</th>
                                    <th>Harga</th>
                                    <th>Status</th>
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
    var table = $('#project').DataTable({
      processing: true,
      serverSide: true,
      autoWidth: false,
      paging: true,
      info: true,
      "drawCallback": function( settings ) {
        feather.replace();
      },
      dom: '<"box-body"<"row"<"col-sm-3"l><"col-sm-5"<"toolbar">><"col-sm-4"f>>><"box-body table-responsive"tr><"box-body"<"row"><"row"<"col-sm-6"i><"col-sm-6"p>>>',
      ajax: '{!! route('admin.project.dt',0) !!}',
      columns: [
        { data: 'layanan.nama', name: 'layanan.nama', class: 'text-center'},
        {   data: 'nama', 
            name: 'nama',
            'render': function(data, type, row) {
                    return data +'<br><small>Klien : '+row.klien.nama+'</small>';
            }
        },
        { data: 'harga', name: 'harga', class: 'text-center'},
        {
            data: 'status',
            name: 'status',
            class: 'text-center',
            'render': function(data, type, row) {
                if (row.status == 1) {
                    return '<span class="badge badge-danger">Proses</span>';
                } else if (row.status == 2) {
                    return '<span class="badge badge-success">Selesai</span>';
                }
            }
        },
        { data: 'action', name: 'action',class: 'text-center'},
      ],
      order:[[0,"asc"]],
    });
    $.fn.DataTable.ext.pager.numbers_length = 5;

    $('div.toolbar').html('<div class="text-center mt-25 mt-lg-1"><select class="form-control show-tick ms select2" id="idlayanan" name="idlayanan" data-placeholder="Pilih Divisi"></select></div>')

    $("#idlayanan").select2({
        ajax: {
            url: '{!! route('s2.layanan') !!}',
            dataType: 'json',
            data: function(params) {
                return {
                    q: $.trim(params.term)
                };
            },
            processResults: function(data) {
                return {
                    results: data
                };
            },
            cache: true
        },
    });

    $('#idlayanan').on('change', function(){
        var idlayanan = $(this).val()
        table.ajax.url('/admin/project/dt/'+idlayanan).load();
    })


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