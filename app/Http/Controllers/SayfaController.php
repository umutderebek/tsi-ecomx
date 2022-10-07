<?php

namespace App\Http\Controllers;


use App\Http\Requests\ContactRequest;
use App\Mail\NewContactRequest;

use App\Mail\NewSubscribeRequest;
use App\Models\Blog\Blog;
use App\Models\Endustri\Endustri;
use App\Models\Forms\Contact;
use App\Models\KategoriUrun\Kategori;
use App\Models\KategoriUrun\Urun;
use App\Models\Subscribers;
use App\Models\Treatment\Treatment;
use App\Tema\ContactSettings;
use App\Tema\Popup;
use App\Tema\TemaSettings;

use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Facades\DB;

class SayfaController extends Controller
{
    public function index()
    {
        $temaayar = TemaSettings::all();

       /* $kat = DB::table('kategori')->where('id', '5')->get();
        $kat1= DB::table('kategori')->where('id', '6')->get();
        $kat2= DB::table('kategori')->where('id', '7')->get();
        $kat3= DB::table('kategori')->where('id', '8')->get();
        $kat4= DB::table('kategori')->where('id', '9')->get();*/

        $haber = Blog::where('yayın','=',1)->orderByRaw('created_at DESC')->take('3')->get();

        $hizmet = Treatment::all();
        $endustri = Endustri::all();




    return view('frontend.sayfalar.en.anasayfa',compact('temaayar','haber','endustri','hizmet'));
    }

    public function getHomeCats(){
        $katsdb=DB::table('kategori')->whereIn('id',array(6,7,8))->orderBy("id","desc")->get();
        header('Content-Type: application/json; charset=utf-8');
        $slideImg=array("","","disease-information","patients-feedback","invamed-worldwide");
        $slideImgarr=array("","","diseaseinformation","patientfeedback","Invamedworldwide");
        $kats=array(
            array("name"=>"SCIENTIFIC EVIDENCE", "slug"=>"scientific-evidence", "image"=>"evidenceslidercard.jpg")
        );
        $i=2;
        foreach ($katsdb as $kat){
            $kats[]=array("name"=>$kat->kategori_adi, "slug"=>"categories/".$slideImg[$i], "image"=>$slideImgarr[$i].".jpg");
            $i++;
        }
        $kats[]=array("name"=>"NEWS", "slug"=>"news", "image"=>"news.jpg");
        echo json_encode($kats);
        exit;
    }

    public function iletisim()
    {
        $ixtemaayar = ContactSettings::all();
        $temaayar = TemaSettings::all();

        return view('frontend.sayfalar.en.iletisim',compact('ixtemaayar','temaayar'));
    }

    public function mail(Request $request)
    {
        request()->validate([
            'name',
            'email',
            'subject',
            'message',

        ]);

        Contact::create($request->all());

        $data=array('name'=>$request->input('name'),'email'=>$request->input('email'),'subject'=>$request->input('subject'),'message'=>$request->input('message'));

        $this->sendMail($data);


        toastr()->success('Your message has been successfully sent');
        return back();

    }
    private function sendMail($data) {

        //dd($request->all());



        $name = $data['name'];
        $email = $data['email'];
        $subject = $data['subject'];
        $message = $data['message'];


        \Mail::send('frontend.sayfalar.visitoremail', ['name' => $name, 'email' => $email, 'subject' => $subject, 'message' => $message], function ($message) {

            $message->to('globalsales@invamed.com')->subject('Websitesinden mesaj');
        });
        toastr()->success('Your message has been successfully sent');
        return back();

    }
    public function mailer(Request $request)
    {
        request()->validate([
            'name',
        ]);

        ContactMailer::create($request->all());
        Cookie::queue('popcookie', true, 15);
        return back();


    }

    public function subs(Request $request)
    {
        request()->validate([
            'email',
        ]);

        Subscribers::create($request->all());

        Mail::to('info@rdglobal.com.tr')->send(new NewSubscribeRequest($request));
        toastr()->success('Thank you for your subscription');


        return back();
    }

