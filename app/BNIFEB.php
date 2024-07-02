<?php

namespace App;
use App\Bank\BniEnc;

use App\Models\Mahasiswa;
use DateTime;
use Auth;

class BNIFEB
{
    private $client_id;
    private $secret_key;
    public function __construct()
    {
      $client_id = '28886';
      $secret_key = 'fe3a3186e5e7e4008260bd7a2f7799b9';
      $url = 'https://api.bni-ecollection.com/';

      // $client_id = '06672';
      // $secret_key = 'e5ebc28fcb6fb6146add5fe672a307c0';
      // $url = 'https://apibeta.bni-ecollection.com/';
    }

    public static function createVa($biaya)
    {
      $client_id = '28886';
      $secret_key = 'fe3a3186e5e7e4008260bd7a2f7799b9';
      $url = 'https://api.bni-ecollection.com/';

      $data = Mahasiswa::with(['detil'])->where('npm',auth::user()->mhs->npm)->first();
      $nourut = str_pad($data->id, 6, '0', STR_PAD_LEFT);
      $va = '988'.$client_id.date('y').$nourut;
      $data_asli = array(
        'client_id' => $client_id,
        'trx_id' => mt_rand(),
        'trx_amount' => $biaya,
        'billing_type' => 'c',
        'datetime_expired' => date('c', time() + 168 * 3600),
        'virtual_account' => $va,
        'customer_name' => $data->nama,
        'customer_email' => $data->email,
        'customer_phone' => $data->detil->telpon,
        'type' => 'createBilling'
      );

      return BniEnc::execution($data_asli,$client_id,$secret_key,$url);
    }

    public static function getdata($billing)
    {
      $client_id = '28886';
      $secret_key = 'fe3a3186e5e7e4008260bd7a2f7799b9';
      $url = 'https://api.bni-ecollection.com/';
      $data_asli = array(
        'trx_id' => $billing,
        'client_id' => $client_id,
        'type' => 'inquirybilling'
      );

      return BniEnc::execution($data_asli,$client_id,$secret_key,$url);
    }

    public static function deletetagihan($billing,$tagihan)
    {
      $client_id = '28886';
      $secret_key = 'fe3a3186e5e7e4008260bd7a2f7799b9';
      $url = 'https://api.bni-ecollection.com/';

      $data_asli = array(
        'type' => 'updateBilling',
        'trx_id' => $billing,
        'client_id' => $client_id,
        'trx_amount' =>$tagihan,
        'datetime_expired' => '2020-01-01T23:00:00+07:00',
        'customer_name'=>auth::user()->mhs->nama,
      );

      return BniEnc::execution($data_asli,$client_id,$secret_key,$url);
    }

    public static function createbilling($biaya)
    {
      $client_id = '28886';
      $secret_key = 'fe3a3186e5e7e4008260bd7a2f7799b9';
      $url = 'https://api.bni-ecollection.com/';

      $data = Mahasiswa::with(['detil','vaprodibni'])->where('npm',auth::user()->mhs->npm)->first();
      $data_asli = array(
        'type' => 'createbilling',
        'client_id' => $client_id,
        'trx_id' => mt_rand(),
        'trx_amount' => $biaya,
        'billing_type' => 'c',
        'customer_name' => $data->nama,
        'customer_email' => $data->email,
        'customer_phone' => $data->telpon,
        'virtual_account' => $data->vaprodibni->va,
        'datetime_expired' => date('c', time() + 168 * 3600),
        'description' => 'Pembayaran Tagihan '.$data->nama,
      );

      return BniEnc::execution($data_asli,$client_id,$secret_key,$url);
    }

    public static function ddecode()
    {
      $data_asli = array(
        'trx_id' => 31615696823,
        'virtual_account' => 8430000318101001,
        'customer_name' => 'Abdurahman',
        'trx_amount' => 1050000,
        'payment_amount'=>1050000,
        'culmulative_payment_amount'=>1050000,
        'date_payment'=>'2019-02-07 20:05:00'
      );

      return BniEnc::encrypt($data_asli,$client_id,$secret_key);
    }
}
