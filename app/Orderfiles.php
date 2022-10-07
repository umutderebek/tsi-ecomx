<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orderfiles extends Model
{
    use SoftDeletes;

    protected $table = "orderfiles";

    protected $guarded = [''];

    protected $fillable = [''];
}
