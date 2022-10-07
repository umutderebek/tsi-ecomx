<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Models\Blog\Blog;
use App\Models\Blog\Blogkategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use phpDocumentor\Reflection\DocBlock\Tags\Generic;


class AdminnewsController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {

        $blogs = Blog::all();

        $blogkategori = Blogkategori::all();

        return view('backend.blog.news-index',compact('blogs','blogkategori'));
    }


    public function form()
    {
        $blogkategori = Blogkategori::all();
        return view('backend.blog.news-creator',compact('blogkategori'));
    }

    public function guncelle(Request $request,$id)
    {

        $data = request()->only('post_baslik','yazi','kimage','gimage','blog_aciklama','blog_keyword','yayın');

        $entry = Blog::where('id',$id)->firstOrFail();
        $entry1 = Blog::where('id',$id)->firstOrFail();

        $entry->update($data);
        $entry1->update($data);

        if(request()->hasFile('kimage'))
        {
            $this->validate(request(),[
                'kimage' => 'image|mimes:jpg,png,jpeg,gif|max:2048'
            ]);

            $urun_resmi = request()->file('kimage');
            $urun_resmi = request()->kimage;

            $dosyad = $entry->id . "-" . time() . "." . $urun_resmi->extension();

            if($urun_resmi->isValid())
            {
                $urun_resmi->move('uploads/blog',$dosyad);

                Blog::updateOrCreate(
                    ['id' => $entry->id],
                    ['kimage'=> $dosyad]
                );

            }
        }

        if(request()->hasFile('gimage'))
        {
            $this->validate(request(),[
                'gimage' => 'image|mimes:jpg,png,jpeg,gif|max:2048'
            ]);

            $urun_resmi = request()->file('gimage');
            $urun_resmi = request()->gimage;

            $dosyad = $entry1->id . "-" . time() . "." . $urun_resmi->extension();

            if($urun_resmi->isValid())
            {
                $urun_resmi->move('uploads/blog',$dosyad);

                Blog::updateOrCreate(
                    ['id' => $entry1->id],
                    ['gimage'=> $dosyad]
                );

            }
        }

        $data['yayın'] = request()->has('yayın') ? 1: 0;









        Toastr::success('Blog Başarıyla Güncellendi','Success');

        return redirect()->route('admin.blog',$entry->id);

    }

    public function kaydet()
    {

        $this->validate(request(),[
            'yazibaslik' => 'required',
            'yazi' => 'required',
            'kimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'gimage' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'blogkategori' => 'required',
            'blog-aciklama' => 'required',
            'blog-keyword' => 'required',
        ]);


        $blog = new Blog();

        $blog->post_baslik = request('yazibaslik');




        $blog->yazi = request('yazi');

        $blog->blog_aciklama = request('blog-aciklama');
        $blog->blog_keyword = request('blog-keyword');
        if(Input::hasFile('kimage'))
        {
            $file = Input::file('kimage');
            $file->move('uploads/blog',$file->getClientOriginalName());
            $blog->kimage = $file->getClientOriginalName();
        }

        if(Input::hasFile('gimage'))
        {
            $file = Input::file('gimage');
            $file->move('uploads/blog',$file->getClientOriginalName());
            $blog->gimage = $file->getClientOriginalName();
        }

        $blog->admin_id = auth()->id();

        $blog['yayın'] = request()->has('yayın') ? 1: 0;

        $blog->blogkategori_id = request('blogkategori');




        $blog->save();

        toastr()->success('Veri Başarıyla Oluşturuldu :)');




        return redirect()->route('admin.blog');
    }

    public function sil($id)
    {
        Blog::find($id)->delete();
        toastr()->success('Veri Başarıyla Silindi :)');
        return redirect()->route('admin.blog');
    }


    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $blogkategori = Blogkategori::all();

        $blog_kategoriler = $blog->blogkategori()->pluck('id')->all();


        return view('backend.blog.news-edit',compact('blog','blogkategori','blog_kategoriler'));
    }






}
