<?php

namespace App\Http\Controllers\Admin\Endustri;


use App\Models\Endustri\EKategori;
use App\Models\Endustri\Endustri;
use App\Models\Endustri\Endustridosya;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input;


class AdminEndustriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {

        $treatments = Endustri::all();



        return view('backend.endustri.endustri-index',compact('treatments'));
    }
    public function form()
    {
        $treatmentkategori = EKategori::all();

        return view('backend.endustri.endustri-creator',compact('treatmentkategori'));
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

        $treatment = new Endustri();
        $treatment->post_baslik = request('post_baslik');
        $treatment->onyazi = request('onyazi');
        $treatment->yazi = request('yazi');
        $treatment->blog_aciklama = request('blog_aciklama');
        $treatment->blog_keyword = request('blog_keyword');
        $treatment->created_at = request('created_at');
        $treatment->updated_at = request('updated_at');


        if(Input::hasFile('kimage'))
        {
            $file = Input::file('kimage');
            $file->move('frontend/uploads/endustri/kapak',$file->getClientOriginalName());
            $treatment->kimage = $file->getClientOriginalName();
        }

        if(Input::hasFile('gimage'))
        {
            $file = Input::file('gimage');
            $file->move('frontend/uploads/endustri/ongorsel',$file->getClientOriginalName());
            $treatment->gimage = $file->getClientOriginalName();
        }

        $treatment['yayın'] = request()->has('yayın') ? 1: 0;

        $treatment->treatmentkategori_id = request('treatmentkategori');



        $treatment->save();

        toastr()->success('Veri Başarıyla Güncellendi :)');



        return redirect()
            ->route('admin.endustri.index');
    }

    public function edit($id)
    {
        $treatment = Endustri::find($id);
        $treatment_kategoriler = $treatment->endustrikategori()->pluck('id')->all();
        $treatkategori = EKategori::all();

        return view('backend.endustri.endustri-guncelle',compact('treatment','treatkategori','treatment_kategoriler'));
    }

    public function guncelle(Request $request,$id)
    {


        request()->validate([
            'post_baslik' =>'required',
            'yazi' =>'required',
            'onyazi'=>'required'
        ]);

        $treatment = Endustri::find($id);

        $treatment->post_baslik = request('post_baslik');
        $treatment->yazi = request('yazi');
        $treatment->onyazi = request('onyazi');
        $treatment->blog_aciklama = request('blog_aciklama');
        $treatment->blog_keyword = request('blog_keyword');
        $treatment->created_at = request('created_at');
        $treatment->updated_at = request('updated_at');

        if(Input::hasFile('kimage'))
        {
            $file = Input::file('kimage');
            $file->move('frontend/uploads/endustri/kapak',$file->getClientOriginalName());
            $treatment->kimage = $file->getClientOriginalName();
        }

        if(Input::hasFile('gimage'))
        {
            $file = Input::file('gimage');
            $file->move('frontend/uploads/endustri/ongorsel',$file->getClientOriginalName());
            $treatment->gimage = $file->getClientOriginalName();
        }

        $treatment['yayın'] = request()->has('yayın') ? 1: 0;


        $treatment->treatmentkategori_id = request('endustrikategori');

        $treatment->update();


        toastr()->success('Veri Başarıyla Güncellendi :)');

        return redirect()->route('admin.endustri.index');

    }

    public function dropzone($id)
    {
        $treatment = Endustri::findOrFail($id);

        $photos = Endustridosya::where('blog_id',$id)->get();

        return view('backend.treatments.news-dropzone',compact('treatment','photos'));
    }

    public function dfilestore(Request $request,$id)
    {
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('frontend/uploads/endustri/ekfoto'),$imageName);

        $imageupload = new Endustridosya();
        $imageupload->blog_id = request('inputx');
        $imageupload->imagex = $imageName;
        $imageupload->save();

    }

    public function destroy($id)
    {

        Endustridosya::destroy($id);

        toastr()->success('Veri Başarıyla Silindi :)');

        return redirect()->back();


    }

    public function sil($id)
    {
        Endustri::destroy($id);
        toastr()->success('Veri Başarıyla Güncellendi :)');
        return redirect()->route('admin.endustri.index');
    }

}

