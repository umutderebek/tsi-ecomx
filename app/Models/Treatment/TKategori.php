<?php

namespace App\Models\Treatment;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TKategori extends Model
{
    use SoftDeletes;

    protected $table = "treatmentkategori";
    protected $fillable = ['kategori_adi','slug','image'];
    protected $guarded = [''];



}
