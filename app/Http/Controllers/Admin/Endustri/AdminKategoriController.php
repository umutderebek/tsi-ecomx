<?php

namespace App\Http\Controllers\Admin\Endustri;

use App\Models\Endustri\EKategori;
use App\Models\Endustri\Endustridosya;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;

class AdminKategoriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $kats = EKategori::all();

        return view('backend.endustrikat.kategori-index',compact('kats'));
    }

    public function form()
    {

        return view('backend.endustrikat.kategori-form');
    }

    public function kaydet(Request $request)
    {
        request()->validate([
            'slug' =>'required',
            'kategori_adi' =>'required',
        ]);

        EKategori::create($request->all());

        toastr()->success('Veri Başarıyla Eklendi :)');

        return redirect()->route('admin.endustrikategori.index');
    }

    public function edit($id)
    {
        $kategori  = EKategori::find($id);

        return view('backend.endustrikat.kategori-edit',compact('kategori'));

    }

    public function guncelle($id)
    {
        request()->validate([
            'slug' =>'required',
            'kategori_adi' =>'required',
        ]);

        $kategori = EKategori::find($id);

        $kategori->slug = request('slug');
        $kategori->kategori_adi = request('kategori_adi');

        if(Input::hasFile('image'))
        {
            $file = Input::file('image');
            $file->move('frontend/uploads/endustri/endustri-kat/',$file->getClientOriginalName());
            $kategori->image = $file->getClientOriginalName();
        }

        $kategori->save();

        toastr()->success('Veri Başarıyla Güncellendi :)');

        return redirect()->route('admin.endustrikategori.index');
    }
    public function destroy($id)
    {

        EKategori::destroy($id);

        toastr()->success('Veri Başarıyla Silindi :)');

        return redirect()->back();


    }

    public function sil($id)
    {
        EKategori::destroy($id);
        toastr()->success('Veri Başarıyla Silindi :)');
        return redirect()->back();
    }

}
