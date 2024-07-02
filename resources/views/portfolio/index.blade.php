@extends('layouts.masterweb')

@section('title-head', 'Portofolio')

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
                            <li><a href="{{route('welcome')}}">Beranda</a></li>
                            <li class="active">Portofolio</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="blog_post_section two_column portofolio  style_three pd_80_60">
    <div class="auto-container">
        <div class="grid_show_case grid_layout clearfix">
            @foreach ($portofolio as $p)
            <div class="news_box style_two grid_box _card  has_images">
                <a href="{{route('portfolio.detail',$p->slug)}}" class="content_box">
                    <img src="{{asset($p->cover)}}" class="img-fluid" alt="img">
                    <div class="content_mid">
                        <span class="date_in_number">{{$p->layanan->nama}}</span>
                        <h2 class="title">{{$p->nama}}</h2>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-lg-12">
               <nav aria-label="Page navigation example">
                  <ul class="pagination text-center">
                    {{ $portofolio->appends(request()->input())->links('pagination::custom-pagination') }}
                  </ul>
               </nav>
            </div>
         </div>
    </div>

</section>

<div class="floating_menu_box">
    <form action="{{route('portofolio')}}" method="get">
        <ul class="float_menu_box">
           <li class="floating_menu_text {{ request()->input('layanan') == 'semua' || request()->input('layanan') == '' ? 'active' : '' }}">
              <input type="submit" name="layanan" value="semua" class="d-none">
              <a href="#" class="{{ request()->input('layanan') == 'semua' || request()->input('layanan') == '' ? '' : 'pilihKategori' }}"> Semua </a>
           </li>
           @foreach ($layanan as $lay)    
           <li class="floating_menu_text {{ request()->input('layanan') == $lay->nama ? 'active' : '' }}">
              <input type="submit" name="layanan" value="{{ $lay->nama }}" class="d-none">
              <a href="#" class="{{ request()->input('layanan') == $lay->nama ? '' : 'pilihKategori' }}"> {{$lay->nama}} </a>
           </li>
           @endforeach

        </ul>
        @csrf
    </form>
</div>

@endsection

@section('js')
<script>
    $(document).ready(function () {
        $('.pilihKategori').click(function () {
            $(this).prev('input').click();
        });
    });
</script>
@endsection
