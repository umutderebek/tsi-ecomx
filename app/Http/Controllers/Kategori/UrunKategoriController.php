<?php

namespace App\Http\Controllers\Kategori;

use App\Models\KategoriUrun\Urun;
use App\Tema\TemaSettings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class UrunKategoriController extends Controller
{
    public function urun($slug_urunadi)
    {

        $urun = Urun::whereSlug($slug_urunadi)->firstOrFail();
        $temaayar = TemaSettings::all();
        $kategoriler = $urun->kategoriler()->distinct()->get();

        return view('frontend.sayfalar.en.KategoriBilgileri.uruntekil',compact('urun','kategoriler','temaayar'));
    }



}
