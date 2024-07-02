@extends('layouts.masterweb')

@section('title-head', 'Home')

@section('css')

<style>
    .date a.video {
        width: 23px;
        content: url({{asset('assets-web/images/reel.png')}});
    }

    .date a.album {
        width: 23px;
        content: url({{asset('assets-web/images/album.png')}});
    }
</style>
@endsection

@section('content')
<!--- slider-->
{{-- <section class="slider style_page_thirteen nav_position_one position-relative">
    <div class="banner_carousel owl-carousel owl_nav_block owl_dots_none theme_carousel owl-theme"
        data-options='{"loop": true, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 7000, "smartSpeed": 1800, "responsive":{ "0" :{ "items": "1" }, "768" :{ "items" : "1" } , "1000":{ "items" : "1" }}}'>

        <div class="slide-item-content">
            <div class="slide-item content_center">
                <div class="image-layer"
                    style="background-image:url({{asset('assets-web/images/sliders/slider-4-1.jpg')}})">
                </div>
                <div class="auto-container">
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 m-auto">
                            <div class="slider_content">
                                <h1 class="animate_up">
                                    Patras Dev
                                </h1>
                                <p class="animate_right pd_bottom_40">
                                    Profesional, Berpengalaman, dan Mengedepankan kenyamanan konsumen.
                                </p>
                                <ul class="animate_down">
                                    <li class="theme_btn_all color_two">
                                        <a href="{{route('tentang')}}" class="theme-btn one">Tentang Kami</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="slide-item-content">
            <div class="slide-item content_center">
                <div class="image-layer"
                    style="background-image:url({{asset('assets-web/images/sliders/slider-4-2.jpg')}})">
                </div>
                <div class="auto-container">
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 m-auto">
                            <div class="slider_content">
                                <h2 class="animate_up">
                                    Patras Dev adalah pintu menuju dunia online Anda
                                </h2>
                                <ul class="animate_down">
                                    <li class="theme_btn_all">
                                        <a href="#" class="theme-btn one color_white">Layanan</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="slide-item-content">
            <div class="slide-item content_center">
                <div class="image-layer"
                    style="background-image:url({{asset('assets-web/images/sliders/slider-4-2.jpg')}})">
                </div>
                <div class="auto-container">
                    <div class="row align-items-center">
                        <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12 m-auto">
                            <div class="slider_content">
                                <h2 class="animate_up">
                                    Kami adalah jembatan yang menghubungkan impian Anda menjadi kenyataan
                                </h2>
                                <ul class="animate_down">
                                    <li class="theme_btn_all">
                                        <a href="{{route('portofolio')}}" class="theme-btn one color_white">Portofolio</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section> --}}
<!---slider-end--->

<!--- slider-->
<section class="slider style_page_twelve nav_position_one">
    <div class="banner_carousel owl-carousel owl_nav_block owl_dots_none theme_carousel owl-theme"
    data-options='{"loop": true, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": true, "autoplayTimeout": 7000, "smartSpeed": 1800, "responsive":{ "0" :{ "items": "1" }, "768" :{ "items" : "1" } , "1000":{ "items" : "1" }}}'>

       <div class="slide-item-content">
          <div class="slide-item content_left">
             <div class="image-layer" style="background-image: url({{asset('assets-web/images/sliders/slider-7-bg.jpg')}})">
             </div>
             <div class="auto-container">
                <div class="row align-items-center justify-content-center">
                   <div class="col-xl-6 col-lg-7 col-md-7 col-sm-10 col-xs-12 col-12 order-2 order-md-1 ">
                      <div class="slider_content">
                         <h1 class="animate_up">PATRAS DEV</h1>
                         <p class="animate_right">Profesional, Berpengalaman, dan Mengedepankan kenyamanan konsumen</p>
                            <div class="animate_down theme_btn_all">
                               <a href="{{route('tentang')}}" class="theme-btn one">Tentang Kami</a>  
                            </div>
                      </div>
                   </div>
                   <div class="col-xl-6 col-lg-5 col-md-5 col-sm-6 order-1 col-9 order-md-2 ">
                      <div class="slider_image animate_left">
                         <img src="{{asset('assets-web/images/sliders/slider-3.jpg')}}" class="img-fluid" alt="img" />
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <div class="slide-item-content">
          <div class="slide-item content_left">
             <div class="image-layer" style="background-image: url({{asset('assets-web/images/sliders/slider-7-bg.jpg')}})">
             </div>
             <div class="auto-container">
                <div class="row align-items-center justify-content-center">
                   <div class="col-xl-6 col-lg-7 col-md-7 col-sm-10 col-xs-12 col-12 order-2 order-md-1">
                      <div class="slider_content">
                         <h1 class="animate_up long-text">PINTU MENUJU DUNIA DIGITAL</h1>
                         <p class="animate_right">Kami memberikan layanan yang cepat, tepat, dan pastinya harga bersahabat</p>
                            <div class="animate_down theme_btn_all">
                               <a href="#layanan" class="theme-btn one">Layanan</a>  
                            </div>
                      </div>
                   </div>
                   <div class="col-xl-6 col-lg-5 col-md-5 col-sm-6 col-9 order-1 order-md-2">
                      <div class="slider_image animate_right">
                         <img src="{{asset('assets-web/images/sliders/slider-2.jpg')}}" class="img-fluid" alt="img" />
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
       <div class="slide-item-content">
          <div class="slide-item content_left">
             <div class="image-layer" style="background-image: url({{asset('assets-web/images/sliders/slider-7-bg.jpg')}})">
             </div>
             <div class="auto-container">
                <div class="row align-items-center justify-content-center">
                   <div class="col-xl-6 col-lg-7 col-md-7 col-sm-10 col-xs-12 col-12 order-2 order-md-1">
                      <div class="slider_content">
                         <h1 class="animate_up long-text">JEMBATAN IMPIAN MENJADI KENYATAAN</h1>
                         <p class="animate_right">Setiap halaman adalah cerita yang memukau, jangan lewatkan pengalaman tak terlupakan</p>
                            <div class="animate_down theme_btn_all">
                               <a href="{{route('portofolio')}}" class="theme-btn one">Portofolio</a>  
                            </div>
                      </div>
                   </div>
                   <div class="col-xl-6 col-lg-5 col-md-5 col-sm-6 col-9 order-1 order-md-2 col-xs-12">
                      <div class="slider_image animate_right">
                         <img src="{{asset('assets-web/images/sliders/slider-1.jpg')}}" class="img-fluid" alt="img" />
                      </div>
                   </div>
                </div>
             </div>
          </div>
       </div>
   
    </div>
