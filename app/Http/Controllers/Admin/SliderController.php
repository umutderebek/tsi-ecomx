<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {
        return view('backend.slider.index');
    }

    public function create()
    {
        return view('backend.language.create');
    }

    public function store(Request $request)
    {
        $all = $request->except('_token');

        dd($all);
    }
}
