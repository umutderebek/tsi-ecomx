<?php

namespace App\Http\Controllers\Front;

use App\Models\Press\Presser;
use App\Tema\TemaSettings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class PressController extends Controller
{
    public function press()
    {
        $press = Presser::where('yayın',1)->orderByRaw('created_at DESC')->paginate(4);

        $temaayar = TemaSettings::all();

        return view('frontend.press.inpress',compact('temaayar','press'));
    }

    public function post($id)
    {
        $temaayar = TemaSettings::all();

        $press = Presser::whereslug($id)->firstOrFail();

        $popular = DB::table('treatment')
            ->orderByRaw('created_at DESC')
            ->get();

        return view('frontend.press.ppost',compact('temaayar','press','popular'));
    }
}
