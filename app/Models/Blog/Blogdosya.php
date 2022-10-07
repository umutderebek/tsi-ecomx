<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Blogdosya extends Model
{

    use SoftDeletes;

    protected $table = "blog_dosya";

    protected $guarded = [''];

    protected $fillable = [''];


    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id');
    }
}
