<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Language;
use Illuminate\Http\Request;

use Brian2694\Toastr\Facades\Toastr;

class LanguageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('backend.language.index');
    }



    public function kaydet(Request $request)
    {
        $this->validate($request, [
            'name'   => 'required',
             'code'   => 'required'
        ]);

        $dil = new Language();

        $dil->name = request('name');
        $dil->code = request('code');

        $dil->save();


        Toastr::success('Dil Eklendi ','BAŞARILI');
        return redirect()->back();


    }
}
