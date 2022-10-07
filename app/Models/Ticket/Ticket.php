<?php

namespace App\Models\Ticket;

use App\Admin;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Ticket extends Model
{

    use HasSlug;

    protected $fillable = [
        'admin_id','user_id', 'category_id', 'ticket_id', 'title', 'priority', 'message', 'status','admin_id','cevaplandı'
    ];

    public function treatmentkategori()
    {
        return $this->belongsTo(TKategori::class,'category_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
    public function comm()
    {
        return $this->hasMany(AdminComment::class);
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}

