@extends('layouts.page')

@section('title-head', 'Portofolio')

@section('cssspage')
<link rel="stylesheet" href="{{ asset('app-assets/plugins/cropper/cropper.min.css') }}">
<link rel="stylesheet" href="{{ asset('app-assets/plugins/filepond/filepond.min.css') }}">
<link rel="stylesheet" href="{{ asset('app-assets/plugins/filepond/filepond-plugin-image-preview.min.css') }}">
<link rel="stylesheet" href="{{ asset('app-assets/plugins/fancybox/jquery.fancybox.min.css') }}">

<style>
    /* image uploader */
    .photo-crop-container {
        position: relative;
    }

    .photo-crop-container:before {
        content: '';
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        position: absolute;
        height: 0px;
        width: 100%;
        z-index: 9;
        background-color: #f5f5f5;
        vertical-align: middle;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
        opacity: 0;
        top: 80px;
        -webkit-transition: all linear 0.3s 0.1s;
        -o-transition: all linear 0.3s 0.1s;
        transition: all linear 0.3s 0.1s;
    }

    .photo-crop-container.show-loader:before {
        content: 'Cropping...';
        opacity: 1;
        height: calc(100% - 80px);
    }

    .photo-crop-container {
        position: relative;
        overflow: hidden;
    }

    .photo-crop-container img {
        display: block;
        max-width: 100%;
        width: 100%;
        height: 100%;
    }

    .photo-crop-container .crop-preview-cont {
        overflow: hidden;
        -webkit-transition: all linear 0.2s;
        -o-transition: all linear 0.2s;
        transition: all linear 0.2s;
        -webkit-transform: translateY(0%);
        -ms-transform: translateY(0%);
        transform: translateY(0%);
        opacity: 1;
        height: 100%;
        display: none;
    }

    .photo-crop-container .crop-preview-cont #crop_img {
        position: relative;
        margin-top: 10px;
        float: right;
        bottom: 0;
        z-index: 1;
        color: #fff;
        text-decoration: underline;
        right: 0;
        cursor: pointer;
        background-color: rgba(0, 0, 0, 0.30196078431372547);
        padding: 2px 10px;
    }

    .photo-crop-container.show-result .crop-preview-cont .img_container {
        max-width: 400px;
    }

    .photo-crop-container.show-result .crop-preview-cont {
        -webkit-transform: translateY(10%);
        -ms-transform: translateY(10%);
        transform: translateY(10%);
        opacity: 0;
        height: 0;
    }

    .photo-crop-container #user_cropped_img {
        -webkit-transition: all linear 0.2s 2s;
        -o-transition: all linear 0.2s 2s;
        transition: all linear 0.2s 2s;
        -webkit-transform: translateY(-10%);
        -ms-transform: translateY(-10%);
        transform: translateY(-10%);
        opacity: 0;
        position: absolute;
    }

    .photo-crop-container.show-result #user_cropped_img {
        -webkit-transform: translateY(0%);
        -ms-transform: translateY(0%);
        transform: translateY(0%);
        opacity: 1;
        position: relative;
    }

    .photo-crop-container #user_cropped_img img {
        max-width: 300px;
    }

    .photo-crop-container #user_cropped_img img {
        -webkit-transition: all cubic-bezier(0.22, 0.61, 0.36, 1) 0.2s 2.3s;
        -o-transition: all cubic-bezier(0.22, 0.61, 0.36, 1) 0.2s 2.3s;
        transition: all cubic-bezier(0.22, 0.61, 0.36, 1) 0.2s 2.3s;
        -webkit-transform: translateY(-10%);
        -ms-transform: translateY(-10%);
        transform: translateY(-10%);
        opacity: 0;
        scroll-behavior: smooth;
    }

    .photo-crop-container.show-result #user_cropped_img img {
        -webkit-transform: translateY(0%);
        -ms-transform: translateY(0%);
        transform: translateY(0%);
        opacity: 1;
    }

    @media only screen and (max-width: 575px) {
        .photo-crop-container #user_cropped_img img {
            max-width: 100%;
        }
    }

    .filepond--root {
        margin-bottom: 0
    }

</style>

