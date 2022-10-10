<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usershipping extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = "user_shipping";



    protected $fillable = [
        'shipping_baslik','state','country','adress','adress2','zipcode'
    ];


    public function users()
    {
        return $this->hasOne('App\User');
    }
}
