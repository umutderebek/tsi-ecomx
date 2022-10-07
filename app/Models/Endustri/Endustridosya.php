<?php

namespace App\Models\Endustri;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Endustridosya extends Model
{
    use SoftDeletes;

    protected $table = "blog_dosya";

    protected $guarded = [''];

    protected $fillable = [''];


    public function endustri()
    {
        return $this->belongsTo(Endustri::class, 'endustri_id');
    }
}
