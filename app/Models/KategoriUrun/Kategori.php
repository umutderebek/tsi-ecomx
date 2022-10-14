<?php

namespace App\Models\KategoriUrun;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    use SoftDeletes;

    protected $table = "kategori";

    protected $fillable = ['slug','üst_id','kategori_page_title','kategori_adi','kategoriseo','kategori_resmi'];
    protected $guarded = [''];

    const CREATED_AT = 'olusturma_tarihi';
    const UPDATED_AT = 'guncelleme_tarihi';
    const DELETED_AT = 'silinme_tarihi';

    //hem urunkategori hemde urunleri cekicez

    public function urunler()
    {
        return $this->belongsToMany('App\Models\KategoriUrun\Urun','kategori_urun');
    }



    public function children()
    {
        return $this->hasMany('App\Models\KategoriUrun\Kategori', 'üst_id');
    }



}
