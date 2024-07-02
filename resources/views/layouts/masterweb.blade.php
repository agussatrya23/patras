<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:image" content="{{asset('images/patras.png')}}" />
  	<meta property="og:title" content="CV. Patras Development" />
    <meta property="og:description" content="CV. Patras Development merupakan perusahaan jasa berlokasi di Denpasar, Bali. Perusahaan ini bergerak di bidang IT Developer, Visual Art, Internet dan Jaringan, dan Konveksi." />
    <meta name="keywords" content="Patras Development">
    <meta name="author" content="Patras Development">
    <title>Patras Dev | @yield('title-head')</title>
    <!-- Fav Icon -->
    <link rel="icon" href="{{asset('images/logo.png')}}" type="image/x-icon">
    <!-- Fav Icon -->
    @yield('meta-property')
    <!-- Google Fonts -->
    <link rel='stylesheet'
        href='https://fonts.googleapis.com/css?family=Spartan%3A400%2C500%2C600%2C700%2C800%2C900%7CInter%3A300%2C400%2C500%2C600%2C700%2C800%2C900&amp;subset=latin%2Clatin-ext'
        type='text/css' media='all' />
    <!-- Google Fonts -->
    <!-- Style -->
    <link rel='stylesheet' href='{{asset('assets-web/css/bootstrap.min.css')}}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{asset('assets-web/css/owl.css')}}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{asset('assets-web/css/swiper.min.cs')}}s' type='text/css' media='all' />
    <link rel="stylesheet" href="{{ asset('app-assets/plugins/fancybox/jquery.fancybox.min.css') }}">
    <link rel='stylesheet' href='{{asset('assets-web/css/icomoon.css')}}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{asset('assets-web/css/flexslider.css')}}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{asset('assets-web/css/font-awesome.min.css')}}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{asset('assets-web/css/style.css')}}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{asset('assets-web/css/scss/elements/theme-css.css')}}' type='text/css' media='all' />
    {{-- <link rel='stylesheet' id="creote-color-switcher-css" href='{{asset('assets-web/css/scss/elements/color-switcher/color.css')}}'
        type='text/css' media='all' /> --}}
    <!-- Style-->
    <!----woocommerce---->
    <link rel='stylesheet' href='{{asset('assets-web/css/woocommerce-layout.css')}}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{asset('assets-web/css/woocommerce.css')}}' type='text/css' media='all' />
    <!----woocommerce---->

    @yield('css')
</head>

