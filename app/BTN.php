<?php

namespace App;
use App\Models\Mahasiswa;
use DateTime;
use Illuminate\Support\Facades\Http;
use Auth;

class BTN
{
  public static function createbilling($tagihan,$billing)
  {
    $va = auth::user()->mhs->vabtn;
    $data = Mahasiswa::with(['detil'])->where('npm',auth::user()->mhs->npm)->first();
    if ($data->vabtn == null) {
      $nourut = str_pad($data->id, 7, '0', STR_PAD_LEFT);
      $va = '90305003'.date('y').$nourut;
      Mahasiswa::where('id',$data->id)->update([
        'vabtn' => $va
      ]);
    }else{

      $bodya =[
        "ref"=> mt_rand(),
        "va"=> $va,
      ];

      $body = json_encode($bodya);

      $signature = 'UNMAS:'.$body.':KAhnWtFix5pftv6HBHoQRdts0Isg36kT';
      $signature = hash_hmac('SHA256', $signature, 'W0rfS7GSnI');
      $response = Http::withHeaders([
        'Content-Type' => 'application/json',
        'id' => 'UNMAS',
        'key' => 'KAhnWtFix5pftv6HBHoQRdts0Isg36kT',
        'signature' => $signature,
      ])->post('https://vabtn.btn.co.id:9022/v1/unmas/deleteVA', $bodya)->json();
    }

    $bodya =[
      "ref"=> mt_rand(),
      "va"=> $va,
      "nama"=> $data->nama,
      "layanan"=> "UNIVERSITAS MAHASARASWATI DENPASAR",
      "kodelayanan"=> "9030521",
      "jenisbayar"=> "AKADEMIK",
      "kodejenisbyr"=> "001",
      "noid"=> $data->npm,
      "tagihan"=> $tagihan,
      "flag"=> "F",
      "reserve"=> $billing,
      "angkatan"=> "",
      "expired"=> "",
      "description"=> "Pembayaran Akademik"
    ];

    $body = json_encode($bodya);

    $signature = 'UNMAS:'.$body.':KAhnWtFix5pftv6HBHoQRdts0Isg36kT';
    $signature = hash_hmac('SHA256', $signature, 'W0rfS7GSnI');
    $response = Http::withHeaders([
      'Content-Type' => 'application/json',
      'id' => 'UNMAS',
      'key' => 'KAhnWtFix5pftv6HBHoQRdts0Isg36kT',
      'signature' => $signature,
    ])->post('https://vabtn.btn.co.id:9022/v1/unmas/createVA', $bodya)->json();
    return $response;
  }

  public static function getdata($va)
  {
    $bodya =[
      "ref"=> mt_rand(),
      "va"=> $va,
    ];

    $body = json_encode($bodya);

    $signature = 'UNMAS:'.$body.':KAhnWtFix5pftv6HBHoQRdts0Isg36kT';
    $signature = hash_hmac('SHA256', $signature, 'W0rfS7GSnI');
    $response = Http::withHeaders([
      'Content-Type' => 'application/json',
      'id' => 'UNMAS',
      'key' => 'KAhnWtFix5pftv6HBHoQRdts0Isg36kT',
      'signature' => $signature,
    ])->post('https://vabtn.btn.co.id:9022/v1/unmas/inqVA', $bodya)->json();

    return $response;
  }
}
