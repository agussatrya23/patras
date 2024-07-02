<?php
namespace App\excelimport;
use App\Models\JadwalMatakuliah;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use App\Helper;
use Session;
use auth;
class uploadjadwalkuliah implements ToCollection
{
    public function collection(Collection $rows)
      {
          $idta = Helper::idta();
          $idprodi = Helper::idprodi();
          $no = 0;
          $success = 0;
          foreach ($rows as $row)
          {
            if ($no > 0 && $row[0] != '') {
              JadwalMatakuliah::create([
                'idta' => $idta,
                'idprodi'=>$idprodi,
                'idkurikulum' => $row[0],
                'idmk' => $row[1],
                'idkelompok' => $row[4],
                'kuota' => $row[5],
                'hari' => $row[6],
                'jam' => $row[7],
                'kampus' => $row[8],
                'gedung' => $row[9],
                'ruang' => $row[10],
                'iduser' => auth::user()->id,
              ]);
            }
            $no++;
          }
      }
}
