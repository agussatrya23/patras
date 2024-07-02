@extends('layouts.masterreset')
<link href="{{asset('assets/css/argon-dashboard.css?v=1.1.1')}}" rel="stylesheet" />

<style>
body {
  background-color: #f0f2f1 !important;
}
#background {
    position: fixed;
    top: 0px;
    left: 0px;
    width: 100%;
    height: 50%;
    background-image: linear-gradient(135deg, #9e5602, #dd9407, #f7cb1d) !important; 
    z-index: 1;

}
#content {
    position: relative;
    z-index: 2;
    margin-top: 8%;
    padding: 30px;
    /* font-weight: bold;
    font-family: Arial, sans-serif; */
}
</style>
@section('body')

<div class="container-fluid" id="content">
  <div class="row">
    <div class="col-md-6 offset-md-3">
      <div class="card shadow">
        <div class="card-header">
          <h2 class="card-title text-center">RESET PASSWORD</h2>
        </div>
        <div class="card-body">
        <div class="card-title text-center">Silakan isi alamat email yang terdaftar untuk reset password anda!</div>
        <form method="post" action="{{ route('ResetPassword') }}">
            @csrf
            <div class="form-group row">
              <label for="email" class="col-sm-4 col-form-label text-md-right">Email</label>
                <div class="col-md-6">
                    <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                </div>
            </div>
        </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-danger btn-block">Kirim Link Reset Password</button>
          </div>
        </form>
        </div>
      </div>
    </div>    
  </div>
  <div class="col-md-6 offset-md-3 mt-5" style="padding: 0 0 20px 0;">
      <hr class="mb-3">
      <center><span style="font-size: 10px; color: gray;">SIPERI V1.5 - Sistem Informasi Profesi Dokter Gigi.<br>
      Fakultas Kedokteran Gigi Universitas Mahasaraswati Denpasar<br>
      © 2021 Patras Dev</span></center>
  </div>
</div>
<div id="background">
</div>
@stop
@section('js')
  <script>

  </script>
@stop
