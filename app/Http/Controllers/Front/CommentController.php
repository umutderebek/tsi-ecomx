<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog\Comment;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function commentstore(Request $request)
    {

        $request->validate([
            'body'=>'required',
        ]);

        $input = $request->all();
        $input['user_id'] = auth()->user()->id;

        Comment::create($input);

        return back();

    }

    public function sil($id)
    {


        Comment::destroy($id);

        toastr()->success('Data has been deleted.');

        return redirect()->back();
    }


}
