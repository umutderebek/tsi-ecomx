<?php

namespace App\Http\Controllers\Kategori;

use App\Models\KategoriUrun\Kategori;
use App\Tema\ContactSettings;
use App\Tema\TemaSettings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
 public function index()
{
    $kategori = Kategori::all();
    $temaayar = ContactSettings::all();
    return view('frontend.sayfalar.en.KategoriBilgileri.index',compact('kategori','temaayar'));
}

     public function kategoriDesc($slug_kategoriadi)
    {
        $kategori = Kategori::where('slug',"main/".$slug_kategoriadi)
            ->firstorFail();
        $temaayar = TemaSettings::all();
        return view('frontend.sayfalar.en.custom.'.$slug_kategoriadi,compact('kategori','temaayar'));
    }


    public function getSubCatagories($slug_kategoriadi)
    {

        $kategori = Kategori::where('slug',$slug_kategoriadi)
            ->firstorFail();

        $urunler = DB::table('usersorder')->select("*", "usersorder.slug as urunSlug")->leftjoin('kategori_urun','urun.id','=','kategori_urun.urun_id')
            ->join('kategori','kategori.id','=','kategori_urun.kategori_id')
            ->where('kategori.üst_id',$kategori->id)->orderBy("kategori.id","asc")->orderBy("usersorder.id","asc")->get();


        $temaayar = TemaSettings::all();

        return view('frontend.sayfalar.en.KategoriBilgileri.products-subcats',compact('kategori','urunler','temaayar'));
    }
public function ulke($slug_kategoriadi)
{

    $kategori = Kategori::where('slug',$slug_kategoriadi)
        ->firstorFail();

    $alt_kategori = Kategori::where('üst_id',$kategori->id)->get();

    $urunler_art = $kategori->urunler;

    $urunler_venous = $kategori->urunler;

    $urunler = $kategori->urunler;


    $temaayar = TemaSettings::all();

    return view('frontend.sayfalar.en.KategoriBilgileri.kategorishow',compact('kategori','urunler','urunler_art','urunler_venous','alt_kategori','temaayar'));
}


public function kategori($slug_kategoriadi)
{
    $kategori = Kategori::where('slug',$slug_kategoriadi)
        ->firstorFail();

    $alt_kategori = Kategori::where('üst_id',$kategori->id)->get();
    $temaayar = ContactSettings::all();

    return view('frontend.sayfalar.en.anasayfakategoribilgileri.kategorishow',compact('kategori','alt_kategori','temaayar'));
}

    public function kategoritekil($slug_kategoriadi)
    {
        $kategori = Kategori::where('slug',$slug_kategoriadi)
            ->firstorFail();

        $alt_kategori = Kategori::where('üst_id',$kategori->id)->get();
        $temaayar = ContactSettings::all();

        return view('frontend.sayfalar.en.anasayfakategoribilgileri.kategoritekil',compact('kategori','alt_kategori','temaayar'));
    }




}
