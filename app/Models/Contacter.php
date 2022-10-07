<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contacter extends Model
{
     use SoftDeletes;

    protected $table = "contactus";

    protected $fillable=[''];
}
