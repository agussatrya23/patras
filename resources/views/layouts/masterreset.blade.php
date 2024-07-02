<!DOCTYPE html>
@php
  Session::put('tema',null);
  if (Session::get('tema') == null && date('H:i') > '18:00') {
    Session::put('tema','b');
  }
  if (Session::get('tema') == null && date('H:i') < '06:00') {
    Session::put('tema','b');
  }
@endphp
<html class="loading {{Session::get('tema') == 'b' ? 'dark-layout' : 'light-layout'}}" lang="en" data-textdirection="ltr">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
  <meta name="description" content="CV. Patras Development">
  <meta name="keywords" content="Patras Development">
  <meta name="author" content="Patras Development">
  <title>Patras Dev | @yield('title-head')</title>
  <link rel="icon" href="{{asset('images/logo.png')}}" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/vendors.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/bootstrap.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/bootstrap-extended.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/colors.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/components.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/dark-layout.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/bordered-layout.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/semi-dark-layout.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-validation.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/page-auth.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/pnotify/pnotify.custom.min.css') }}">

</head>

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
  <div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      @yield('content')
    </div>
  </div>

  <script src="{{asset('app-assets/vendors/js/vendors.min.js')}}"></script>
  <script src="{{asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
  <script src="{{asset('app-assets/js/core/app-menu.js')}}"></script>
  <script src="{{asset('app-assets/js/core/app.js')}}"></script>
  <script src="{{asset('app-assets/js/scripts/pages/page-auth-login.js')}}"></script>
  <script src="{{asset('assets/pnotify/pnotify.custom.min.js') }}"></script>
  @yield('js')
  <script>
    $(window).on('load', function() {
      if (feather) {
        feather.replace({
          width: 14,
          height: 14
        });
      }
    })

    function notifikasi(notif) {
      new PNotify({
        title: notif.title,
        text: notif.text,
        type: notif.type,
        desktop: {
          desktop: true
        }
      }).get().click(function(e) {
        if ($('.ui-pnotify-closer, .ui-pnotify-sticker, .ui-pnotify-closer *, .ui-pnotify-sticker *').is(e.target)) return;
      });
    }

    if ({{ session()->has('notif') ? 1 : 0 }} === 1) {
      notifikasi({!! session('notif') !!});
    }
  </script>
</body>

</html>
