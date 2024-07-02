<?php
namespace App\excelimport;
use App\Models\Krs;
use App\Models\KrsDetil;
use App\Models\DosenBobotNilai;
use App\Models\BobotCpl;
use App\Models\MdNilai;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Helper;
use Session;
use auth;
class uploadnilai implements ToCollection
{
  public function __construct($data, $idta)
  {
      $this->data = $data;
      $this->idta = $idta;
  }

    public function collection(Collection $rows)
      {
          $no = 0;
          $success = 0;
          $idjadwal = $this->data;
          $idta = $this->idta;
          $bobot = DosenBobotNilai::first();
          $bobotcpl = BobotCpl::first();

          foreach ($rows as $row)
          {
            if ($no > 0 && $row[0] != '') {

              $idkrs = Krs::where('idta',$idta)->where('npm',$row[0])->pluck('id')->first();
              // if ($row[0] == '2004741010015') {
              //   dd($idkrs);
              // }
              $nkehadiran = $row[2] * $bobot->kehadiran / 100;

              $nkeaktifan = $row[3] * $bobot->keaktifan / 100;

              $ntugas = $row[4] * $bobot->tugas / 100;

              $nuas = $row[6] * $bobot->uas / 100;

              $nuts = $row[5] * $bobot->uts / 100;

              $total = $nkehadiran + $nkeaktifan + $ntugas + $nuts + $nuas;
              $huruf = MdNilai::where('status',1)->get();
              foreach ($huruf as $h) {
                if ($total >= $h->dari && $total <= $h->sampai) {
                  $nilaihuruf = $h->huruf;
                }
              }

              $kehadiransikap = $bobotcpl->kehadiransikap * $row[2] / 100;
              $keaktifansikap = $bobotcpl->keaktifansikap * $row[3] / 100;
              $ketrampilanumum = $bobotcpl->ketrampilanumum * $row[3] /100;
              $tugaspengetahuan = $bobotcpl->tugaspengetahuan * $row[4] / 100;
              $tugasketerampilankhusus = $bobotcpl->tugasketerampilankhusus * $row[4] / 100;
              $tugasketerampilanumum = $bobotcpl->tugasketerampilanumum * $row[4] / 100;
              $utspengetahuan = $bobotcpl->utspengetahuan * $row[5] /100;
              $utsketerampilankhusus = $bobotcpl->utsketerampilankhusus * $row[5] /100;
              $utsketerampilanumum = $bobotcpl->utsketerampilanumum * $row[5] /100;
              $uaspengetahuan = $bobotcpl->uaspengetahuan * $row[6] / 100;
              $uasketerampilankhusus = $bobotcpl->uasketerampilankhusus * $row[6] / 100;
              $uasketerampilanumum = $bobotcpl->uasketerampilanumum * $row[6] / 100;

              $update = KrsDetil::where('idjadwal',$idjadwal)->where('idkrs',$idkrs)->update([
                'kehadiran' => $row[2],
                'keaktifan' => $row[3],
                'tugas' => $row[4],
                'uts' => $row[5],
                'uas' => $row[6],
                'kehadiransikap' => $kehadiransikap,
                'keaktifansikap' => $keaktifansikap,
                'ketrampilanumum' =>$ketrampilanumum,
                'tugaspengetahuan' =>$tugaspengetahuan,
                'tugasketerampilankhusus' => $tugasketerampilankhusus,
                'tugasketerampilanumum' => $tugasketerampilanumum,
                'utspengetahuan' =>$utspengetahuan,
                'utsketerampilankhusus' => $utsketerampilankhusus,
                'utsketerampilanumum' => $utsketerampilanumum,
                'uaspengetahuan' =>$uaspengetahuan,
                'uasketerampilankhusus' => $uasketerampilankhusus,
                'uasketerampilanumum' => $uasketerampilanumum,
                'nilaihuruf' => $nilaihuruf,
                'nilaiangka' => $total
              ]);

            }
            $no++;
          }
          Session::put('jumlahmhsupdate', $success);

      }
}
