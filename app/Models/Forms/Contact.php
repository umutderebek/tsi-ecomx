<?php

namespace App\Models\Forms;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $table = 'contactus';

    public $fillable = ['name','email','subject','message'];
}
