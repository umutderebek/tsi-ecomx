<?php

namespace App\Models\Endustri;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\SoftDeletes;

class Endustri extends Model
{
    use SoftDeletes;
    use HasSlug;
    protected $table = "endustri";

    protected $guarded=[];

    protected $fillable = ['post_baslik','yazi','blog_aciklama','blog_keyword','yayın','taslak'];


    public function endustrikategori()
    {
        return $this->belongsTo(EKategori::class,'treatmentkategori_id');
    }

    public function endosya(){
        return $this->hasMany(Endustridosya::class, 'treatment_id');
    }

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('post_baslik')
            ->saveSlugsTo('slug');
    }
}
