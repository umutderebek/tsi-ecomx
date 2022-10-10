<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Userbilling extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = "user_billing";



    protected $fillable = [
       'name_surname','country','state','adress','adress2','zipcode','firm_name','country','state','taxno','country_firm','state_firm'
    ];

    public function users()
    {
        return $this->hasOne('App\User');
    }
}
