<?php

namespace App\Http\Controllers\Admin\Urun;

use App\Models\Blog\Blog;
use App\Models\KategoriUrun\Kategori;
use App\Models\KategoriUrun\KategoriUrun;
use App\Models\KategoriUrun\Urun;
use App\Models\KategoriUrun\UrunDetay;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminUrunController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $list = Urun::orderby('id')->paginate(15);

        return view('backend.urun.index',compact('list'));
    }

    public function create()
    {
         $urunkategori = KategoriUrun::all();
         $kategoriler = Kategori::all();

         return view('backend.urun.creater',compact('kategoriler','urunkategori'));
    }



    public function kaydet(Request $request,$id)
    {
        $this->validate(request(),[
            'post_baslik' => 'required',
            'onyazi' => 'required',
            'yazi' => 'required',
            'kimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'blogkategori' => 'required',
            'blog_aciklama' => 'required',
            'blog_keyword' => 'required',
            'created_at'  => 'required',
            'updated_at'  => 'required'
        ]);

        $blog = new Blog();
        $blog->post_baslik = request('post_baslik');
        $blog->onyazi = request('onyazi');
        $blog->yazi = request('yazi');
        $blog->blog_aciklama = request('blog_aciklama');
        $blog->blog_keyword = request('blog_keyword');
        $blog->created_at = request('created_at');
        $blog->updated_at = request('updated_at');


        if($request->file('kimage'))
        {
            $file = $request->file('kimage');
            $file->move('frontend/uploads/blog/kapak',$file->getClientOriginalName());
            $blog->kimage = $file->getClientOriginalName();
        }

        if($request->file('gimage'))
        {
            $file = $request->file('gimage');
            $file->move('frontend/uploads/blog/ongorsel',$file->getClientOriginalName());
            $blog->gimage = $file->getClientOriginalName();
        }

        $blog['yayın'] = request()->has('yayın') ? 1: 0;

        $blog->blogkategori_id = request('blogkategori');



        $blog->save();

        toastr()->success('Veri Başarıyla Güncellendi :)');



        return redirect()
            ->route('admin.urun');
    }

    public function edit($id)
    {
        $list = Urun::find($id);
        $urun_kategoriler = [];
        $urun_kategoriler = $list->kategoriler()->pluck('kategori_id')->all();
        $kategoriler = Kategori::all();
        return view('backend.urun.edit',compact('list','kategoriler','urun_kategoriler'));
    }

    public function sil($id)
    {
        Urun::destroy($id);
        toastr()->success('Veri Başarıyla Silindi :)');
        return redirect()->back();

    }



}
