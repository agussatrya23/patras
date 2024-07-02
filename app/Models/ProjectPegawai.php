<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectPegawai extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pegawai()
    {
        return $this->hasone(MdPegawai::class,'id','idpegawai');
    }
}
