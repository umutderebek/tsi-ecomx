<?php

namespace App\Http\Controllers\Admin\User;

use App\Models\KategoriUrun\Uruncerceverenk;
use App\Models\KategoriUrun\Uruncert;
use App\Models\KategoriUrun\Uruncolor;
use App\Models\KategoriUrun\Urunmalzeme;
use App\Models\KategoriUrun\Urunmasacap;
use App\Models\KategoriUrun\Urunogrencimasayukseklik;
use App\Models\KategoriUrun\Urunplakasize;
use App\Models\KategoriUrun\Urunpsize;
use App\User;
use App\Userorder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {

        $users = User::all();

        $uruncerceve = Uruncerceverenk::all()->count();
        $uruncert = Uruncert::all()->count();
        $uruncolor = Uruncolor::all()->count();
        $urunmalzeme = Urunmalzeme::all()->count();
        $urunmasacap = Urunmasacap::all()->count();
        $urunoogrencimasayukseklik = Urunogrencimasayukseklik::all()->count();
        $urunplakasize = Urunplakasize::all()->count();
        $urunsize = Urunpsize::all()->count();

        return view('backend.customer.index',compact('users','uruncerceve','uruncert','uruncolor','urunmalzeme','urunmasacap',
            'urunoogrencimasayukseklik','urunplakasize','urunsize'));
    }

    public function show($id)
    {
        $users = User::where('id',$id)->firstOrFail();

        $userorder = Userorder::where('user_id',$id)->get();


        $uruncerceve = Uruncerceverenk::all()->count();
        $uruncert = Uruncert::all()->count();
        $uruncolor = Uruncolor::all()->count();
        $urunmalzeme = Urunmalzeme::all()->count();
        $urunmasacap = Urunmasacap::all()->count();
        $urunoogrencimasayukseklik = Urunogrencimasayukseklik::all()->count();
        $urunplakasize = Urunplakasize::all()->count();
        $urunsize = Urunpsize::all()->count();


        return view('backend.customer.show',compact('users','uruncerceve','uruncert','uruncolor','urunmalzeme','urunmasacap',
            'urunoogrencimasayukseklik','urunplakasize','urunsize'))->with('userorder',$userorder);
    }





    public function sil($id)
    {
        User::destroy($id);
        toastr()->success('Veri Başarıyla Silindi :)');
        return redirect()->back();
    }

}
