<?php

namespace App\Http\Controllers\Admin\Blog;


use App\Models\Blog\Blog;
use App\Models\Blog\Blogdosya;
use App\Models\Blog\Blogkategori;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;


class AdminBlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {

        $blogs = Blog::all();



        return view('backend.blog.news-index',compact('blogs'));
    }

    public function form()
    {
        $blogkategori = Blogkategori::all();
        return view('backend.blog.news-creator',compact('blogkategori'));
    }


    public function kaydet(Request $request)
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
            ->route('admin.blog.index');
    }

    public function edit($id)
    {
        $blog = Blog::find($id);
        $blog_kategoriler = $blog->blogkategori()->pluck('id')->all();
        $blogkategori = Blogkategori::all();

        return view('backend.blog.news-guncelle',compact('blog','blogkategori','blog_kategoriler'));
    }
    public function guncelle(Request $request,$id)
    {


        request()->validate([
            'post_baslik' =>'required',
            'yazi' =>'required',
            'onyazi'=>'required'
        ]);

        $blog = Blog::find($id);

        $blog->post_baslik = request('post_baslik');
        $blog->yazi = request('yazi');
        $blog->onyazi = request('onyazi');
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

        $blog->update();


        toastr()->success('Veri Başarıyla Güncellendi :)');

        return redirect()->route('admin.blog.index');

    }


    public function dropzone($id)
    {
        $blog = Blog::findOrFail($id);

        $photos = Blogdosya::where('blog_id',$id)->get();

        return view('backend.blog.news-dropzone',compact('blog','photos'));
    }

    public function dfilestore(Request $request,$id)
    {
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('frontend/uploads/blog/ekfoto'),$imageName);

        $imageupload = new Blogdosya();
        $imageupload->blog_id = request('inputx');
        $imageupload->imagex = $imageName;
        $imageupload->save();

    }

    public function destroy($id)
    {

        Blogdosya::destroy($id);

        toastr()->success('Veri Başarıyla Silindi :)');

        return redirect()->back();


    }

    public function sil($id)
    {
        Blog::destroy($id);
        toastr()->success('Veri Başarıyla Güncellendi :)');
        return redirect()->route('admin.blog.index');
    }
}
