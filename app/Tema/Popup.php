<?php

namespace App\Tema;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Popup extends Model
{
    use SoftDeletes;

    protected $fillable = ['popad', 'popup_resim','yayın'];

    protected $table = 'anasayfa_popup';

}
