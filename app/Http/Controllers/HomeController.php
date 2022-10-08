<?php

namespace App\Http\Controllers;

use App\Models\Endustri\Endustri;
use App\Models\KategoriUrun\Kategori;
use App\Models\Treatment\Treatment;
use App\Models\Userbilling;
use App\Orderfiles;
use App\Tema\TemaSettings;
use App\User;
use App\Orderdosya;
use App\Userorder;
use App\Usershipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = Auth::id();
        $userorder = Userorder::where('user_id',$user_id)->get();
        $hizmet = Treatment::all();
        $endustri = Endustri::all();
        $kategoriler = Kategori::Where('üst_id','=',null)->where('anasayfacikar','=',1)->get();


        $temaayar = TemaSettings::all();
        return view('home',compact('temaayar','userorder','hizmet','endustri','kategoriler'));
    }

    public function sil($id)
    {
        Userorder::destroy($id);
        toastr()->success('Veri Başarıyla Güncellendi :)');
        return redirect()->route('dashboard');
    }

    public function edit($id)
    {
        $userorder = Userorder::find($id);
        $temaayar = TemaSettings::all();
        $hizmet = Treatment::all();
        $endustri = Endustri::all();
        $kategoriler = Kategori::Where('üst_id','=',null)->where('anasayfacikar','=',1)->get();
        return view('userbackend.orders.duzenle',compact('userorder','temaayar','hizmet','endustri','kategoriler'));
    }


    public function adminHome()
    {
        return view('backend.adminpanel');
    }

    public function profile()
    {
        $user_id = auth()->id();
        $user = User::where('id',$user_id)->firstOrFail();

        $hizmet = Treatment::all();
        $endustri = Endustri::all();
        $temaayar = TemaSettings::all();

        $kategoriler = Kategori::Where('üst_id','=',null)->where('anasayfacikar','=',1)->get();


        return view('userbackend.profile.index',compact('user','temaayar','hizmet','endustri','kategoriler'));
    }

    public function profilesave(Request $request)
    {


        if($request->has('urun_resmi'))
        {
            $name = $request->input('name');
            $surname = $request->input('surname');
            $email = $request->input('email');
            $phone = $request->input('phone');
            $company = $request->input('company');
            $website = $request->input('website');
            $address = $request->input('address');
            $country = $request->input('country');
            $state = $request->input('state');
            $urun_resmi = $request->input('urun_resmi');


            if($request->file('urun_resmi'))
            {
                $file = $request->file('urun_resmi');
                $file->move('frontend/uploads/profile',$file->getClientOriginalName());
                $urun_resmi = $file->getClientOriginalName();
            }

            DB::table('users')
                ->where('id', '=', Auth::user()->id)
                ->update([
                    'name' => $name,
                    'surname' => $surname,
                    'email' => $email,
                    'phone' => $phone,
                    'company' => $company,
                    'website' => $website,
                    'address' => $address,
                    'country' => $country,
                    'state' => $state,
                    'urun_resmi' => $urun_resmi,
                ]);
        }

        else{
            $name = $request->input('name');
            $surname = $request->input('surname');
            $email = $request->input('email');
            $phone = $request->input('phone');
            $company = $request->input('company');
            $website = $request->input('website');
            $address = $request->input('address');
            $country = $request->input('country');
            $state = $request->input('state');
            DB::table('users')
                ->where('id', '=', Auth::user()->id)
                ->update([
                    'name' => $name,
                    'surname' => $surname,
                    'email' => $email,
                    'phone' => $phone,
                    'company' => $company,
                    'website' => $website,
                    'address' => $address,
                    'country' => $country,
                    'state' => $state,
                ]);
        }







        toastr()->success('Veri Başarıyla Güncellendi :)');

        return redirect()->route('dashboard','#account-details');

    }

    public function sifreform()
    {
        $temaayar = TemaSettings::all();
        return view('auth.changepassword',compact('temaayar'));
    }

    public function Showcphl(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches

            toastr()->error('The password defined in the system and your current password are not the same. Please check again.');

            return redirect()->back();
        }

        $sifre1 = $request->get('new-password-confirmation');
        $sifre2 = $request->get('new-password');

        if ($sifre2 == $sifre1)
        {

            //Change Password
            $user = Auth::user();
            $user->password = bcrypt($request->get('new-password'));
            $user->save();

            toastr()->success('Your password is updated.');

            return redirect()->back();
        }
        else{
            toastr()->error('Your new passwords donnt match. Please check again.');
            return redirect()->back();
        }



    }

    public function emailform()
    {
        $temaayar = TemaSettings::all();
        return view('auth.changemail',compact('temaayar'));
    }

    public function mailsjsj(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches

            return redirect()->back()->with("error","The password defined in the system and your current password are not the same. Please check again.");
        }

        $email1 = $request->get('new-mail');
        $email2 = $request->get('new-mail_confirmation');

        if($email1 == $email2)
        {

            $user = Auth::user();

            $user->email = $request->get('new-mail');



            $user->save();

            toastr()->success('Your email adress is updated.');

            return redirect()->back();
        }
        else{
            toastr()->error('Your new email addresses dont match. Please check again.');


            return redirect()->back();
        }
    }


    public function createStep1(Request $request)
    {
        $kategoriler = Kategori::Where('üst_id','=',null)->where('anasayfacikar','=',1)->get();
        $userorder = $request->session()->get('userorder');
        $temaayar = TemaSettings::all();
        $hizmet = Treatment::all();
        $endustri = Endustri::all();
        return view('userbackend.orders.useroderstep1',compact('userorder','temaayar','hizmet','endustri','kategoriler'));
    }

    public function createStep2(Request $request)
    {
        $kategoriler = Kategori::Where('üst_id','=',null)->where('anasayfacikar','=',1)->get();
        $hizmet = Treatment::all();
        $endustri = Endustri::all();
        $userorder = $request->session()->get('userorder');

        $temaayar = TemaSettings::all();
        return view('userbackend.orders.useroderstep2',compact('userorder','temaayar','hizmet','endustri','kategoriler'));
    }

    public function createStep3(Request $request)
    {
        $kategoriler = Kategori::Where('üst_id','=',null)->where('anasayfacikar','=',1)->get();
        $userorder = Userorder::latest()->first();
        $hizmet = Treatment::all();
        $endustri = Endustri::all();

        $temaayar = TemaSettings::all();
        return view('userbackend.orders.useroderstep3',compact('temaayar','userorder','hizmet','endustri','kategoriler'));
    }

    public function postCreateStep1(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'state' => 'required',
            'country' => 'required',
            'company' => 'required',
            'companyemail' => 'required',
            'siparisnot' => 'required',
        ]);
        if(empty($request->session()->get('userorder'))){
            $userorder = new Userorder();
            $userorder->fill($validatedData);
            $request->session()->put('userorders', $userorder);
        }else{
            $userorder = $request->session()->get('userorders');
            $userorder->fill($validatedData);
            $request->session()->put('userorders', $userorder);
        }
        $user_id = auth()->id();
        $userorder['user_id'] = $user_id;

        return redirect('user-order/create-step2');

    }

    public function postCreateStep2(Request $request ,$id= 0)
    {
        $validatedData = $request->validate([
            'sipamac' => 'required',
            'uretimadet' => 'required',
        ]);

        $userorder = $request->session()->get('userorders');
        $userorder->fill($validatedData);
        $userorder->save();
        $request->session()->forget('userorders');
        return redirect()->route('order-step3');
    }

    public function postCreateStep3($id)
    {
        DB::table('userorders')
            ->where('id', '=', $id)
            ->update([
                'yayin' => 1,
            ]);



        toastr()->success('Veri Başarıyla Güncellendi :)');

        return redirect()->route('dashboard');

    }

    public function pasif($id)
    {
        DB::table('userorders')
            ->where('id', '=', $id)
            ->update([
                'yayin' => 0,
            ]);

        toastr()->success('Veri Başarıyla Güncellendi :)');

        return redirect()->route('dashboard');

    }

    public function aktif($id)
    {
        DB::table('userorders')
            ->where('id', '=', $id)
            ->update([
                'yayin' => 1,
            ]);

        toastr()->success('Veri Başarıyla Güncellendi :)');

        return redirect()->route('dashboard');

    }

    public function orderguncelle(Request $request,$id)
    {

        request()->validate([
            'name' =>'required',
            'surname' =>'required',
            'email'=>'required',
            'country'=>'required',
            'state'=>'required',
            'company'=>'required',
            'companyemail'=>'required',
            'siparisnot'=>'required',
            'sipamac'=>'required',
            'uretimadet'=>'required',
        ]);

        $userorder = Userorder::find($id);
        $userorder->name = request('name');
        $userorder->surname = request('surname');
        $userorder->email = request('email');
        $userorder->country = request('country');
        $userorder->state = request('state');
        $userorder->company = request('company');
        $userorder->companyemail = request('companyemail');
        $userorder->siparisnot = request('siparisnot');
        $userorder->sipamac = request('sipamac');
        $userorder->uretimadet = request('uretimadet');

        $userorder->update();


        return redirect()->back();




    }



    public function dfilestore(Request $request,$id)
    {
        $image = $request->file('file');
        $imageName = $image->getClientOriginalName();
        $image->move(public_path('frontend/uploads/dosyalar'),$imageName);

        $imageupload = new Orderdosya();

        $imageupload->user_id = request('user_id');
        $imageupload->order_id = request('order_id');
        $imageupload->imagex = $imageName;
        $imageupload->save();

    }

    public function createorder($id)
    {
        $kategoriler = Kategori::Where('üst_id','=',null)->where('anasayfacikar','=',1)->get();
        $hizmet = Treatment::all();
        $endustri = Endustri::all();
        $photos = Orderdosya::where('order_id',$id)->get();
        $userorder = Userorder::latest()->first();
        $user_id = Auth::id();

        $user = User::findOrFail($user_id);

        $temaayar = TemaSettings::all();

        return view('userbackend.orders.index',compact('temaayar','user','photos','userorder','hizmet','endustri','kategoriler'));
    }


    public function dosyadestroy($id)
    {
        Orderdosya::destroy($id);
        toastr()->success('Veri Başarıyla Silindi :)');

        return redirect()->back();

    }

    public function billing ($id)
    {
        $userdetay = Userbilling::where('id',$id)->firstOrFail();
        $kategoriler = Kategori::Where('üst_id','=',null)->where('anasayfacikar','=',1)->get();
        $temaayar = TemaSettings::where('id',1)->get();
        return view('userbackend.billing.index',compact('temaayar','userdetay','kategoriler'));

    }


    public function billkaydet(Request $request, $id)
    {
        $userdetay = Userbilling::find($id);
        $userdetay->country = request('country');
        $userdetay->name_surname = request('name_surname');
        $userdetay->state = request('state');
        $userdetay->adress = request('adress');
        $userdetay->adress2 = request('adress2');
        $userdetay->firm_name = request('firm_name');
        $userdetay->country_firm = request('country_firm');
        $userdetay->state_firm = request('state_firm');
        $userdetay->taxno = request('taxno');
        $userdetay->zipcode = request('zipcode');
        $userdetay->update();

        toastr()->success('Veri Başarıyla Güncellendi :)');

        return redirect()->route('dashboard');
    }


    public function shipping ($id)
    {
        $kategoriler = Kategori::Where('üst_id','=',null)->where('anasayfacikar','=',1)->get();
        $usershipper = Usershipping::where('id',$id)->firstOrFail();
        $temaayar = TemaSettings::where('id',1)->get();

        return view('userbackend.shipping.index',compact('temaayar','usershipper','kategoriler'));
    }

    public function shipkaydet(Request $request, $id)
    {
        request()->validate([
            'state' =>'required',
            'country' =>'required',
            'adress'=>'required',
            'adress2'=>'required',
            'zipcode'=>'required',
        ]);
        $userdetay = Usershipping::find($id);
        $userdetay->state = request('state');
        $userdetay->country = request('country');
        $userdetay->adress = request('adress');
        $userdetay->adress2 = request('adress2');
        $userdetay->zipcode = request('zipcode');
        $userdetay->update();

        toastr()->success('Veri Başarıyla Güncellendi :)');

        return redirect()->route('dashboard');

    }

}