    public function unsub()
    {
        $temaayar = TemaSettings::all();

        return view('unsub.en.unsub',compact('temaayar'));

    }

    public function unsbber(Request $request)
    {
        request()->validate([
            'email',
        ]);
        DB::table('unscribe')->insert([
           'email'=>$request->input('email'),

        ]);
        DB::table('subscribers')->where('email', $request->input('email'))->delete();


        toastr()->success('Thank you for your request your email deleted');

        return back();
    }

    public function hakkimda()
    {
        $temaayar = TemaSettings::all();
        return view('frontend.sayfalar.en.hakkimda',compact('temaayar'));
    }

    public function business()
    {
        $temaayar = TemaSettings::all();
        return view('frontend.sayfalar.en.business',compact('temaayar'));
    }
    public function career()
    {
        $temaayar = TemaSettings::all();
        return view('frontend.sayfalar.en.career',compact('temaayar'));
    }

    public function presskit()
    {
        $temaayar = TemaSettings::all();

        return view('frontend.sayfalar.en.press-kit',compact('temaayar'));
    }

    public function rdglobalwhiteblue()
    {
        $file= public_path(). "/frontend/logolar/rdglobal-whiteblue-mediapack.zip";

        return response()->download($file);
    }

    public function rdglobalwhite()
    {
        $file= public_path(). "/frontend/logolar/rdglobal-white-mediapack.zip";

        return response()->download($file);
    }
    public function rdglobalfull()
    {
        $file= public_path(). "/frontend/logolar/rdglobal-full-mediapack.zip";

        return response()->download($file);
    }

    public function invamedwhite()
    {
        $file= public_path(). "/frontend/logolar/invamed-white-mediapack.zip";

        return response()->download($file);
    }
    public function invamedfull()
    {
        $file= public_path(). "/frontend/logolar/invamed-full-mediapack.zip";

        return response()->download($file);
    }

    public function rdinvamedwhiteblue()
    {
        $file= public_path(). "/frontend/logolar/rdglobal-invamed-whiteblue-medipack.zip";

        return response()->download($file);
    }

    public function rdinvamedwhite()
    {
        $file= public_path(). "/frontend/logolar/rdglobal-invamed-white-mediapack.zip";

        return response()->download($file);
    }

    public function rdinvamedfull()
    {
        $file= public_path(). "/frontend/logolar/rdglobal-invamed-fullcolor.zip";

        return response()->download($file);
    }

    public function termscondition()
    {
        $temaayar = TemaSettings::all();

        return view('frontend.sayfalar.en.termscondition',compact('temaayar'));
    }

    public function privacystatements()
    {
        $temaayar = TemaSettings::all();

        return view('frontend.sayfalar.en.privacystatement',compact('temaayar'));

    }



    public function catalogues ()
    {
        $temaayar = TemaSettings::all();

        return view('frontend.sayfalar.en.catalogues',compact('temaayar'));
    }

    public function arterialcatalog()
    {
        $file= public_path(). "/frontend/catalogues/arterial-web.pdf";

        return response()->download($file);
    }

    public function cardiaccatalog()
    {
        $file= public_path(). "/frontend/catalogues/cardiac-web.pdf";

        return response()->download($file);
    }

    public function neurovascularcatalog()
    {
        $file= public_path(). "/frontend/catalogues/neuro-web.pdf";

        return response()->download($file);
    }

    public function venouscatalog()
    {
        $file= public_path(). "/frontend/catalogues/venous-web.pdf";

        return response()->download($file);
    }

    public function video ()
    {
        $temaayar = TemaSettings::all();

        return view('frontend.sayfalar.en.video',compact('temaayar'));
    }

    public function video2 ()
    {
        $temaayar = TemaSettings::all();

        return view('frontend.sayfalar.en.video2',compact('temaayar'));
    }

    public function video3 ()
    {
        $temaayar = TemaSettings::all();

        return view('frontend.sayfalar.en.video3',compact('temaayar'));
    }


    //ifu single

    public function ifuvenablock(){

        $temaayar = TemaSettings::all();


        return view('frontend.sayfalar.en.ifu.venablock',compact('temaayar'));
    }

