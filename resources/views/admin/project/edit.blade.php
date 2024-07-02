@extends('layouts.page')

@section('title-head', 'Project')


@section('content')
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-12 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Ubah Project
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
                <div class="content-body">
                    <div class="card">
                        <div class="card-body">
                            <form id="jquery-val-form" class="forms-sample" action="{{route('admin.project.update')}}" method="post" enctype="multipart/form-data" >
                                <input type="hidden" name="id" id="id" value="{{$data->id}}">
                                <div class="row">

                                    <div class="form-group col-md-4 col-12">
                                        <label class="col-sm-12 col-form-label"><b>Layanan</b></label>
                                        <div class="col-sm-12">
                                            <select class="form-control show-tick ms select2" id="idlayanan" name="idlayanan"  data-placeholder="Pilih Layanan" required>
                                                <option></option>
                                                @foreach ($layanan as $l)
                                                    <option value="{{$l->id}}" {{$l->id == $data->idlayanan ? 'selected':''}}>{{$l->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-8 col-12">
                                        <label class="col-sm-12 col-form-label"><b>Nama Project</b></label>
                                        <div class="col-sm-12">
                                          <input type="text" id="nama" name="nama" value="{{$data->nama}}" required class="form-control">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-6 col-12">
                                        <label class="col-sm-12 col-form-label"><b>Klien</b></label>
                                        <div class="col-sm-12">
                                            <select class="form-control show-tick ms select2" id="idklien" name="idklien"  data-placeholder="Pilih Klien" required>
                                                <option></option>
                                                @foreach ($klien as $k)
                                                    <option value="{{$k->id}}" {{$k->id == $data->idklien ? 'selected':''}}>{{$k->nama}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6 col-12">
                                        <label class="col-sm-12 col-form-label"><b>Harga</b></label>
                                        <div class="col-sm-12">
                                          <input type="text" id="harga" name="harga" value="{{$data->harga}}" required class="form-control rp">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="col-sm-12 col-form-label"><b>Tanggal Awal</b></label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control flatpickr-basic" id="tglawal" name="tglawal"  value="{{$data->tglawal}}" placeholder="Pilih"
                                                style="background-color: white" required>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="col-sm-12 col-form-label"><b>Tanggal Akhir</b></label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control flatpickr-basic" id="tglakhir" name="tglakhir"  value="{{$data->tglakhir}}" placeholder="Pilih"
                                                style="background-color: white" required>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="col-sm-12 col-form-label"><b>Pegawai</b></label>
                                        <div class="col-sm-12">
                                            <select class="form-control select2" multiple id="idpegawai" name="idpegawai[]" required>
                                                @foreach ($pegawai as $p)
                                                    <option value="{{ $p->id }}" {{ in_array($p->id, $tim) ? "selected":"" }}>{{ $p->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="col-sm-12">
                                        <button type="submit" id="btn-submit" class="btn btn-icon btn-block btn-success mt-1"><i data-feather="save"></i> Save</button>
                                        </div>
                                      </div>
                                </div>
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