<body class="home theme-creote page-home-default-one floating-menu">
    <div id="page" class="page_wapper hfeed site">
        <div id="wrapper_full" class="content_all_warpper">
            <!----header----->
            <div class="preloader-wrap">
                <div class="preloader" style="background-image:url({{asset('assets-web/images/preloader-1.gif')}})">
                </div>
                <div class="overlay"></div>
            </div>
            <div class="header_area " id="header_contents">
                <div class="header_boxed style_four">
                    <div class="row">
                        <div class="auto-container">
                            <div class="top_bar style_one">
                                <div class="col-lg-12">
                                    <div class="top_inner">
                                        <div class="left_side common_css">
                                            <div class="contntent email">
                                                <i class="icon-mail"></i>
                                                <div class="text">
                                                    <a href="mailto:patrasdevelopment@gmail.com">patrasdevelopment@gmail.com</a>
                                                </div>
                                            </div>
                                            <div class="contntent phone">
                                                <i class="icon-phone-call"></i>
                                                <div class="text">
                                                    <a href="tel:082146524406">082146524406</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="right_side common_css">
                                            <div class="contntent media">
                                                <div class="text">
                                                    <a href="#" target="_blank" rel="nofollow">
                                                        <i class="fa fa-facebook"></i>
                                                    </a>
                                                    <a href="#" target="_blank" rel="nofollow">
                                                        <i class="fa fa-twitter"></i>
                                                    </a>
                                                    <a href="#" target="_blank" rel="nofollow">
                                                        <i class="fa fa-instagram"></i>
                                                    </a>
                                                    <a href="#" target="_blank" rel="nofollow">
                                                        <i class="fa fa-whatsapp"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <header class="header header_default style_four get_sticky_header">
                                <div class="auto-container">
                                    <div class="row align-items-center navbar-menu">
                                        <div class="col-md-2 col-sm-8 col-8 order-2 order-md-1  logo_column">
                                            <div class="header_logo_box">
                                                <a href="{{route('welcome')}}" class="logo navbar-brand">
                                                    <img src="{{asset('images/patras.png')}}" alt="Patras Dev"
                                                        class="logo_default">
                                                    <img src="{{asset('images/patras.png')}}" alt="Patras Dev"
                                                        class="logo__sticky">
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-2 col-2 order-3 order-md-2 menu_column">
                                            <div class="navbar_togglers hamburger_menu">
                                                <span class="line"></span>
                                                <span class="line"></span>
                                                <span class="line"></span>
                                            </div>
                                            <div class="header_content_collapse menu_nav">
                                                <div class="header_menu_box">
                                                    <div class="navigation_menu">
                                                        <ul id="myNavbar" class="navbar_nav">
                                                            <li class="menu-item nav-item {{ request()->is('/') ? 'active' : '' }}">
                                                                <a href="{{route('welcome')}}" class="dropdown-toggle nav-link">
                                                                    <span>Beranda</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item nav-item  {{ request()->is('/tentang-kami') ? 'active' : '' }}">
                                                                <a href="{{route('tentang')}}" class="dropdown-toggle nav-link">
                                                                    <span>Tentang Kami</span>
                                                                </a>
                                                            </li>
                                                            <li class="menu-item menu-item-has-children dropdown nav-item {{ request()->is('/layanan') ? 'active' : '' }}">
                                                                <a href="#" class="dropdown-toggle nav-link">
                                                                   <span>Layanan</span>
                                                                </a>
                                                                <ul class="dropdown-menu">
                                                                    @php
                                                                        $layanan = App\Models\Layanan::orderby('id','asc')->get();
                                                                    @endphp
                                                                    @foreach ($layanan as $l)
                                                                    <li class="menu-item nav-item">
                                                                       <a href="{{route('layanan',$l->slug)}}" class="dropdown-item nav-link">
                                                                          <span>{{$l->nama}}</span>
                                                                       </a>
                                                                    </li>
                                                                    @endforeach
                                                                </ul>
                                                             <div class="dropdown-btn"><span class="fa fa-angle-down"></span></div></li>
                                                            <li
                                                                class="menu-item nav-item  {{ request()->is('/portofolio*') ? 'active' : '' }}">
                                                                <a href="{{route('portofolio')}}" class="dropdown-toggle nav-link">
                                                                    <span>Portofolio</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-2 order-1 order-md-3 menu_column">
                                            <div class="header_content_collapse">
                                                <div class="header_right_content">
                                                    <div class="style-switcher">
                                                        <a href="https://wa.me/+6282146524406" target="_blank" class="contact-toggler"><i class="fa fa-whatsapp"></i></a>
                                                        {{-- <div class="lang-bar">
                                                            <ul id="colorschemeOptions" title="Switch Color" data-css-path="assets/css/scss/elements/color-switcher/">
                                                               <li>
                                                                  <a href="#" data-theme="color" style="background-image: url('{{asset('assets-web/images/flag/id.svg')}}');"> </a>
                                                               </li>
                                                               <li>
                                                                  <a href="#" data-theme="color1" style="background-image: url('{{asset('assets-web/images/flag/en.svg')}}');"> </a>
                                                               </li>
                                                            </ul>
                                                        </div> --}}
                                                     </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </header>
                        </div>
                    </div>
                </div>
            </div>
            <!----header----->
            <!----page-CONTENT----->
            <div id="content" class="site-content ">

                @yield('content')

            </div>
        </div>
        <section class="contact-section pd_40_40 bg_dark_1">
            <div class="auto-container">
               <div class="row align-items-center justify-content-center">
                  <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-xs-12 mb-4 mb-lg-0">
                     <div class="title_all_box style_one contact-us light_color">
                        <div class="title_sections text-center text-lg-start">
                           <div class="title pb-0">Jangan Sungkan, Mari Berkenalan</div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-lg-4 col-md-5 col-sm-6 col-10">
                     <div class="theme_btn_all">
                        <a href="https://wa.me/+6282146524406" target="_blank" class="theme-btn btn-contact">
                            <div class="d-flex align-items-center">
                                <div class="icon-wa">
                                    <span class="fa fa-whatsapp"></span>
                                </div>
                                <div class="text-wa">Hubungi Kami
                                </div>
                            </div>
                        </a>
                     </div>
                  </div>
               </div>
            </div>
        </section>
        <div class="footer_area footer_five bg_dark_2" id="footer_contents">
            <div class="footer_widgets_wrap">
                <div class="auto-container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-md-12">
                            <div class="footer_map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3944.41710623131!2d115.21794317524927!3d-8.651820388011913!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd24143d013629d%3A0xbc7900ed4766428e!2sPatras%20Development!5e0!3m2!1sid!2sid!4v1697701243844!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="footer_widgets wid_tit style_one mt-3">
                                <div class="fo_wid_title">
                                   <h2>CV. Patras Development</h2>
                                </div>
                             </div>
                            <div class="footer_contact_list light_color type_one">
                                <div class="same_contact phone d-flex align-items-center">
                                    <span class="icon-telephone"></span>
                                    <div class="content">
                                        <h6 class="titles">Telepon</h6>
                                        <a href="tel:082146524406 ">0821 4652 4406 </a>
                                    </div>
                                </div>
                            </div>
                            <div class="footer_contact_list light_color type_one">
                                <div class="same_contact mail d-flex align-items-center">
                                    <span class="icon-mail"></span>
                                    <div class="content">
                                        <h6 class="titles">Email</h6>
                                        <a href="mailto:">patrasdevelopment@gmail.com</a>
                                    </div>
                                </div>
                            </div>
                            <div class="footer_contact_list light_color type_one">
                                <div class="same_contact address d-flex align-items-center">
                                    <span class="icon-location2"></span>
                                    <div class="content">
                                        <h6 class="titles">Jam Operasional</h6>
                                        <p class="mb-0">Senin - Sabtu : 09.00 s/d 17.00 WITA</p>
                                    </div>
                                </div>
                            </div>

                            <div class="footer_widgets about_company">
                                <div class="about_company_inner">
                                   <div class="content_box">
                                     <p class="mb-3 mt-4"> Kunjungi Sosial Media Kami</p>
                                     <div class="social_media_v_one light">
                                         <ul>
                                             <li>
                                                 <a href="#"> <span class="fa fa-facebook"></span>
                                                     <small>facebook</small>
                                                 </a>
                                             </li>
                                             <li>
                                                 <a href="#"> <span class="fa fa-twitter"></span>
                                                     <small>twitter</small>
                                                 </a>
                                             </li>
                                             <li>
                                                 <a href="#"> <span class="fa fa-instagram"></span>
                                                     <small>instagram</small>
                                                 </a>
                                             </li>
                                             <li>
                                                 <a href="#"> <span class="fa fa-linkedin"></span>
                                                     <small>linkedin</small>
                                                 </a>
                                             </li>
                                         </ul>
                                     </div>
                                   </div>
                                </div>
                             </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            
            <div class="footer-copyright bg_dark_2">
                <div class="auto-container">
                    <div class="footer_copy_right">
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-md-6 col-sm-12 text-center">
                                <div class="footer_copy_content">© Copyright <b>Patras Dev</b>. All Rights Reserved</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!---==============footer end =================-->
        <!---==============mobile menu =================-->
        <div class="crt_mobile_menu">
            <div class="menu-backdrop"></div>
            <nav class="menu-box">
                <div class="close-btn"><i class="icon-close"></i></div>
                <div class="menu-outer">
                    <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                </div>
            </nav>
        </div>
        <!---==============mobile menu end =================-->
        <!---==============search popup =================-->
        <div id="search-popup" class="search-popup">
            <div class="close-search"><i class="fa fa-times"></i></div>
            <div class="popup-inner">
                <div class="overlay-layer"></div>
                <div class="search-form">
                    <fieldset>
                        <form role="search" method="get" action="#">
                            <input type="search" class="search" placeholder="Search..." value="" name="s"
                                title="Search" />
                            <button type="submit" class="sch_btn"> <i class="icon-search"></i></button>
                        </form>
                    </fieldset>
                </div>
            </div>
        </div>
        <!---==============search popup end =================-->

    </div>
    <!-- Back to top with progress indicator-->
    <div class="prgoress_indicator">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!---========================== javascript ==========================-->
    <script type='text/javascript' src='{{asset('assets-web/js/jquery-3.6.0.min.js')}}'></script>
    <script type='text/javascript' src='{{asset('assets-web/js/bootstrap.min.js')}}'></script>
    <script type='text/javascript' src='{{asset('assets-web/js/jQuery.style.switcher.min.js')}}'></script>
    <script type='text/javascript' src='{{asset('assets-web/js/jquery.flexslider-min.js')}}'></script>
    <script type='text/javascript' src='{{asset('assets-web/js/color-scheme.j')}}s'></script>
    <script type='text/javascript' src='{{asset('assets-web/js/owl.js')}}'></script>
    <script type='text/javascript' src='{{asset('assets-web/js/swiper.min.js')}}'></script>
    <script type='text/javascript' src='{{asset('assets-web/js/isotope.min.js')}}'></script>
    <script type='text/javascript' src='{{asset('assets-web/js/countdown.js')}}'></script>
    <script type='text/javascript' src='{{asset('assets-web/js/simpleParallax.min.js')}}'></script>
    <script type='text/javascript' src='{{asset('assets-web/js/appear.js')}}'></script>
    <script type='text/javascript' src='{{asset('assets-web/js/jquery.countTo.js')}}'></script>
    <script type='text/javascript' src='{{asset('assets-web/js/sharer.js')}}'></script>
    <script type='text/javascript' src='{{asset('assets-web/js/validation.js')}}'></script>
    <script src="{{ asset('app-assets/plugins/fancybox/jquery.fancybox.js') }}"></script>
    <!-- map script -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA-CE0deH3Jhj6GN4YvdCFZS7DpbXexzGU"></script>
    <script src="{{asset('assets-web/js/gmaps.js')}}"></script>
    <script src="{{asset('assets-web/js/map-helper.js')}}"></script>
    <!-- main-js -->
    <script type='text/javascript' src='{{asset('assets-web/js/creote-extension.js')}}'></script>
    <!---========================== javascript ==========================-->

    
    <script>
        $('.lightbox-image').fancybox({
            openEffect  : 'fade',
            closeEffect : 'fade',
            helpers : {
                media : {}
            }
        });
    </script>

    @yield('js')

</body>

</html>
