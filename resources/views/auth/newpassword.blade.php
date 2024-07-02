@extends('layouts.masterreset')

@section('title-head', 'Reset Password')

@section('content')
<div class="content-body">
  <div class="auth-wrapper auth-v1 px-1">
    <div class="auth-inner py-2">
      <div class="card bg-dark mb-0">
        <div class="card-body">
          <a href="javascript:void(0);" class="brand-logo mb-25">
            <img src="{{asset('images/unmas.png')}}" width="50" alt="">
          </a>
          <center>
            <h5 class="text-white">SPMB</h5>
            <p class="card-text text-white mb-2">Silakan Mengisi Password Baru Untuk Mengakses Aplikasi SPMB UNMAS Denpasar</p>
          </center>
          <form class="auth-login-form mt-2" action="{{ route('storePassword') }}" method="POST">
            <input type="hidden" name="id" value="{{$user->id}}">
            <div class="form-group">
              <label for="login-email" class="form-label text-white">Password Baru</label>
              <input type="password" class="form-control" name="password" required autofocus id="password" placeholder="Password Baru">
            </div>

            <div class="form-group">
              <label for="login-email" class="form-label text-white">Ulangi Password Baru</label>
              <input type="password" class="form-control"  name="password" required id="repassword" placeholder="Ulangi Password Baru">
            </div>
            <p class="text-danger" id="textpasssalah"><strong>Password Tidak Sama</strong></p>
            <button type="submit" class="btn btn-danger btn-block" tabindex="4">Reset Password</button>
            @csrf
          </form>
          <div class="divider mt-2">
            <div class="divider-text">UNMAS</div>
          </div>

          <p class="text-center">
            <small class="text-center" style="color: #858585">SPMB &copy; 2022 | <span class="text-info">IT Division</span></small>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')
  <script>
  $('#textpasssalah').hide()

    $('#repassword').on('keyup', function(){
      var password = $('#password').val()
      var repassword = $(this).val()
      if (password === repassword) {
        $('#textpasssalah').hide()
        $('#btnubah').prop('disabled', false);
      }else {
        $('#textpasssalah').show()
        $('#btnubah').prop('disabled', true);
      }
    })
  </script>
@stop
