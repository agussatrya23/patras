<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function layanan()
    {
        return $this->hasone(Layanan::class,'id','idlayanan');
    }

    public function klien()
    {
        return $this->hasone(MdKlien::class,'id','idklien');
    }

    public function tim()
    {
        return $this->hasMany(ProjectPegawai::class,'idproject','id');
    }

    public function pengeluaran()
    {
        return $this->hasMany(ProjectPengeluaran::class,'idproject','id');
    }

    public function pembayaran()
    {
        return $this->hasMany(ProjectBayar::class,'idproject','id');
    }
}
