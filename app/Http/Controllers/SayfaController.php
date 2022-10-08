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

        $kategoriler = Kategori::where('üst_id','=',null)->where('anasayfacikar','=',1)->get();

        $haber = Blog::where('yayın','=',1)->orderByRaw('created_at DESC')->take('3')->get();

        $hizmet = Treatment::all();
        $endustri = Endustri::all();




    return view('frontend.anasayfa',compact('temaayar','haber','endustri','hizmet','kategoriler'));
    }


    public function iletisim()
    {
        $ixtemaayar = ContactSettings::all();
        $temaayar = TemaSettings::all();

        return view('frontend.contact',compact('ixtemaayar','temaayar'));
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
