@extends('layouts.masterweb')

@section('title-head', 'Tentang Kami')

@section('content')
<div class="page_header_default style_one">
    <div class="parallax_cover">
       <div class="simpleParallax"><img src="{{asset('assets-web/images/page-banner-2.jpg')}}" alt="bg_image" class="cover-parallax"></div>
    </div>
    <div class="page_header_content">
       <div class="auto-container">
          <div class="row">
             <div class="col-md-12">
                <div class="banner_title_inner">
                   <div class="title_page">
                      Tentang Kami
                   </div>
                </div>
             </div>
             <div class="col-lg-12">
                <div class="breadcrumbs creote">
                   <ul class="breadcrumb m-auto">
                      <li><a href="{{route('welcome')}}">Beranda</a></li>
                      <li class="active">Tentang Kami</li>
                   </ul>
                </div>
             </div>
          </div>
       </div>
    </div>
</div>


<section class="content-section pd_80_60">
    <div class="auto-container">
       <div class="row align-items-center justify-content-center">
          <div class="col-xl-6 col-lg-10 col-md-10 mb-2 mb-xl-0 ">
             <div class="title_all_box style_seven text_shadow about-us dark_color pe-0 pe-xl-4">
                <div class="title_sections">
                   <div class="title">Siapa Kami?</div>
                   <div class="description_box">
                      <p><b>CV. Patras Development</b> merupakan perusahaan jasa berlokasi di Denpasar, Bali. Perusahaan ini bergerak di bidang IT Developer, Visual Art, Internet dan Jaringan dan Konveksi. </p>
                      <p>Kami memulai bisnis pada tahun 2018 dan telah sukses membantu ribuan klien dengan berbagai solusi yang inovatif dan layanan berkualitas. </p>
                   </div>
                </div>
             </div>
          </div>
          <div class="col-xl-6 col-lg-10 col-md-10">
             <div class="simple_image_boxes style_two bg_op_1"
                style="background-image: url({{asset('assets-web/images/banner-bgs-10-1.html')}});">
                <div class="parallax_cover">
                   <img src="{{asset('assets-web/images/about/about-us.jpg')}}" class="img-fluid" alt="about">
                </div>
             </div>
          </div>
       </div>
    </div>
</section>

<section class="contact-section bg_light_1 bg_op_1">
    <div class="auto-container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-5 col-md-6 col-8 order-2 order-lg-1">
                <div class="image_box mr_top_minus_50 text-center">
                    <img src="{{asset('assets-web/images/direktur-image.png')}}" class="img-fluid" alt="consult" />
                </div>
            </div>
            <div class="col-lg-7 col-md-10 order-1 order-lg-2">
               <div class="pd_40_40">
                  <div class="title_all_box style_six visi dark_color">
                      <div class="title_sections">
                          <div class="before_title">
                              Visi Kami
                          </div>
                          <div class="title">"Menjadi perusahaan berbasis Teknologi dan Informasi dengan Sumber Daya Manusia yang professional"</div>
                      </div>
                  </div>
                  <div class="title_all_box style_six visi dark_color">
                      <div class="title_sections">
                          <div class="before_title">
                              Misi Kami
                          </div>
                      </div>
                  </div>
                  <div class="process_box style_one dark_color misi">
                      <div class="process_box_outer">
                         <div class="icon">
                            <div class="number"> 01 </div>
                         </div>
                         <div class="content_box">
                            <p>Menjamin kualitas pelayanan dan produk yang sesuai dengan kebutuhan konsumen.</p>
                         </div>
                      </div>
                  </div>
                  <div class="process_box style_one dark_color misi">
                      <div class="process_box_outer">
                         <div class="icon">
                            <div class="number"> 02 </div>
                         </div>
                         <div class="content_box">
                            <p>Meningkatkan kualitas sumber daya manusia dan relasi bisnis yang meningkatkan daya saing.</p>
                         </div>
                      </div>
                  </div>
                  <div class="process_box style_one dark_color misi">
                      <div class="process_box_outer">
                         <div class="icon">
                            <div class="number"> 03 </div>
                         </div>
                         <div class="content_box">
                            <p>Mendukung berbagai kebutuhan konsumen dengan mengedepankan kenyamanan konsumen dan Sumber Daya Manusia Perusahaan.</p>
                         </div>
                      </div>
                  </div>
               </div>
            </div>
        </div>
    </div>
</section>

<!---team--->
<section class="team pd_80_60">
   <div class="auto-container">
      <div class="row align-items-end">
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="title_all_box style_seven text_shadow dark_color">
               <div class="title_sections">
                  <div class="title text-center">Tim Kami</div>
               </div>
            </div>
         </div>
      </div>
      <div class="row justify-content-center">
         @foreach ($pegawai as $p)
         <div class="col-lg-3 col-md-4 col-sm-6 col-10">
            <div class="team_box style_one">
               <div class="team_box_outer">
                  <div class="member_image">
                     <img src="{{asset($p->foto)}}" alt="team image" />
                  </div>
                  <div class="about_member">
                     <div class="authour_details">
                        <span>{{$p->layanan->nama}} </span>
                        <h6>{{$p->panggilan}}</h6>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         @endforeach
      </div>
   </div>
</section>
<!---team-end--->

@endsection