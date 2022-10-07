@extends('arka')

@section('content')

    <div class="col-md-12">
        <div class="card">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h2 class="text-center"> Destek Numarası: # {{ $ticket->ticket_id }} - Destek Başlık : <b>{{ $ticket->title }}</b></h2>

                        </div>
                        <div style="margin: 10px;" class="panel-body">

                            <p style="font-size: 25px;">Konu Mesajı:

                                {!! $ticket->message !!}</p>
                            <hr>
                            <p style="font-size: 25px;">Problem Kategori adı: {{ $category->name }}</p>
                            <hr>
                            <p style="font-size: 25px;">
                                @if ($ticket->status === 'Open')
                                    Durum: <span class="btn-xs btn-success">{{ $ticket->status }}</span>
                                @else
                                    Durum: <span class="btn-xs btn-danger">{{ $ticket->status }}</span>
                                @endif

                            </p>
                            <hr>
                            <p style="font-size: 25px;">Oluşturulma Zamanı: {{ $ticket->created_at->diffForHumans() }}</p>
                            <hr>
                            <p style="font-size: 25px;">Konuya Ek Mesajlar: </p>
                            <div  class="comments">
                                @foreach ($comments as $comment)
                                    <div class="panel panel-@if($ticket->user->id === $comment->user_id) {{"default"}}@else{{"success"}}@endif">
                                        <div class="panel panel-heading">
                                            <div style="border-style: dashed; border-width: 1px; margin-bottom: 15px;" class="card-text">
                                                <div style="margin: 10px;">
                                                    <h5>{{ $comment->user->name}} {{ $comment->user->sname }}

                                                        <span class="pull-right">{{ $comment->created_at->diffForHumans() }}</span>
                                                    </h5>
                                                    <hr>
                                                    Mesaj İçeriği : <b>{{ $comment->comment }}</b>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div class="comment-form">
                                <form action="{{ route('admin.ticket.yorum') }}" method="POST" class="form">
                                    {!! csrf_field() !!}

                                    <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">

                                    <div class="form-line{{ $errors->has('comment') ? ' has-error' : '' }}">
                                        <textarea rows="10" id="comment" class="form-control" name="comment"></textarea>


                                    </div>

                                    <div style="margin-top: 15px;" class="form-group text-center">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