</section>
<!---slider-end--->

<section id="layanan" class="service-section-one pd_80_60">
    <div class="auto-container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="title_all_box style_seven text-center dark_color">
                    <div class="title_sections">
                        <div class="before_title">
                            Layanan
                        </div>
                        <div class="small_text_sub">Layanan</div>
                        <div class="title">Buat Hidup Anda ke Tingkat Baru</div>
                    </div>
                </div>
            </div>
            @foreach ($layanan as $l)     
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-11">
                <a href="{{route('layanan',$l->slug)}}" class="service_box style_four dark_color">
                    <div class="service_content">
                        <div class="image_box">
                            <img src="{{asset($l->coverimg)}}" class="img-fluid" alt="Service Image">
                        </div>
                        <div class="content_inner">
                            <h2>{{$l->nama}}</h2>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!----about---->
<section class="contact-client-carousel-section">
    <div class="row">
        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-5 col-sm-12 bg_op_1 order-2 order-md-1"
            style="background: url({{asset('assets-web/images/about-image.jpg')}});">
        </div>
        <div class="col-xl-6 col-lg-6 col-md-7 col-sm-12 order-1 order-md-2 about-pd">
            <div class="row bg_dark_2">
                <div class="col-lg-1 d-none d-lg-block"></div>
                <div class="col-xl-9 col-lg-10 col-md-12">
                    <div class="client-brand-wrapper pd_80_80">
                        <div class="title_all_box style_seven light_color px-4 px-lg-0">
                            <div class="title_sections">
                                <div class="title"> Siapa Kami ?</div>
                                <div class="description_box">
                                    <p>
                                        <b>CV. Patras Development</b> merupakan perusahaan jasa berlokasi di Denpasar, Bali. Perusahaan ini bergerak di bidang IT Developer, Visual Art, Internet dan Jaringan, dan Konveksi. 
                                    </p>
                                    <p>
                                        Kami memulai bisnis pada tahun 2018 dan telah sukses membantu ribuan klien dengan berbagai solusi yang inovatif dan layanan berkualitas. 
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!----about end---->

<!--content-->
<section class="content-section pd_80_60">
    <div class="auto-container">
       <div class="row align-items-center justify-content-center">
          <div class="col-xl-6 col-lg-10 col-11 mb-4 mb-xl-0">
             <div class="title_all_box style_one dark_color">
                <div class="title_sections">
                   <h2 class="title mb-3"> Kenapa Patras Dev?</h2>
                </div>
             </div>
             <div class="icon_box_all style_six">
                <div class="icon_content d-flex">
                   <div class="icon">
                      <span class="icon-thumbs-up mb-0"></span>
                   </div>
                   <div class="text_box">
                      <h2><a href="#">Harga Terjangkau</a></h2>
                      <p>Kami menciptakan layanan yang berkualitas didukung teknologi terbaru dengan harga yang terjangkau. Jika layanan yang kami tawarkan cukup mahal, maka kami akan menyesuaikan dengan budget Anda.</p>
                   </div>
                </div>
             </div>

             <div class="icon_box_all style_six">
                <div class="icon_content d-flex">
                   <div class="icon">
                      <span class="icon-united mb-0"></span>
                   </div>
                   <div class="text_box">
                      <h2><a href="#">Disesuaikan dengan kebutuhan Anda</a></h2>
                      <p>Kami sangat fleksibel dalam menyesuaikan diri dengan kebutuhan proyek Anda. Kami akan bekerja sama dengan Anda untuk memahami persyaratan dan merancang solusi yang sesuai.</p>
                   </div>
                </div>
             </div>

             <div class="icon_box_all style_six">
                <div class="icon_content d-flex">
                   <div class="icon">
                      <span class="icon-solution mb-0"></span>
                   </div>
                   <div class="text_box">
                      <h2><a href="#">Dedikasi untuk keberhasilan Anda </a></h2>
                      <p>Kesuksesan bisnis Anda adalah prioritas kami. Kami akan bekerja keras untuk memastikan bahwa proyek pengembangan kami menghasilkan hasil yang diharapkan.</p>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-xl-6 col-lg-10  d-none d-lg-block">
            <div class="creote-image-box image-box-overlap">
               <div class="image_boxes style_eight">
                  <img src="{{asset('assets-web/images/why-images.jpg')}}"
                     class="img-fluid image_fit height_500px ps-0 ps-xl-5" alt="img">
               </div>
            </div>
         </div>
       </div>
    </div>
