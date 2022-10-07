<?php

namespace App\Http\Controllers\Form;

use App\Http\Requests\ContactRequest;
use App\Mail\NewContactRequest;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function show()
    {
        return view('frontend.iletisim');
    }

    public function mail(ContactRequest $request)
    {

        Mail::to('info@rdglobal.com.tr','umutderebek@rdglobal.com.tr')->send(new NewContactRequest($request));
        Toastr::success('Your message has been successfully sent ','SUCCESS');
        return back();
    }

}
