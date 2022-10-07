<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class AdminDetay extends Model
{
    use SoftDeletes;

    protected $table = "admin_detay";

    protected $guarded = [''];

    protected $fillable = [

    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }
}
