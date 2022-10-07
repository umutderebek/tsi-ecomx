<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Models\Blog\Urun;
use App\Models\Blog\Kategori;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminYaziController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        if(request()->filled('aranan'))
        {
            $aranan = request('aranan');
            $list = Urun::where('urun_adi','like', "%$aranan%")
                ->orWhere('aciklama','like',"%$aranan%")
                ->orderby('id')
                ->paginate(15);

        }
        else{
            $list = Urun::orderby('id')->paginate(15);
        }
        return view('backend.admin-yazi-kategori.blog-kate',compact('list'));
    }

    public function edit($id)
    {
        $list = \App\Models\Blog\Urun::find($id);
        $urun_kategoriler = [];
        $urun_kategoriler = $list->kategoriler()->pluck('kategori_id')->all();
        $kategoriler = Kategori::all();
        return view('backend.admin-yazi-kategori.yazi-edit',compact('list','kategoriler','urun_kategoriler'));
    }

    public function kaydet($id)
    {
        $data = request()->only('urun_adi','slug','aciklama','fiyat','OfficalFee','AgentFee');


        $kategoriler = request('kategoriler');


        $entry = \App\Models\Urun::where('id',$id)->firstOrFail();
        $entry->update($data);
        $entry->kategoriler()->sync($kategoriler);

        if (request()->hasFile('urun_resmi'))
        {
            $this->validate(request(),[
                'urun_resmi' => 'image|mimes:jpg,png,jpeg,gif|max:2048'
            ]);

            $urun_resmi = request()->file('urun_resmi');
            $urun_resmi = request()->urun_resmi;

            //$dosyad = $urun_resmi->getClientOriginalName();

            $dosyad = $entry->id . "-" . time() . "." . $urun_resmi->extension();

            if($urun_resmi->isValid())
            {
                $urun_resmi->move('uploads/ulke',$dosyad);

                Urun::updateOrCreate(
                    ['id' => $entry->id],
                    ['urun_resmi'=> $dosyad]
                );

            }






        }

        return redirect()
            ->route('yonetim.urun',$entry->id)
            ->with('mesaj','Güncellendi')
            ->with('mesaj_tur','success');
    }

    public function sil($id)
    {
        Urun::destroy($id);
        toastr()->success('Veri Başarıyla Silindi :)');
        return redirect()->back();

    }
}
