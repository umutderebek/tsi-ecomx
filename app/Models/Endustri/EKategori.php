<?php

namespace App\Models\Endustri;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EKategori extends Model
{
    use SoftDeletes;

    protected $table = "endustrikategori";
    protected $fillable = ['kategori_adi','slug','image'];
    protected $guarded = [''];



}
