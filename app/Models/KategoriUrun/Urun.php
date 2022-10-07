<?php

namespace App\Models\KategoriUrun;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\KategoriUrun\UrunDetay;

class Urun extends Model
{
    use SoftDeletes;

    protected $table = "urun";

    protected $guarded=[];


    public function kategoriler()
    {
        return $this->belongsToMany('App\Models\KategoriUrun\Kategori','kategori_urun');
    }


}
