<?php

namespace App;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Userorder extends Model
{
    use HasFactory;

     use SoftDeletes;

    protected $table = "userorders";

    protected $guarded=[];

    protected $fillable = ['name','surname','email','state','country','company','companyemail','siparisnot','uretimadet','omurbeklenti','malzemetip','yuzeyozellik','sipamac'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function ordosya()
    {
        return $this->hasMany(Orderdosya::class,'order_id');
    }

}
