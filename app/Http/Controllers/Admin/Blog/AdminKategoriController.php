<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Models\Blog\BlogKategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminKategoriController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $kats = BlogKategori::all();

        return view('backend.blogkategori.kategori-index',compact('kats'));
    }

    public function form()
    {

        return view('backend.blogkategori.kategori-form');
    }

    public function kaydet(Request $request)
    {
        request()->validate([
            'slug' =>'required',
            'kategori_adi' =>'required',
        ]);

        Blogkategori::create($request->all());

        toastr()->success('Veri Başarıyla Eklendi :)');

        return redirect()->route('admin.blogkategori.index');
    }

    public function edit($id)
    {
        $kategori  = Blogkategori::find($id);

        return view('backend.blogkategori.kategori-edit',compact('kategori'));

    }

    public function guncelle($id)
    {
        $data = request()->only('slug','kategori_adi');

        $update = Blogkategori::where('id',$id)->firstorFail();

        $update->update($data);

        toastr()->success('Veri Başarıyla Güncellendi :)');

        return redirect()->route('admin.blogkategori.index');
    }

    public function sil($id)
    {
        Blogkategori::destroy($id);
        toastr()->success('Veri Başarıyla Silindi :)');
        return redirect()->back();
    }
}
