@extends('layouts.anasayfa')

@section('aside-page-title','ABOUT US')

@section('sayfa-title')
    <title>Siparis Detay | TechNorm Mühendislik & Danismanlik </title>
@endsection

@section('sayfa-description','')

@section('sayfa-keywords','')

@section('sayfa-author','')

@section('content')

    <div class="container">
        <div class="bg-content">
            <a style="margin-top: 25px;"  href="{{route('siparisler')}}" class="btn btn-sm btn-primary">
                <i class="glyphicon glyphicon-arrow-left"></i> Return Orders            </a>
            <h2 class="text-center">Order (SP-{{$siparis->id}})</h2>
            <table class="table table table-hover ">
                <tr>
                    <th colspan="2">Product</th>

                    <th>Quentity</th>

                    <th>Status</th>
                </tr>
                @foreach($siparis->sepet->sepet_urunler as $sepet_urun)
                    <tr>
                        <td style="width: 120px;">
                            <a href="{{route('urun',$sepet_urun->urun->slug)}}">
                                <img src="http://via.placeholder.com/120x100?text=UrunResmi">
                            </a>
                        </td>

                        <td>
                            <a href="{{route('urun',$sepet_urun->urun->slug)}}">
                                {{$sepet_urun->urun->urun_adi}}
                            </a>
                        </td>

                        <td>{{$sepet_urun->adet}}</td>

                        <td>{{$sepet_urun->durum}}</td>

                    </tr>
                @endforeach

            </table>
        </div>
    </div>




@endsection

@section('js-extender')




@stop
