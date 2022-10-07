<?php

namespace App\Http\Controllers\Tema;

use App\Tema\TemaAyarları;
use App\Tema\TemaSettings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
class TemaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function temaayar()
    {

        $ayarlar = TemaSettings::findOrFail(1)->get();

        return view('backend.ayar.tema-ayar',compact('ayarlar'));
    }

    public function kaydet()
    {
        $data = request()->only('adres','telefon','telefon_2','mail','logo','mail_2','facebook','twitter','youtube','link','insta');

        $entry = TemaSettings::where('id',1)->firstOrFail();


        $entry->update($data);


        if(request()->hasFile('logo'))
        {
            $this->validate(request(),[
                'logo' => 'image|mimes:jpg,png,jpeg,gif|max:2048'
            ]);

            $urun_resmi = request()->file('logo');
            $urun_resmi = request()->logo;

            $dosyad = $entry->id . "-" . time() . "." . $urun_resmi->extension();

            if($urun_resmi->isValid())
            {
                $urun_resmi->move('uploads/theme',$dosyad);

                TemaSettings::updateOrCreate(
                    ['id' => $entry->id],
                    ['logo'=> $dosyad]
                );

            }
        }


        toastr()->success('Tema Ayarları Güncellendi');


        return redirect()->route('admintema.getir',$entry->id);
    }

}
