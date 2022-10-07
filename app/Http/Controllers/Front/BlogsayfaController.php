<?php

namespace App\Http\Controllers\Front;

use App\Models\Blog\BKategori;
use App\Models\Blog\Blog;

use App\Models\Blog\Blogdosya;
use App\Models\Blog\Blogkategori;
use App\Models\Blog\Comment;

use App\Tema\TemaSettings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class BlogsayfaController extends Controller
{
    public function blog()
    {


        $blog = Blog::where('yayın',1)->orderByRaw('created_at DESC')->paginate(4);

        $temaayar = TemaSettings::all();

        $popular = DB::table('blog')
            ->orderByRaw('created_at DESC')
            ->take(5)
            ->get();

        $kategori = Blogkategori::all();

        return view('frontend.sayfalar.en.blog.front-blog-page',compact('blog','kategori','temaayar','popular'));

    }

    public function blogkat($id)
    {

        $kategori = Blogkategori::where('slug',$id)->firstOrFail();
        $temaayar = TemaSettings::all();

        $kategoris = Blogkategori::all();

        $blog = Blog::where('blogkategori_id',$kategori->id)->paginate(10);


        $deneme = $kategori->blog;


        return view('frontend.sayfalar.en.blog.bkategori',compact('kategori','temaayar','kategoris','blog','deneme'));

    }

    public function post($id)
    {

        $blog = Blog::whereSlug($id)->firstOrFail();

        $temaayar = TemaSettings::all();
        $kategoris = Blogkategori::all();

        $comments = Comment::where('verified','=',1)->get();

        $photos = Blogdosya::where('blog_id',$id)->get();


        $popular = DB::table('blog')
            ->orderByRaw('created_at DESC')
            ->take(5)
            ->get();






        return view('frontend.sayfalar.en.blog.bpost',compact('temaayar','kategoris','blog','popular','photos','comments'));
    }








}
