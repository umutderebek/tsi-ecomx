<?php

namespace App\Models\Treatment;


use App\Models\Blog\Comment;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\SoftDeletes;

class Treatment extends Model
{
    use SoftDeletes;
    use HasSlug;
    protected $table = "treatment";

    protected $guarded=[];

    protected $fillable = ['post_baslik','yazi','blog_aciklama','blog_keyword','yayın','taslak'];


    public function treatmentkategori()
    {
        return $this->belongsTo(TKategori::class,'treatmentkategori_id');
    }

    public function trdosya(){
        return $this->hasMany(Treatmentdosya::class, 'treatment_id');
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('post_baslik')
            ->saveSlugsTo('slug');
    }
}
