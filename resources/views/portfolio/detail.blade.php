@extends('layouts.masterweb')

@section('meta-property')
<meta property="og:image" content="{{asset($data->cover)}}">
<meta property="og:title" content="{{$data->nama}}" />


@php
    $deskripsi = strip_tags($data->deskripsi);
    $strlendesc = Str::length($deskripsi);
    if ($strlendesc > 100) {
        $isi_cut = substr($deskripsi, 0, 100);
        if ($isi_cut[99] != ' ') {
            $new_pos = strrpos($isi_cut, ' ');
            $isi_cut = substr($deskripsi, 0, $new_pos);
            $isi_cut = $isi_cut.'...';
        } else {
            $isi_cut = substr($deskripsi, 0, 99);
            $isi_cut = $isi_cut.'...';
        }
    } else {
        $isi_cut = $deskripsi;
    }
    $rpc_isi = strip_tags($isi_cut, '<p>');
@endphp


<meta property="og:description" content="{{$isi_cut}}" />
@endsection

@section('title-head', 'Portfolio')


@section('content')
<div class="page_header_default style_one">
    <div class="parallax_cover">
        <div class="simpleParallax"><img src="{{asset('assets-web/images/page-banner.jpg')}}" alt="bg_image"
                class="cover-parallax"></div>
    </div>
    <div class="page_header_content">
        <div class="auto-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner_title_inner">
                        <div class="title_page">
                            Portofolio
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="breadcrumbs creote">
                        <ul class="breadcrumb m-auto">
                            <li><a href="{{route('welcome')}}">Home</a></li>
                            <li><a href="i{{route('portofolio')}}">Portofolio</a></li>
                            <li class="active">Detail</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="project-detail-section pd_80_60">
    <div class="auto-container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 mb-5 mb-lg-5 mb-xl-0">
               <div class="title_all_box style_seven dark_color">
                  <div class="title_sections">
                     <div class="before_title pt-0">
                           {{$data->layanan->nama}}
                     </div>
                     {{-- <div class="small_text_sub">Visual Art</div> --}}
                     <div class="title">{{$data->nama}}</div>
                  </div>
               </div>
               <div class="description_box">
                  {!!$data->deskripsi!!}
               </div>
            </div>
            <div class="col-xl-4 col-lg-4">
                <div class="project_information">
                    <div class="project_info d-flex align-items-center">
                        <i class="fa fa-info-circle"></i>
                        <h2>Info</h2>
                    </div>
                    <div class="project_information_bo">
                        @if ($data->klien != null )
                        <div class="repeat_informtion">
                            <h6>Klien : </h6>
                            <p>{{$data->klien}}</p>
                        </div>
                        @endif
                        @if ($data->lokasi != null)
                        <div class="repeat_informtion">
                            <h6>Lokasi : </h6>
                            <p>{{$data->lokasi}}</p>
                        </div>
                        @endif
                        @if ($data->tanggal != null)
                        <div class="repeat_informtion">
                            <h6>Tanggal : </h6>
                            <p>{{(new \App\Helper)->tanggal(date($data->tanggal))}}</p>
                        </div>
                        @endif
                        @if ($data->link != null)
                        <div class="repeat_informtion">
                            <h6>Website : </h6>
                            <a href="{{$data->link}}" class="d-flex align-items-center" target="_blank">
                                <i class="fa fa-external-link"></i> 
                                <p>{{$data->link}}</p>
                            </a>
                        </div>
                        @endif
                    </div>
                    <div class="tags_and_share">
                        <div class="share_content">
                            <div class="share_socail d-flex align-items-center justify-content-between">
                                <div class="title">Bagikan di</div>
                                <div>
                                    <a href="https://www.facebook.com/share.php?u={{ Request::url() }}&title={{ $data->nama }}" target="_blank" class="m_icon" title="facebook">
                                    <i class="fa fa-facebook"></i>
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?text={{ $data->nama }}+{{ Request::url() }}" target="_blank" class="m_icon" title="twitter">
                                    <i class="fa fa-twitter"></i>
                                    </a>
                                    <a href="https://api.whatsapp.com/send?text={{ Request::url() }} %0ASaya%20menemukan%20hal%20menarik%20disini" target="_blank"  class="m_icon" title="Bagikan di WhatsApp">
                                    <i class="fa fa-whatsapp"></i>
                                    </a>
                                    <a href="https://t.me/share/url?url={{ Request::url() }}&text=Berikut%20adalah%20hasil%20karya%20kami" class="m_icon" title="Bagikan di Telegram">
                                    <i class="fa fa-telegram"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                     </div>
                </div>
            </div>
            <div class="col-12">
                @if ($data->galeri->count() > 0)
                <div class="three_column style_four masonary_enable pt-4">
                   <div class="container-fluid">
                      <div class="grid_show_case grid_layout clearfix">
                            @foreach ($data->galeri as $dg) 
                            <div class="grid_box _card">
                               <div class="project_box style_two">
                                  <div class="entry-thumbnail image">
                                        <img src="{{asset($dg->file)}}"
                                           class="wp-post-image" alt="img" loading="lazy">
                                        <div class="overlay">
                                           <a class="lightbox-image"
                                              href="{{asset($dg->file)}}" data-fancybox="images" data-caption="{{$dg->caption}}"> 
                                              <span class="fa fa-search icon"></span>
                                           </a>
                                        </div>
                                  </div>
                               </div>
                            </div>
                            @endforeach
                      </div>
                   </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
