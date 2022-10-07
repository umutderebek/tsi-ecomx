<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Session;

class AdminLoginController extends Controller
{
    public function __construct()
    {

        $this->middleware('guest:admin',['except' => ['logout']]);
    }

    public function showLoginForm() {

        return view('backend.auth.loginform');
    }

    public function login(Request $request) {

        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){

            return redirect()->intended(route('admin.dashboard'));
        }

        else{
            return redirect()->back()->withErrors('message','Please Check Your Account & password');
        }





    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect()->route('anasayfa');
    }
}
