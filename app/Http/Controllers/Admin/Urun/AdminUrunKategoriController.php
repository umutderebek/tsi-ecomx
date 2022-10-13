<?php

namespace App\Http\Controllers\Admin\Urun;

use App\Models\Blog\BlogKategori;
use App\Models\KategoriUrun\Kategori;
use App\Models\KategoriUrun\Urun;
use App\Models\KategoriUrun\Uruncerceverenk;
use App\Models\KategoriUrun\Uruncert;
use App\Models\KategoriUrun\Uruncolor;
use App\Models\KategoriUrun\Urunmalzeme;
use App\Models\KategoriUrun\Urunmasacap;
use App\Models\KategoriUrun\Urunogrencimasayukseklik;
use App\Models\KategoriUrun\Urunplakasize;
use App\Models\KategoriUrun\Urunpsize;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminUrunKategoriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $kats = Kategori::all();

        $uruncerceve = Uruncerceverenk::all()->count();
        $uruncert = Uruncert::all()->count();
        $uruncolor = Uruncolor::all()->count();
        $urunmalzeme = Urunmalzeme::all()->count();
        $urunmasacap = Urunmasacap::all()->count();
        $urunoogrencimasayukseklik = Urunogrencimasayukseklik::all()->count();
        $urunplakasize = Urunplakasize::all()->count();
        $urunsize = Urunpsize::all()->count();

        return view('backend.category.kategori-index', compact('kats','uruncerceve','uruncert','uruncolor','urunmalzeme','urunmasacap',
            'urunoogrencimasayukseklik','urunplakasize','urunsize'));
    }

    public function form()
    {
        $uruncerceve = Uruncerceverenk::all()->count();
        $uruncert = Uruncert::all()->count();
        $uruncolor = Uruncolor::all()->count();
        $urunmalzeme = Urunmalzeme::all()->count();
        $urunmasacap = Urunmasacap::all()->count();
        $urunoogrencimasayukseklik = Urunogrencimasayukseklik::all()->count();
        $urunplakasize = Urunplakasize::all()->count();
        $urunsize = Urunpsize::all()->count();

        return view('backend.category.kategori-form', compact('uruncerceve','uruncert','uruncolor','urunmalzeme','urunmasacap',
            'urunoogrencimasayukseklik','urunplakasize','urunsize'));
    }

    public function kaydet(Request $request)
    {
        request()->validate([
            'slug' => 'required',
            'kategori_adi' => 'required',
        ]);

        $kategori = new Kategori();

        $kategori->slug = request('slug');
        $kategori->kategori_adi = request('kategori_adi');
        $kategori->olusturma_tarihi = date('Y-m-d H:i:s');
        $kategori->guncelleme_tarihi = date('Y-m-d H:i:s');
        $kategori->kategori_resmi = '1';
        $kategori->save();


        toastr()->success('Veri Başariyla Eklendi :)');

        return redirect()->route('admin.category.index');
    }

    public function edit($id)
    {
        $kategori = Kategori::find($id);
        $kategoriler = Kategori::all();

        $uruncerceve = Uruncerceverenk::all()->count();
        $uruncert = Uruncert::all()->count();
        $uruncolor = Uruncolor::all()->count();
        $urunmalzeme = Urunmalzeme::all()->count();
        $urunmasacap = Urunmasacap::all()->count();
        $urunoogrencimasayukseklik = Urunogrencimasayukseklik::all()->count();
        $urunplakasize = Urunplakasize::all()->count();
        $urunsize = Urunpsize::all()->count();

        // $data = DB::table('kategori')->get()->where('id',$id);
        return view('backend.category.kategori-edit', compact('kategori','uruncerceve','uruncert','uruncolor','urunmalzeme','urunmasacap',
            'urunoogrencimasayukseklik','urunplakasize','urunsize'));

    }

    public function guncelle($id, Request $request)
    {
        $data = request()->only('slug', 'üst_id', 'kategori_adi', 'kategori_page_title', 'kategori_anasayfatitle', 'productsView', 'status');

        if($data["status"] === "published"){
            $affected = DB::table('kategori')->where('id',$id)->update(['yayin' => 1]);
            echo $affected;
        }
        else if($data["status"] === "unpublished"){
            $affected = DB::table('kategori')->where('id',$id)->update(['yayin' => 0]);
            echo $affected;
        }
        else{
            die();
        }

        $update = Kategori::where('id', $id)->firstorFail();
        $data['slug'] = str_slug(strip_tags(request('slug')));
        $update->update($data);
        if (!request()->hasFile('kategori_resmi')) {
            return $this->succesRedirect("admin.category.index");
        }
        $this->validate(request(), [
            'kategori_resmi' => 'image|mimes:jpg,png,jpeg,gif|max:2048'
        ]);
        $urun_resmi = request()->kategori_resmi;
        $dosyad = $id . "-category" . "-" . time() . "." . $urun_resmi->extension();
        if ($urun_resmi->isValid()) {
            $urun_resmi->move('frontend/uploads/category/masalar', $dosyad);
            $data = array("kategori_resmi" => $dosyad);
            $update = Kategori::where('id', $id)->firstorFail();
            $update->update($data);

        }



        return $this->succesRedirect("admin.category.index");
    }

    private function succesRedirect($route)
    {
        toastr()->success('Veri Başarıyla Guncellendi :)');
        return redirect()->route($route);
    }

    public function sil($id)
    {
        Kategori::destroy($id);
        toastr()->success('Veri Başarıyla Silindi :)');

        return redirect()->route('admin.category.index');
    }
}