<style>
    .table td {
        border-top: unset;
        padding: 0.25rem 0;
    }

    .port-caption {
        position: absolute;
        width: 100%;
        bottom: 0;
        z-index: 1;
        color: #fff;
        margin-bottom: 0;
        padding: 10px 10px;
        background-color: rgb(65 64 64 / 54%);
    }
</style>
@endsection

@section('content')
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-12 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">Detail Portofolio
                    </h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Konten Website</a></li>
                            <li class="breadcrumb-item active">Portofolio</li>
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
                    <div class="card-body row mx-0 align-items-center">
                        <div class="col-md-4 pl-0">
                            <img src="{{asset($data->cover)}}" class="rounded" width="100%" alt="">
                        </div>
                        <div class="col-md-8">
                            <span class="text-danger">{{$data->layanan->nama}}</span>
                            <h3 class="mt-50">{{$data->nama}}</h3>
                            <div class="table-responsive-lg mb-50">
                                <table class="table">
                                <tr>
                                    <td>Klien</td>
                                    <td>{{$data->klien != null ? $data->klien:'-'}}</td>
                                </tr>
                                <tr>
                                    <td>Lokasi</td>
                                    <td>{{$data->lokasi != null ? $data->lokasi:'-'}}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal</td>
                                    <td>{{$data->tanggal != null ? (new \App\Helper)->haritanggal(date($data->tanggal)):'-'}}</td>
                                </tr>
                                <tr>
                                    <td>Link</td>
                                    <td>{{$data->link != null ? $data->link:'-'}}</td>
                                </tr>
                                </table>
                            </div>
                            {!!$data->deskripsi!!}
                            <hr>
                            <div class="d-flex">
                                <a href="{{route('admin.portofolio.edit', $data->id)}}" class="btn btn-sm btn-outline-warning waves-effect waves-float waves-light mr-1"><i data-feather="edit"></i> Ubah</a>
                                <form class="d-inline btnhapus" action="{{route('admin.portofolio.delete')}}"  onsubmit="return confirm('Lanjutkan proses hapus portofolio {{$data->nama}}?')" method="post">
                                    <input type="hidden" name="id" value="{{$data->id}}">
                                    <button type="submit" class="btn btn-sm btn-outline-danger waves-effect waves-float waves-light" target="_blank" name="button"><i data-feather="trash"></i> Hapus</button>
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card collapse-icon">
                            <div class="collapse-margin" id="accordionExample">
                                <div class="card mt-0">
                                    <div class="card-header" id="headingOne" data-toggle="collapse" role="button" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        <span class="lead collapse-title"> Tambah Galeri Project </span>
                                    </div>

                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <form id="jquery-val-form" class="forms-sample" action="{{route('admin.portofolio.storegaleri')}}" method="post" enctype="multipart/form-data">
                                                <input type="hidden" name="idportofolio" value="{{$data->id}}">
                                                <input type="hidden" name="slug" value="{{$data->slug}}">
                                                <div class="form-group">
                                                    <label class="col-form-label"><b>Photo</b></label>
                                                    <div class="body">
                                                        <input type="file" class="upload-photo" name="gambar[]" required multiple/>
                                                    </div>
                                                    <label class="col-form-label"><small>* file format <b>.jpg</b>and <b>.jpeg</b>, maximum size 2MB</small></label>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-form-label"><b>Caption</b></label>
                                                    <div class="form-label-group mb-0">
                                                        <textarea data-length="200" class="form-control char-textarea" rows="2" name="caption" id="caption"></textarea>
                                                    </div>
                                                    <small class="textarea-counter-value float-right"><span class="char-count">0</span> / 200 </small>
                                                </div>

                                                <button type="submit" id="btn-submit"
                                                class="btn btn-icon btn-block btn-success mt-2"><i
                                                    data-feather="save"></i> Simpan</button>
                                            {{ csrf_field() }}
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        

                        <div class="card-columns three-columns mt-2">
                            @foreach ($data->galeri as $d)
                            <div class="card mb-2">
                                <div style="position: relative;">
                                    <img class="card-img-top img-fluid" src="{{ asset($d->file) }}" alt="" />
                                    <p class="port-caption">{{$d->caption}}</p>
                                </div>
                                <div class="row">
                                    <div class="col-4 pr-0">
                                        <a href="{{ asset($d->file) }}" class="lightbox-image btn btn-sm btn-block btn-primary" style="border-radius: 0 0 0 0.5rem; margin: 0;" data-fancybox="images" data-caption="{{$d->caption}}"><i data-feather='eye'></i> Detail
                                        </a>
                                    </div>
                                    <div class="col-4 px-0">
                                        <button type="button" value="{{$d->id}}" class="btn btn-sm btn-block btn-warning btncaption" style="border-radius: 0 0 0 0; margin: 0;"  data-toggle="modal" data-target="#modal-caption" data-backdrop="static" data-keyboard="false"><i data-feather='twitch'></i> Caption
                                        </button>
                                    </div>
                                    <div class="col-4 pl-0">
                                        <form action="{{route('admin.portofolio.deletegaleri')}}" onsubmit="return confirm('Lanjutkan proses hapus foto?')" method="post">
                                            <input type="hidden" name="id" value="{{ $d->id }}">
                                            <input type="hidden" name="file" value="{{ $d->file }}">
                                            <button type="submit" class="btn btn-sm btn-block btn-danger" style="border-radius: 0 0 0.5rem 0; margin: 0;"><i data-feather="trash-2"></i> Hapus</button>
                                            {{csrf_field()}}
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</div>

