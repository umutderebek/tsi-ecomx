<?php

namespace App\Http\Controllers;

use App\Models\Blog\Blog;
use App\Models\Blog\Blogdosya;
use App\Models\Blog\Blogkategori;
use App\Models\Blog\Comment;
use App\Models\Endustri\Endustri;
use App\Models\Treatment\Treatment;
use App\Tema\ContactSettings;
use App\Tema\Popup;
use App\Tema\TemaSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrpageController extends Controller
{
    public function index()
    {
        $temaayar = TemaSettings::all();

        /* $kat = DB::table('kategori')->where('id', '5')->get();
         $kat1= DB::table('kategori')->where('id', '6')->get();
         $kat2= DB::table('kategori')->where('id', '7')->get();
         $kat3= DB::table('kategori')->where('id', '8')->get();
         $kat4= DB::table('kategori')->where('id', '9')->get();*/

        $blog = Blog::where('yayın','=',1)->orderByRaw('created_at DESC')->take('2')->get();
        $endustri = \App\Models\Endustri\Endustri::all();
        $hizmet = Treatment::all();


        return view('frontend.tr-anasayfa',compact('temaayar','blog','endustri','hizmet'));
    }



    public function iletisim()
    {
        $ixtemaayar = ContactSettings::all();
        $temaayar = TemaSettings::all();
        $endustri = \App\Models\Endustri\Endustri::all();
        $hizmet = Treatment::all();

        return view('frontend.iletisim',compact('ixtemaayar','temaayar','endustri','hizmet'));
    }
    public function hakkimizda()
    {
        $temaayar = TemaSettings::all();
        $endustri = \App\Models\Endustri\Endustri::all();
        $hizmet = Treatment::all();
        return view('frontend.hakkimizda',compact('temaayar','endustri','hizmet'));
    }

    public function hizmetlerimiz()
    {
        $temaayar = TemaSettings::all();
        $hizmet = Endustri::where('yayın','=',1)->orderByRaw('created_at DESC')->take('2')->get();
        return view('frontend.hizmetlerimiz',compact('temaayar','hizmet'));
    }

    public function blog()
    {
        $hizmet = Treatment::all();
        $endustri = \App\Models\Endustri\Endustri::all();
        $blog = Blog::where('yayın',1)->orderByRaw('created_at DESC')->paginate(4);

        $temaayar = TemaSettings::all();

        $popular = DB::table('blog')
            ->orderByRaw('created_at DESC')
            ->take(5)
            ->get();

        $kategori = Blogkategori::all();

        return view('frontend.blog.front-blog-page',compact('blog','kategori','temaayar','popular','endustri','hizmet'));

    }

    public function blogkat($id)
    {

        $kategori = Blogkategori::where('slug',$id)->firstOrFail();
        $temaayar = TemaSettings::all();

        $kategoris = Blogkategori::all();
        $hizmet = Treatment::all();

        $endustri = \App\Models\Endustri\Endustri::all();
        $blog = Blog::where('blogkategori_id',$kategori->id)->paginate(10);


        $deneme = $kategori->blog;





        return view('frontend.blog.bkategori',compact('kategori','temaayar','kategoris','blog','deneme','endustri','hizmet'));

    }

    public function post($id)
    {

        $blog = Blog::whereSlug($id)->firstOrFail();

        $temaayar = TemaSettings::all();
        $kategoris = Blogkategori::all();


        $photos = Blogdosya::where('blog_id',$id)->get();


        $popular = DB::table('blog')
            ->orderByRaw('created_at DESC')
            ->take(5)
            ->get();

        $hizmet = Treatment::all();
        $endustri = \App\Models\Endustri\Endustri::all();



        return view('frontend.blog.bpost',compact('temaayar','kategoris','blog','popular','photos','endustri','hizmet'));
    }

    public function endustripost($id)
    {

        $blog = Endustri::whereSlug($id)->firstOrFail();
        $endustri = \App\Models\Endustri\Endustri::all();
        $hizmet = Treatment::all();
        $temaayar = TemaSettings::all();

        return view('frontend.endustri.endustripost',compact('temaayar','blog','endustri','hizmet'));
    }

    public function hizmetpost($id)
    {

        $blog = Treatment::whereSlug($id)->firstOrFail();
        $endustri = \App\Models\Endustri\Endustri::all();
        $hizmet = Treatment::all();

        $temaayar = TemaSettings::all();

        return view('frontend.hizmet.bpost',compact('temaayar','blog','endustri','hizmet'));
    }
}
