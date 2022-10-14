<?php

namespace App\Http\Controllers\Eticaret;

use App\Http\Controllers\Controller;
use App\Models\KategoriUrun\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
   public function index(Request $request,$slug)
   {
       $kategoriler = Kategori::where('üst_id','=',null)->where('anasayfacikar','=',1)->get();

       $kategori = Kategori::where('slug',$slug)->firstOrFail();
       $altkat = Kategori::where('üst_id',$kategori->id)->get();

       $urunler = $kategori->urunler()->paginate(9);


       return view('frontend.category.kategori',compact('kategori','kategoriler','altkat','urunler'));
   }
}
