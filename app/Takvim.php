<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Takvim extends Model
{
    use SoftDeletes;

    protected $fillable = ['start_time', 'finish_time', 'comments','admin_id'];

    public function admins()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    public function index()
    {

        $takvim = Takvim::all();

        return view('frontend.takvim.takvim');

    }

}