@endsection

@section('modal')
<div class="modal fade" id="modalCropper" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalCropperLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="modalCropperLabel">Crop Gambar</h5>
            </div>
            <div class="modal-body">
            <div class="photo-crop-container">
                <div class="crop-preview-cont">
                <div class="img_container"></div>
                <button class="btn btn-sm btn-success waves-effect waves-float waves-light" id="crop_img">Confirm</button>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade text-left" id="modal-caption" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="tittle-modal">Caption Photo</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="jquery-val-form" class="forms-sample form-caption" action="{{route('admin.portofolio.updatecaption')}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name='id' id='id'>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <img class="img-fluid rounded" id="gambar" src="" alt="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-form-label"><b>Caption</b></label>
                    <div class="form-label-group mb-0">
                        <textarea data-length="200" class="form-control char-textarea" rows="2" name="caption" id="captionmd"></textarea>
                    </div>
                    <small class="textarea-counter-value float-right"><span class="char-count">0</span> / 200 </small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
            </div>
            {{ csrf_field() }}
            </form>
        </div>
    </div>
</div>
@endsection

@section('jspage')

<script src="{{ asset('app-assets/plugins/fancybox/jquery.fancybox.js') }}"></script>
<script>
    $('.lightbox-image').fancybox({
        openEffect  : 'fade',
        closeEffect : 'fade',
        helpers : {
            media : {}
        }
    });
</script>

{{-- <script src="https://cdn.rawgit.com/kensnyder/quill-image-resize-module/3411c9a7/image-resize.min.js"></script> --}}
<script src="{{ asset('app-assets/plugins/filepond/filepond-plugin-file-encode.min.js') }}"></script>
<script src="{{ asset('app-assets/plugins/filepond/filepond-plugin-file-validate-size.min.js') }}"></script>
<script src="{{ asset('app-assets/plugins/filepond/filepond-plugin-file-validate-type.min.js') }}"></script>
<script src="{{ asset('app-assets/plugins/filepond/filepond-plugin-image-validate-size.min.js') }}"></script>
<script src="{{ asset('app-assets/plugins/filepond/filepond-plugin-image-preview.min.js') }}"></script>
<script src="{{ asset('app-assets/plugins/filepond/filepond.min.js') }}"></script>
<script src="{{ asset('app-assets/plugins/filepond/filepond.jquery.js') }}"></script>
<script src="{{ asset('app-assets/plugins/cropper/cropper.min.js') }}"></script>
<script>
    $.fn.filepond.registerPlugin(
        FilePondPluginFileValidateSize,
        FilePondPluginFileValidateType,
        FilePondPluginImageValidateSize,
        FilePondPluginImagePreview,
        // FilePondPluginImageEdit,
        FilePondPluginFileEncode
    );

    FilePond.create(
        document.querySelector('.upload-photo'), {
            labelIdle: '<div class="uploading-frame">Drag your photo here or <span class="filepond--label-action fontDarkOrange"> Click to upload </span></div>',
            checkValidity: true,
            dropValidation: true,
            acceptedFileTypes: ['image/png', 'image/jpeg', 'image/jpg'],
            imageValidateSizeMinWidth: 100,
            imageValidateSizeMinHeight: 100,
            labelMaxFileSize: 'Maximum file size allowed is {filesize}',
            labelFileProcessing: 'Generating file for cropping',
            labelFileProcessingComplete: 'Click to upload new Image.',
            storeAsFile: true,
            labelIdle: 'Drop files here or <span class="filepond--label-action"> Click </span> to upload.',
            maxFileSize: '3MB',
            required: true,
            allowReorder: true,
        }
    );

    const pond = document.querySelector('.filepond--root');

    var photo_crop_container = $('.photo-crop-container');
    var crop_preview_cont = photo_crop_container.find('.crop-preview-cont');
    var filepond_img_Container = photo_crop_container.find('.img_container');
    var img_cropping = '';

    // pond.getFile();
    var crop = 0;
    var jml_photo = [];
    // var first_photo = 0;
    var cropped_img = '';
    var file_add = '';
    var window_height = $(window).height();

    pond.addEventListener('FilePond:addfile', function (e, file) {
        // console.log(e, file, e.detail.file.id);
        if (crop == 0) {
            if (e.detail.error == null) {
                jml_photo.push(e);
                
                file_add = jml_photo[0];
                $('#modalCropper').modal('show');
            }
        } else if (crop == 1 && jml_photo.length) {
            file_add = jml_photo[0];
            $('#modalCropper').modal('show');
        } else if (crop == 1 && !jml_photo.length) {
            crop = 0;
        } else {
            crop = 0;
        }
    });

    $('#modalCropper').on('shown.bs.modal', function () {
        crop_preview_cont.slideDown('slow');
        let image = new Image();
        image.src = URL.createObjectURL(file_add.detail.file.file);
        filepond_img_Container.append(image);
        img_cropping = filepond_img_Container.find('img');
        img_cropping.attr('src', image.src);
        img_cropping.cropper({
            viewMode: 2,
            dragMode: 'move',
            guides: true,
            cropBoxResizable: true,
            minContainerWidth: $('#modalCropper').find('.img_container').width(),
            minContainerHeight: 500
        });
    });

    $('#crop_img').on('click', function (ev) {
        $('html,body').animate({
            scrollTop: $(".photo-crop-container").offset().top - 80
        }, 'slow');
        photo_crop_container.addClass('show-loader show-result');
        var cropped_img = img_cropping.cropper('getCroppedCanvas', {
            // width: 1200,
            // height: 700,
            imageSmoothingEnabled: false,
            imageSmoothingQuality: 'high',
        }).toDataURL('image/jpeg');
        // console.log(cropped_img);
        //   console.log(window.URL.createObjectURL(cropped_img));
        // "cropped_img" use this for reteriving cropped image data for further processing like saving in datase, etc.
        // photo_preview_container.html('').append('<img src=""/>');
        // photo_preview_container.find('img').attr('src', cropped_img);
        setTimeout(function () {
            photo_crop_container.removeClass('show-loader');
        }, 1900);
        $('.upload-photo').filepond('removeFile', file_add.detail.file.id);
        $('.upload-photo').filepond('addFile', cropped_img);
        setTimeout(function () {
            photo_crop_container.removeClass('show-result');
        }, 1000);
        crop_preview_cont.slideUp();
        // crop_preview_cont.html('');
        img_cropping.cropper('destroy').html('');
        $('#modalCropper').modal('hide');
        filepond_img_Container.html('');

        jml_photo.shift();
        crop = 1;
    });

    $('.btncaption').on('click', function () {
        var id = $(this).val();
        $('#id').val(id)
        $.get('/admin/portofolio/getgaleri/' + id, function(data) {
            $('#gambar').attr("src",'{{ asset('') }}/' + data.file)
            $('#captionmd').val(data.caption)
            $jmlcap = data.caption;
            $('.form-caption .char-count').html($jmlcap.length);
        });
    });
</script>
@endsection