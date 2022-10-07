<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BKategori extends Model
{
    use SoftDeletes;

    protected $table = "blogkategori";
    protected $fillable = [''];
    protected $guarded = [''];

    const CREATED_AT = 'olusturulma_tarihi';
    const UPDATED_AT = 'guncelleme_tarihi';
    const DELETED_AT = 'silinme_tarihi';

    //hem kategori hemde urunleri cekicez

    public function urunler()
    {
        return $this->belongsToMany('App\Models\Blog\Blog','kategori_blog');
    }
}
