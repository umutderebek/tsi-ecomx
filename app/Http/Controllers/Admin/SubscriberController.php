<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subscribers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
       $sbs = Subscribers::all();

        return view('backend.subscriber.index',compact('sbs'));
    }

    public function destroy($subscriber)
    {
        $subscriber = Subscribers::findOrFail($subscriber);
        $subscriber->delete();
        toastr()->success('Veri Başarıyla Silindi :)');
        return redirect()->back();
    }
}
