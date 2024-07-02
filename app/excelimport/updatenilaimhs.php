<?php
namespace App\excelimport;
use App\Models\Krs;
use App\Models\KrsDetil;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Session;
use auth;
class updatenilaimhs implements ToCollection
{
    public function collection(Collection $rows)
      {
          $no = 0;
          $success = 0;
          foreach ($rows as $row)
          {
            if ($no > 0 && $row[0] != '') {
              $update = KrsDetil::leftjoin('krs','krs.id','idkrs')->where('idta',$row[5])->where('krs.npm',$row[0])->where('idmk',$row[2])->update([
                'nilaihuruf' => $row[9],
                'nilaiangka' => $row[8]
              ]);

              if ($update) {
                $success++;
              }
            }
            $no++;
          }
          Session::put('jumlahmhsupdate', $success);

      }
}
