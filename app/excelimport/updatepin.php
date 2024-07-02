<?php
namespace App\excelimport;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\MahasiswaWisuda;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Session;
use auth;
class updatepin implements ToCollection
{
    public function collection(Collection $rows)
      {
          $no = 0;
          $success = 0;
          foreach ($rows as $row)
          {
            if ($row[1] != '') {
              $a = MahasiswaWisuda::where('npm',$row[1])->update([
                'noijazah' => $row[3],
                // 'notranskrip' => $row[5],
                // 'noskpi' => $row[6],
              ]);

              if ($a) {
                $no++;
                $success++;
              }
            }

          }

          Session::put('jumlahmhsupdate', $success);

      }
}
