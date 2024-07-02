@component('mail::message')
  # Halo @if($data['role'] == 3)
  {{$data['siswa']['nama']}}
  @else
  {{$data['pegawai']['nama']}}
  @endif
<p>Seseorang telah meminta pembaruan password pada akun SIAKAD Anda. Jika ini Anda, silahkan klik tombol <b>Reset Password</b>. Jika bukan, abaikan email ini.</p>
@component('mail::button', ['url' => $link])
Reset Password
@endcomponent
<br>
Terima kasih,
<br>
<span>
  <small>SMAS Saraswati 1 Denpasar<br>
  Jalan Kamboja 11 A Denpasar<br>
  Telepon (0361) 263287 | info@slua.sch.id
  </small>
</span>
@endcomponent
