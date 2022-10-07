<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Mailers\AppTicMailer;
use App\Models\Ticket\AdminComment;
use App\Models\Ticket\Category;
use App\Models\Ticket\Comment;
use App\Models\Ticket\Ticket;
use App\Models\Ticket\TKategori;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {

        $ticket = Ticket::paginate(10);
        $categories = Category::all();


        return view('backend.Ticket.index', compact('ticket', 'categories'));
    }

    public function ticketkat($id)
    {
    $kategori = Category::where('slug',$id)->firstOrFail();
    $kategoris = Category::all();

    $ticket = Ticket::where('category_id',$kategori->id)->paginate(10);

    $deneme = $kategori->$kategori;

    return view('backend.ticket.tkategori',compact('kategori','kategoris','ticket','deneme'));

    }


    public function show($ticket_id)
    {
        $ticket = Ticket::where('ticket_id',$ticket_id)->firstOrFail();

        $comments = $ticket->comments;

        $category = $ticket->category;

        $kategoris = Category::all();

        return view('backend.Ticket.show',compact('comments','comments','category','ticket','kategoris'));
    }



    public function close($ticket_id)
    {
        $ticket = Ticket::where('ticket_id', $ticket_id)->firstOrFail();

        $ticket->status = 'Closed';

        $ticket->save();

        $ticketOwner = $ticket->user;



        return redirect()->back();
    }

    public function postComment(Request $request)
    {
        $this->validate($request, [
            'comment'   => 'required'
        ]);

        $comment = new AdminComment();

        $comment->ticket_id = request('ticket_id');

        $comment->comment = request('comment');

        $comment->admin_id = auth()->id();

        $comment->save();





        return redirect()->back();
    }
}
