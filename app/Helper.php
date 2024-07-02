<?php

namespace App;
use App\Models\MdHari;
use App\Models\MdBulan;
use Illuminate\Support\Facades\Http;
use DateTime;
use auth;
class Helper
{


  public static function tanggal($tgl)
  {
    if ($tgl == null) {
      return '';
    }
    $bulan = date('n',strtotime($tgl));
    $b = MdBulan::where('id',$bulan)->pluck('nama')->first();
    $t = date('j',strtotime($tgl));
    $ta = date('Y',strtotime($tgl));
    return $t.' '.$b.' '.$ta;
  }

  public static function haritanggal($tgl)
  {
    if ($tgl == null) {
      return '';
    }
    $hari = date('w',strtotime($tgl));
    $bulan = date('n',strtotime($tgl));
    $h = MdHari::where('id',$hari)->pluck('nama')->first();
    $b = MdBulan::where('id',$bulan)->pluck('nama')->first();
    $t = date('j',strtotime($tgl));
    $ta = date('Y',strtotime($tgl));
    return $h.', '.$t.' '.$b.' '.$ta;
  }

  public static function lamamengajar($data)
  {
    if ($data == '') {
      return 'Belum ditentukan';
    }
    $date1 = new DateTime($data);
    $date2 = new DateTime(date('Y-n-d'));
    $diff  = $date1->diff($date2);
    if ($diff->format('%y') == 0) {
      $lama = $diff->format('%m').' Bulan';
    }else {
      $lama = $diff->format('%y').' Tahun '.$diff->format('%m').' Bulan';
    }

    return $lama;
  }
}
