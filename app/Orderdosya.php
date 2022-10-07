<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orderdosya extends Model
{
    use SoftDeletes;

    protected $table = "orderfiles";

    protected $guarded = [''];

    protected $fillable = [''];

    public function userorder()
    {
        return $this->belongsTo(Userorder::class,'order_id');
    }
}
