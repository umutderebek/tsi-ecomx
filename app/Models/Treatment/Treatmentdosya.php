<?php

namespace App\Models\Treatment;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Treatmentdosya extends Model
{
    use SoftDeletes;

    protected $table = "blog_dosya";

    protected $guarded = [''];

    protected $fillable = [''];


    public function treatment()
    {
        return $this->belongsTo(Treatment::class, 'treatment_id');
    }
}
