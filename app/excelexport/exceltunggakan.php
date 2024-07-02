<?php
namespace App\excelexport;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use Illuminate\Console\Command;
use auth;
class exceltunggakan extends \PhpOffice\PhpSpreadsheet\Cell\StringValueBinder implements FromView, WithColumnFormatting, ShouldAutoSize, WithCustomValueBinder
{
  use Exportable;

    public function __construct($data)
    {
        $this->data = $data;
        $this->tunggakanakademik = $tunggakanakademik;
    }

    public function view(): View
    {
      $data = $this->data;
      $tunggakanakademik = $this->tunggakanakademik;
      return view('laporan.tunggakan.excel', compact('data','tunggakanakademik'));
    }

    public function handle()
    {
        $this->output->title('Starting import');
        (new view)->withOutput($this->output)->import('users.xlsx');
        $this->output->success('Import successful');
    }
}
