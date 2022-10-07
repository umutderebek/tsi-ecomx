<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Models\Contacter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function show($id)
    {

        $contact = Contacter::where('id',$id)->firstOrFail();

        return view('backend.contact.show',compact('contact'));
    }

    public function index()
    {
        $sbs = Contacter::all();
        return view('backend.contact.index',compact('sbs'));
    }

    public function sil($id)
    {
        Contacter::destroy($id);
        toastr()->success('Veri Başarıyla Silindi :)');
        return redirect()->back();
    }
}
