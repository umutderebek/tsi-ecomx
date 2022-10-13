<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Blog\Blog;
use App\Models\Blog\Blogkategori;
use App\Models\Forms\Contact;

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
use App\Models\Subscribers;
use App\Models\Treatment\EKategori;
use App\Models\Treatment\Endustri;
use App\User;
use Illuminate\Support\Facades\DB;
use ConsoleTVs\Charts;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\TestFixture\C;
use App\Charts\userchart;


class AdminController extends Controller
{
    public function __construct()
{
    $this->middleware('auth:admin');
}

    public function index()
    {
        $sbs = Subscribers::all();
        $blog = Blog::where('yayın',1)->get();
        $blogkategori = Blogkategori::all();
        $iletisimliste = Contact::all();

        $user = User::all();
        $user_dogru = User::where('verified',1)->get();
        $user_false = User::where('verified',0)->get();

        $users = User::select(DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');

        $blog = Blog::select(DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');

        $contact = Contact::select(DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');

        $subs = Subscribers::select(DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');


        $chart = new userchart;
        $chart->labels(['Ocak', 'Subat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Agustos', 'Eylul', 'Ekim', 'Kasım', 'Aralık']);
        $chart->dataset('Oluşturulan Kullanıcı', 'bar', $users)->options([
            'fill' => 'true',
            'borderColor' => '#5174c1'
        ]);

        $chart2 = new userchart;
        $chart2->labels(['Ocak', 'Subat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Agustos', 'Eylul', 'Ekim', 'Kasım', 'Aralık']);
        $chart2->dataset('Oluşturulan Blog', 'bar', $blog)->options([
            'fill' => 'true',
            'borderColor' => '#5174c1'
        ]);

        $chart3 = new userchart;
        $chart3->labels(['Ocak', 'Subat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Agustos', 'Eylul', 'Ekim', 'Kasım', 'Aralık']);
        $chart3->dataset('İletişim Kuran Kullanıcı ', 'bar', $contact)->options([
            'fill' => 'true',
            'borderColor' => '#5174c1'
        ]);

        $chart4 = new userchart;
        $chart4->labels(['Ocak', 'Subat', 'Mart', 'Nisan', 'Mayıs', 'Haziran', 'Temmuz', 'Agustos', 'Eylul', 'Ekim', 'Kasım', 'Aralık']);
        $chart4->dataset('Uye olunan Kullanıcı ', 'bar', $subs)->options([
            'fill' => 'true',
            'borderColor' => '#5174c1'
        ]);


        $uruncerceve = Uruncerceverenk::all()->count();
        $uruncert = Uruncert::all()->count();
        $uruncolor = Uruncolor::all()->count();
        $urunmalzeme = Urunmalzeme::all()->count();
        $urunmasacap = Urunmasacap::all()->count();
        $urunoogrencimasayukseklik = Urunogrencimasayukseklik::all()->count();
        $urunplakasize = Urunplakasize::all()->count();
        $urunsize = Urunpsize::all()->count();






        return view('backend.adminpanel',compact('sbs','blog',
            'blogkategori','iletisimliste',
            'user','user_dogru','user_false','chart','chart2','chart3','chart4'
            ,'uruncerceve','uruncert','uruncolor','urunmalzeme','urunmasacap','urunoogrencimasayukseklik','urunplakasize','urunsize'));
    }
}