</section>
<!--content-->

<!----client---->
<section class="client-section bg_light_1">
    <div class="auto-container">
        <div class="row align-items-center">
            <div class="col-lg-3">
                <div class="newsteller style_one">
                    <div class="content ">
                        <h2>Klien Kami</h2>
                        {{-- <p>For receiving our news and updates in your inbox directly. </p> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="client_logo_carousel type_three">
                    <div class="swiper-container" data-swiper='{
                  "autoplay": {
                    "delay": 3000
                  },
                  "freeMode": false,
                  "loop": true,
                  "speed": 1000,
                  "centeredSlides": false,
                  "slidesPerView": 5,
                  "spaceBetween": 30,
                  "pagination": {
                    "el": ".swiper-pagination",
                    "clickable": true
                  },
                   
                  "breakpoints": {
                     "1200": {
                        "slidesPerView": 5
                     },
                     "1024": {
                      "slidesPerView": 4
                     },
                    "768": {
                      "slidesPerView": 4
                    },
                    "576": {
                      "slidesPerView": 3
                    },
                    "0": {
                      "slidesPerView": 2
                    }
                  }
                }'>
                        <div class="swiper-wrapper">
                            @foreach ($klien as $k)
                            <div class="swiper-slide">
                                <a href="{{$k->link != null ? $k->link:'#'}}" class="image">
                                    <img src="{{asset($k->logo)}}" alt="clients-logo">
                                </a>
                            </div>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!----client end---->


<!----project---->
<section class="blog_post_section pd_80_60 three_column style_four masonary_enable">
    <div class="auto-container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title_all_box style_seven text-center dark_color">
                    <div class="title_sections">
                        <div class="before_title">
                            Portofolio
                        </div>
                        <div class="small_text_sub">Portofolio</div>
                        <div class="title"> Hasil Karya Kami</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="project_all filt_style_six  filter_enabled ">
            <div class="row">
                <div class="col-lg-12">
                    <div class="fliter_group" style="text-align:center!important;">
                        <ul class="project_filter dark clearfix">
                            <li data-filter="*" class="current">All</li>
                            @foreach ($layanan as $fil_item)
                                
                            <li data-filter=".fil-{{$fil_item->id}}">{{$fil_item->nama}}</li>
                            @endforeach
                            {{-- <li data-filter=".software">Software</li>
                            <li data-filter=".hardware">Hardware</li>
                            <li data-filter=".convection">Convection</li>
                            <li data-filter=".networking">Networking</li> --}}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="project_container grid_show_case grid_layout clearfix">
                @forelse ($portofolio as $p)
                <a href="{{route('portfolio.detail', $p->slug)}}" class="project-wrapper grid-item grid_box _card style_man fil-{{$p->idlayanan}}">
                    <div class="portfolio_image">
                        <img src="{{asset($p->cover)}}" alt="">
                        <div class="portfolio_content">
                            <div class="content_box">
                                <div class="category">
                                    <span class="categories">{{$p->layanan->nama}}</span>
                                </div>
                                <h2 class="title">{{$p->nama}}</h2>
                            </div>
                        </div>
                    </div>
                </a>
                @empty
                    
                @endforelse
            </div>
        </div>
    </div>
</section>
<!----project-end---->



<section class="blog-section pd_80_60 bg_light_1">
    <div class="auto-container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title_all_box style_seven text-center dark_color">
                    <div class="title_sections">
                        <div class="before_title">
                            Instagram
                        </div>
                        <div class="small_text_sub">Instagram</div>
                        <div class="title">@patrasdevelopment</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row gutter_15px">
            <div class="col-lg-12">
               <div class="blog_post_section  style_four ">
                  <div class="row justify-content-center" id="instafeed-container">
                  </div>
               </div>
            </div>
         </div>
    </div>
</section>



@endsection

@section('js')
<script>
    const urlAsset = '{{ asset('assets-web/') }}';
</script>
@include('feedig')
@endsection
