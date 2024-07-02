@extends('layouts.masterreset')

@section('title-head', 'Reset Password')

@section('content')
<div class="content-body">
  <div class="auth-wrapper auth-v1 px-1">
    <div class="auth-inner py-2">
      <div class="card mb-0">
        <div class="card-body">
          <a href="javascript:void(0);" class="brand-logo mb-25">
            <img src="{{asset('images/patras.png')}}" height="75" alt="">
          </a>
          <center>
            <p class="card-text my-2">Silakan mengisi alamat email yang sudah terdaftar untuk mendapatkan tautan Reset Password</p>
          </center>
          <form class="auth-login-form mt-2" action="{{ route('ResetPassword') }}" method="POST">
            <div class="form-group">
              <label for="login-email" class="form-label">Username / Email</label>
              <input type="text" class="form-control" id="login-email" name="username" placeholder="Username / Email" aria-describedby="login-email" value="{{ old('email') }}" tabindex="1" autofocus required/>
            </div>
            <button type="submit" class="btn btn-danger btn-block" tabindex="4">Reset Password</button>
            @csrf
          </form>
          <p class="text-center mt-2">
            Sudah Ingat Password?<br>
            <a href="{{route('login')}}" class="text-primary"><i data-feather="chevrons-left"></i> Kembali ke Login </a>
          </p>

          <p class="text-center mt-2">
            <small class="text-center" style="color: #858585">PATRAS V.1.0 &copy; 2022 | <a href="http://patrasdev.co.id" target="_blank">Patras Dev</a></small>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
