<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function VerifyUser()
    {
        return $this->hasOne('App\VerifyUser');
    }
    public function usorder()
    {
        return $this->hasMany(Userorder::class,'user_id');
    }

    public function bill()
    {
        return $this->hasOne('App\Models\Userbilling');
    }

    public function ship()
    {
        return $this->hasOne('App\Models\Usershipping');
    }

    public function userbilling()
    {
        return $this->belongsTo('App\Models\Userbilling','id');
    }

    public function usershipping()
    {
        return $this->belongsTo('App\Models\Usershipping','id');
    }

}
