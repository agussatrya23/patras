@extends('layouts.masterweb')

@section('title-head', 'Layanan')

@section('content')
<div class="page_header_default style_one">
    <div class="parallax_cover">
       <div class="simpleParallax"><img src="{{asset('assets-web/images/page-banner-3.jpg')}}" alt="bg_image" class="cover-parallax"></div>
    </div>
    <div class="page_header_content">
       <div class="auto-container">
          <div class="row">
             <div class="col-md-12">
                <div class="banner_title_inner">
                   <div class="title_page">
                      Layanan
                   </div>
                </div>
             </div>
             <div class="col-lg-12">
                <div class="breadcrumbs creote">
                   <ul class="breadcrumb m-auto">
                      <li><a href="{{route('welcome')}}">Beranda</a></li>
                      <li class="active">Layanan</li>
                   </ul>
                </div>
             </div>
          </div>
       </div>
    </div>
</div>

<section class="about-section pd_80_60">
    <div class="auto-container">
       <div class="row align-items-center justify-content-center">
          <div class="col-xl-6 col-lg-10 col-md-10 order-2 order-xl-1">
            <div class="simple_image_boxes style_two bg_op_1"
                style="background-image: url({{asset('assets-web/images/banner-bgs-10-1.html')}});">
                <div class="parallax_cover">
                   <img src="{{asset($data->descimg)}}" class="img-fluid" alt="about">
                </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-10 col-md-10 mb-2 mb-xl-0 order-1 order-xl-2">
               <div class="title_all_box style_seven dark_color">
                  <div class="title_sections">
                     <div class="before_title">
                           {{$data->nama}}
                     </div>
                     {{-- <div class="small_text_sub">{{$data->nama}}</div> --}}
                     <div class="title">{{$data->namabrand}}</div>
                  </div>
               </div>
               <div class="description_box">
               {!!$data->deskripsi!!}
               </div>
               @if ($data->cp != null || $data->sosmed != null)
               <div class="d-flex justify-content-center justify-content-xl-start mt-4">
                  @if ($data->cp != null)
                  <div class="theme_btn_all color_one me-4">
                     <a href="https://wa.me/+62{{$data->cp}}" target="_blank" rel="nofollow" class="theme-btn one">Hubungi Kami</a>
                  </div>
                  @endif
                  @if ($data->sosmed != null)
                  <div class="theme_btn_all color_one">
                     <a href="{{$data->sosmed}}" target="_blank" rel="nofollow" class="theme-btn two">Sosial Media</a>
                  </div>
                  @endif
               </div>
               @endif
          </div>
       </div>
    </div>
</section>
@php
    $portofolio = $data->portofolio->count();
@endphp
@if ($portofolio > 0)
<section class="blog_post_section pd_80_60 style_three">
   <div class="auto-container">
      <div class="row justify-content-center">
         <div class="col-sm-12 col-10">
            <div class="title_all_box style_seven dark_color">
               <div class="title_sections">
                  <div class="before_title">
                     {{$data->nama}}
                  </div>
                  {{-- <div class="small_text_sub">{{$data->nama}}</div> --}}
                  <div class="title">Portofolio Kami</div>
               </div>
            </div>
         </div>
      </div>
      <div class="row justify-content-center">
         @foreach ($data->portofolio as $dp)
         <div class="col-lg-4 col-md-6 col-sm-6 col-10">
            <a href="{{route('portfolio.detail',$dp->slug)}}"  class="news_box style_two  has_images">
               <div class="content_box galery-servis">
                  {{-- <div class="overlay"> <s/div> --}}
                  <img  src="{{asset($dp->cover)}}" class="img-fluid" alt="img">
                  <div class="content_mid">
                        <h2 class="title">
                           {{$dp->nama}}
                        </h2>
                  </div>
               </div>
            </a>
         </div>
         @endforeach
      </div>
   </div>

</section>
@endif
@endsection