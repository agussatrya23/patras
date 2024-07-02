<?php
namespace App\excelimport;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\MahasiswaDetil;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Session;
use auth;
class updatemhs implements ToCollection
{
    public function collection(Collection $rows)
      {
          $no = 0;
          $success = 0;
          foreach ($rows as $row)
          {
            if ($no > 0 && $row[0] != '') {
              Mahasiswa::where('npm',$row[0])->update([
                'email' => $row[2],
              ]);

              $update = MahasiswaDetil::where('npm',$row[0])->update([
                'telpon' => $row[3]
              ]);

              $link = Mahasiswa::where('npm',$row[0])->pluck('id')->first();
              if ($link != null) {
                $cek = User::where('link',$link)->where('role',3)->first();
                if ($cek != null) {
                  if ($cek->username != $row[2]) {
                    User::where('id',$cek->id)->update([
                      'username' => $row[2],
                      'password' => Hash::make($row[2]),
                    ]);
                  }
                }else {
                  User::create([
                    'link' => $link,
                    'role' => 3,
                    'username' => $row[2],
                    'password' => Hash::make($row[2]),
                    'remember_token' => Str::random(40),
                  ]);
                }
              }
            }
            $no++;
            $success++;
          }

          Session::put('jumlahmhsupdate', $success);

      }
}
