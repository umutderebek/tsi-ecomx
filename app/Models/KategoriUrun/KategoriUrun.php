<?php

namespace App\Models\KategoriUrun;

use Illuminate\Database\Eloquent\Model;

class KategoriUrun extends Model
{
    protected $table = "kategori_urun";
    protected $fillable = ['kategori_id','urun_id'];
}