    public function ifuveinoff(){

        $temaayar = TemaSettings::all();


        return view('frontend.sayfalar.en.ifu.veinoff',compact('temaayar'));
    }

    public function ifuthermoblock(){

        $temaayar = TemaSettings::all();


        return view('frontend.sayfalar.en.ifu.thermoblock',compact('temaayar'));
    }



    public function healthy()
    {
        $temaayar = TemaSettings::all();
        return view('frontend.anasayfa.en.cat.healthy',compact('temaayar'));
    }

    public function disase()
    {
        $temaayar = TemaSettings::all();
        return view('frontend.anasayfa.en.cat.disase',compact('temaayar'));
    }

    public function feedback()
    {
        $temaayar = TemaSettings::all();
        return view('frontend.anasayfa.en.cat.feedback',compact('temaayar'));
    }

    public function patient()
    {
        $temaayar = TemaSettings::all();
    return view('frontend.anasayfa.en.patient',compact('temaayar'));
    }

    public function worldwide()
    {
        $temaayar = TemaSettings::all();
        return view('frontend.anasayfa.en.cat.worldwide',compact('temaayar'));
    }

    public function carreer()
    {
        $temaayar = TemaSettings::all();
        return view('frontend.anasayfa.en.carreer',compact('temaayar'));
    }

    public function exercise()
    {
        $temaayar = TemaSettings::all();
        return view('frontend.anasayfa.en.exercise',compact('temaayar'));
    }

    public function eat()
    {
        $temaayar = TemaSettings::all();
        return view('frontend.anasayfa.en.eat',compact('temaayar'));
    }

    public function mental()
    {
        $temaayar = TemaSettings::all();
        return view('frontend.anasayfa.en.mental',compact('temaayar'));
    }

    public function varicose()
    {
        $temaayar = TemaSettings::all();
        return view('frontend.anasayfa.en.varicose',compact('temaayar'));
    }

    public function dvt()
    {
        $temaayar = TemaSettings::all();
        return view('frontend.anasayfa.en.dvt',compact('temaayar'));
    }

    public function pad()
    {
        $temaayar = TemaSettings::all();
        return view('frontend.anasayfa.en.pat',compact('temaayar'));
    }

    public function effective()
    {
        $temaayar = TemaSettings::all();
        return view('frontend.anasayfa.en.effective',compact('temaayar'));
    }



    public function partners()
    {
        $temaayar = TemaSettings::all();
        return view('frontend.anasayfa.en.partners',compact('temaayar'));
    }

    public function events()
    {
        $temaayar = TemaSettings::all();
        return view('frontend.anasayfa.en.events',compact('temaayar'));
    }

    public function news()
    {
        $temaayar = TemaSettings::all();
        return view('frontend.anasayfa.en.news',compact('temaayar'));
    }


    public function covid19pandemi()
    {
        $temaayar = TemaSettings::all();

        return view('frontend.anasayfa.en.spechaber.covid19',compact('temaayar'));
    }

    public function healthcare()
    {
        $temaayar = TemaSettings::all();

        return view('frontend.anasayfa.en.spechaber.covid19',compact('temaayar'));
    }

    public function healtcareaward()
    {
        $temaayar = TemaSettings::all();

        return view('frontend.anasayfa.en.spechaber.healtcareaward',compact('temaayar'));
    }




    public function ara(Request $request)
    {

        $aranan = request()->input('aranan');
        if(is_null($aranan)){
        return redirect()->route('home');

        }
        $urunler = Urun::where('urun_ara','like',"%$aranan%")->paginate(9);


        $temaayar = TemaSettings::all();

        request()->flash();

        $kategoriler = Kategori::all();


        $siralama = request('shortby');


        if ($siralama == 'most-popular')
        {
            $urunler = Urun::where('urun_ara','like',"%'.strtolower($aranan).'%")->paginate(9);
        }
        $urunler->appends(['aranan'=>$aranan]);
        return view('frontend.sayfalar.en.ara',compact('urunler','temaayar','aranan','kategoriler'));


    }


}
