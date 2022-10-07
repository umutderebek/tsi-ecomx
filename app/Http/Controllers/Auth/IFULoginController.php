<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IFULoginController extends Controller
{
    public function __construct()
    {

        $this->middleware('guest:ifu',['except' => ['logout']]);
    }

    public function showLoginForm() {

        return view('auth.login-ifu');
    }

    public function login(Request $request) {

        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('ifu')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){

            return redirect()->intended(route('ifu.dashboard'));
        }

        return redirect()->back()->withInput($request->only('email','remember'));
    }

    public function logout()
    {
        Auth::guard('ifu')->logout();

        return redirect()->route('anasayfa');
    }
}
