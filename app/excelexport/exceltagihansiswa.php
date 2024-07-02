<?php
namespace App\excelexport;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use Illuminate\Console\Command;
use auth;
class exceltagihansiswa extends \PhpOffice\PhpSpreadsheet\Cell\StringValueBinder implements FromView,ShouldAutoSize, WithCustomValueBinder
{
  use Exportable;

    public function __construct($data,$kelas,$bulan,$ta)
    {
        $this->data = $data;
        $this->kelas = $kelas;
        $this->bulan = $bulan;
        $this->ta = $ta;
    }

    public function view(): View
    {
      $data = $this->data;
      $kelas = $this->kelas;
      $bulan = $this->bulan;
      $ta = $this->ta;
      return view('keuangan.tagihanspp.excel', compact('data','kelas','bulan','ta'));
    }

    public function handle()
    {
        $this->output->title('Starting import');
        (new view)->withOutput($this->output)->import('users.xlsx');
        $this->output->success('Import successful');
    }
}
