<?php

namespace App\Http\Controllers\Admin\User;

use App\User;
use App\Userorder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {

        $users = User::all();



        return view('backend.customer.index',compact('users'));
    }

    public function show($id)
    {
        $users = User::where('id',$id)->firstOrFail();

        $userorder = Userorder::where('user_id',$id)->get();





        return view('backend.customer.show',compact('users',))->with('userorder',$userorder);
    }





    public function sil($id)
    {
        User::destroy($id);
        toastr()->success('Veri Başarıyla Silindi :)');
        return redirect()->back();
    }

}
