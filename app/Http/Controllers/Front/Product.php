<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog\Blog;
use App\Models\KategoriUrun\Urun;
use App\Models\Treatment\Endustri;
use App\Tema\TemaSettings;
use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class Product extends Controller
{
    public function index(Request $request)
    {



//        $kat = DB::table('kategori')->where('id', '1')->get();
//        $kat1= DB::table('kategori')->where('id', '2')->get();
//        $kat2= DB::table('kategori')->where('id', '3')->get();
//        $kat3= DB::table('kategori')->where('id', '4')->get();
//        $kat4= DB::table('kategori')->where('id', '22')->get();
        //$kats=DB::table('kategori')->whereIn('id',array(1,2,3,4))->get();
        $kats=DB::table('kategori')->where('productsView',1)->orderBy("order","desc")->get();
        $haber = Blog::where('yayın','=',1)->orderByRaw('created_at DESC')->take('3')->get();

        $temaayar = TemaSettings::all();

        if ($request->ajax()) {
            $data = Urun::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->filter(function ($instance) use ($request) {
                    if (!empty($request->get('search'))) {
                        $instance->where(function($w) use($request){
                            $search = $request->get('search');
                            $w->orWhere('seo_title', 'LIKE', "%$search%")
                                ->orWhere('types', 'LIKE', "%$search%")
                                ->orWhere('portfolio', 'LIKE', "%$search%")
                                ->orWhere('division', 'LIKE', "%$search%");
                        });
                    }
                })
                ->make(true);
        }



//        return view('frontend.productfilter.allproduct',compact('temaayar','kats','kat','kat1','kat2','kat3','kat4','haber'));
        return view('frontend.sayfalar.en.productfilter.allproduct',compact('temaayar','kats','haber'));
    }
    public function productsJson(){
        $kats=DB::table('kategori')->select("slug","kategori_resmi")->where('productsView',1)->orderBy("order","desc")->get();
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($kats->toArray());
        exit;
    }
    public function getAll()
    {
        return Datatables::of(Urun::all())->make();
    }
}
