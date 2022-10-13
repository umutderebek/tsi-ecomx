<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Mailers\AppTicMailer;
use App\Models\KategoriUrun\Uruncerceverenk;
use App\Models\KategoriUrun\Uruncert;
use App\Models\KategoriUrun\Uruncolor;
use App\Models\KategoriUrun\Urunmalzeme;
use App\Models\KategoriUrun\Urunmasacap;
use App\Models\KategoriUrun\Urunogrencimasayukseklik;
use App\Models\KategoriUrun\Urunplakasize;
use App\Models\KategoriUrun\Urunpsize;
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

        $uruncerceve = Uruncerceverenk::all()->count();
        $uruncert = Uruncert::all()->count();
        $uruncolor = Uruncolor::all()->count();
        $urunmalzeme = Urunmalzeme::all()->count();
        $urunmasacap = Urunmasacap::all()->count();
        $urunoogrencimasayukseklik = Urunogrencimasayukseklik::all()->count();
        $urunplakasize = Urunplakasize::all()->count();
        $urunsize = Urunpsize::all()->count();


        return view('backend.Ticket.index', compact('ticket', 'categories','uruncerceve','uruncert','uruncolor','urunmalzeme','urunmasacap',
            'urunoogrencimasayukseklik','urunplakasize','urunsize'));
    }

    public function ticketkat($id)
    {
    $kategori = Category::where('slug',$id)->firstOrFail();
    $kategoris = Category::all();

    $ticket = Ticket::where('category_id',$kategori->id)->paginate(10);

    $deneme = $kategori->$kategori;

        $uruncerceve = Uruncerceverenk::all()->count();
        $uruncert = Uruncert::all()->count();
        $uruncolor = Uruncolor::all()->count();
        $urunmalzeme = Urunmalzeme::all()->count();
        $urunmasacap = Urunmasacap::all()->count();
        $urunoogrencimasayukseklik = Urunogrencimasayukseklik::all()->count();
        $urunplakasize = Urunplakasize::all()->count();
        $urunsize = Urunpsize::all()->count();

    return view('backend.ticket.tkategori',compact('kategori','kategoris','ticket','deneme', 'categories','uruncerceve','uruncert','uruncolor','urunmalzeme','urunmasacap',
        'urunoogrencimasayukseklik','urunplakasize','urunsize'));

    }


    public function show($ticket_id)
    {
        $ticket = Ticket::where('ticket_id',$ticket_id)->firstOrFail();

        $comments = $ticket->comments;

        $category = $ticket->category;

        $kategoris = Category::all();

        $uruncerceve = Uruncerceverenk::all()->count();
        $uruncert = Uruncert::all()->count();
        $uruncolor = Uruncolor::all()->count();
        $urunmalzeme = Urunmalzeme::all()->count();
        $urunmasacap = Urunmasacap::all()->count();
        $urunoogrencimasayukseklik = Urunogrencimasayukseklik::all()->count();
        $urunplakasize = Urunplakasize::all()->count();
        $urunsize = Urunpsize::all()->count();

        return view('backend.Ticket.show',compact('comments','comments','category','ticket','kategoris','kategoris','ticket','deneme', 'categories','uruncerceve','uruncert','uruncolor','urunmalzeme','urunmasacap',
            'urunoogrencimasayukseklik','urunplakasize','urunsize'));
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
