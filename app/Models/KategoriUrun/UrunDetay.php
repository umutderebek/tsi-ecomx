<?php

namespace App\Models\KategoriUrun;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UrunDetay extends Model
{
    use SoftDeletes;

    protected $table = "urun_detay";

    protected $guarded = [''];



    public function urun()
    {
        return $this->belongsTo(Urun::class, 'urun_id');
    }


}
