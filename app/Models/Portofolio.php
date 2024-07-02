<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function layanan()
    {
        return $this->hasone(Layanan::class,'id','idlayanan');
    }

    public function galeri()
    {
        return $this->hasMany(PortofolioGaleri::class,'idportofolio','id');
    }
}
