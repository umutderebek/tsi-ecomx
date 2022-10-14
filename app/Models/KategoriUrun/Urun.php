<?php

namespace App\Models\KategoriUrun;

use DavidWesdijk\LaravelPolymorphicEav\Traits\HasEntityAttributeValues;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\KategoriUrun\UrunDetay;

class Urun extends Model
{

    use HasEntityAttributeValues;

    use SoftDeletes;

    protected $table = "urun";

    protected $guarded=[];


    public function kategoriler()
    {
        return $this->belongsToMany('App\Models\KategoriUrun\Kategori','kategori_urun');
    }

    public function urunentity()
    {
        return $this->belongsToMany(Urunentity::class);
    }


}
