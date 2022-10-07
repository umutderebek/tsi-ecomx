<?php

namespace App\Http\Controllers\Tema;

use App\Tema\ContactSettings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class İletisimController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function iletisimayar()
    {

        $ayarlar = ContactSettings::findOrFail(1)->get();

        return view('backend.ayar.tema-iletisim',compact('ayarlar'));
    }
    public function kaydet()
    {
        $data = request()->only('adres','telefon','telefon_2','mail','mail2');

        $entry = ContactSettings::where('id',1)->firstOrFail();


        $entry->update($data);



        Toastr::success('Tema Ayarları Güncellendi','Success');

        return redirect()->route('admin.iletisim.getir',$entry->id);
    }
}
