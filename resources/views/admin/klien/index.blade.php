@extends('layouts.page')

@section('title-head', 'Klien')

@section('content')
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-12 col-12 mb-2">
      <div class="row breadcrumbs-top">
        <div class="col-12">
          <h2 class="content-header-title float-left mb-0">Klien
          </h2>
          <div class="breadcrumb-wrapper">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Master Data</a></li>
              <li class="breadcrumb-item active">Klien</li>
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
                    <h4 class="card-title">Daftar Klien</h4>
                  </div>
                  <div class="dt-action-buttons text-right">
                    <div class="dt-buttons d-inline-flex">
                      <button class="btn btn-gradient-danger btntambah" data-toggle="modal" data-target="#modal-klien"><i data-feather="plus"></i> Tambah Klien</button>
                    </div>
                  </div>
                </div>
                <div class="card-body">
                  <table class="table table-bordered table-hover" id="klien">
                    <thead class="text-center">
                      <tr>
                        <th>Logo</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Link</th>
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

@section('modal')
<div class="modal fade text-left" id="modal-klien" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="tittlemodal"></h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="jquery-val-form" class="formklien" action="#" method="post" enctype="multipart/form-data">
          <input type="hidden" name="id" id="id">
          <div class="modal-body">
            <div class="row">
              <div class="form-group col-md-12">
                  <label class=" col-form-label"><b>Logo</b></label>
                  <div class="body" id="uploadgambar">
  
                  </div>
                  <label class="col-form-label"><small>* File format <b>.png</b>
                      , maximum size 2MB</small></label>
              </div>
              <div class="form-group col-md-6 col-12">
                  <label class="col-form-label"><b>Nama</b></label>
                  <input type="text" class="form-control" id="nama" name="nama" required>
              </div>
              <div class="form-group col-md-6 col-12">
                  <label class="col-form-label"><b>Email</b></label>
                  <input type="email" class="form-control" id="email" name="email">
              </div>
              <div class="form-group col-md-6 col-12">
                  <label class="col-form-label"><b>Telepon</b></label>
                  <input type="text" class="form-control" id="telepon" name="telepon">
              </div>
              <div class="form-group col-md-6 col-12">
                  <label class="col-form-label"><b>Link</b></label>
                  <input type="text" class="form-control" id="link" name="link">
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
    var table = $('#klien').DataTable({
      processing: true,
      serverSide: true,
      autoWidth: false,
      paging: true,
      info: true,
      "drawCallback": function( settings ) {
        feather.replace();
      },
      dom: '<"box-body"<"row"<"col-sm-3"l><"col-sm-5"<"toolbar">><"col-sm-4"f>>><"box-body table-responsive"tr><"box-body"<"row"><"row"<"col-sm-6"i><"col-sm-6"p>>>',
      ajax: '{!! route('md.klien.dt') !!}',
      columns: [
            {
                data: 'logo',
                name: 'logo',
                class: 'text-center',
                'render': function(data, type, row) {
                    return '<img class="rounded" src="{{ asset('') }}/' + data +
                        '" height="50" alt="Logo">';
                }
            },
          { data: 'nama', name: 'nama', class: 'text-center'},
          { data: 'email', name: 'email', class: 'text-center',
          'render': function(data, type, row) {
                if (data != null) {
                    return data;
                } else {
                    return '-';
                }
            }},
          { data: 'telepon', name: 'telepon', class: 'text-center',
          'render': function(data, type, row) {
                if (data != null) {
                    return data;
                } else {
                    return '-';
                }
            }},
          { data: 'link', name: 'link', class: 'text-center',
          'render': function(data, type, row) {
                if (data != null) {
                    return '<a href="'+data+'" target="_blank" class="btn btn-sm btn-info"><i data-feather="link"></i> Link</a>';
                } else {
                   return '-';
                }
            }},
          { data: 'action', name: 'action',class: 'text-center'},
      ],
      order:[[0,"asc"]],
    });
    $.fn.DataTable.ext.pager.numbers_length = 5;

    $('.btntambah').on('click', function() {
        $('#tittlemodal').text('TAMBAH KLIEN')
        $('.formklien').attr('action', '{{route('md.klien.store')}}')
        $('#nama').val('')
        $('#email').val('')
        $('#telepon').val('')
        $('#link').val('')
        $('.formklien #logo').parents('.dropify-wrapper').remove();
        $('#uploadgambar').append(
            '<input type="file" class="dropify" id="logo" name="logo" data-allowed-file-extensions="png" data-max-file-size="1M" required>'
        );
        $('.formklien #logo').dropify();
    });

    $('#klien tbody').on('click', '.btnubah', function() {
        $('#tittlemodal').text('UBAH KLIEN')
        $('.formklien').attr('action', '{{route('md.klien.update')}}')
        var tr = $(this).closest('tr');
        var row = table.row(tr);
        var data = row.data()
        $('#id').val(data.id)
        $('#nama').val(data.nama)
        $('#email').val(data.email)
        $('#telepon').val(data.telepon)
        $('#link').val(data.link)
        $('.formklien #logo').parents('.dropify-wrapper').remove();
        $('#uploadgambar').append(
            '<input type="file" class="dropify" id="logo" name="logo" data-allowed-file-extensions="png" data-max-file-size="1M" data-default-file="{{ asset('') }}/' + data.logo + '">');
        $('.formklien #logo').dropify();
    });

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
