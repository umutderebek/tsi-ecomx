@extends('layouts.anasayfa')

@section('aside-page-title','HOME')

@section('sayfa-title')
    <title>Panel | TechNorm Mühendislik & Danismanlik  </title>
@endsection


@section('sayfa-description')@endsection

@section('sayfa-keywords')@endsection

@section('sayfa-author','Rd Global Admin')

@section('tw-title')TechNorm Mühendislik & Danismanlik @endsection
@section('tw-site','@rdglobal_inc')
@section('tw-description')@endsection

@section('fc-title')TechNorm Mühendislik & Danismanlik @endsection

@section('fc-image') @endsection
@section('fc-description') @endsection

@section('content')

    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
        <div class="container">
            <div class="row">
                <div class="col-md-8 order-2 order-md-1 align-self-center ">
                    <h1 class="text-dark">  <strong>Oluşturulan Siparişler</strong></h1>

                </div>
                <div class="col-md-4 order-1 order-md-2 align-self-center">
                    <ul class="breadcrumb d-block text-md-end">
                        <li><a href="#">Anasayfa</a></li>
                        <li class="active">Oluşturulan Siparişler</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

<div class="container">
    <div class="col-md-12">
        <div class="widget">
            <div class="widget-body">
                <div class="table-responsive">
                    <table class="table  text-center">
                        <thead>
                        <tr>

                            <th class="text-center">#</th>
                            <th class="text-center">Sipariş Ad & Soyad</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Firma</th>
                            <th class="text-center">Sipariş Not</th>
                            <th class="text-center">Üretim Adeti</th>
                            <th class="text-center">yayin</th>
                            <th class="text-center">Ayarlar</th>
                        </tr>
                        </thead>
                        @foreach($userorder as $order)
                            <tbody>
                            <tr>
                                <td>P00{{$order->id}}</td>
                                <td>{{$order->name}} - {{$order->surname}}</td>
                                <td>{{$order->email}}</td>
                                <td>{{$order->company}}</td>
                                <td>{{$order->siparisnot}}</td>
                                <td>{{$order->uretimadet}}</td>
                                <td>
                                    @if($order->yayin == 1)
                                        <span class="btn btn-success">yayında</span>
                                    @else
                                        <span class="btn btn-warning">taslak</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('user.siparis.duzenle',$order->id)}}" >
                                        <button class=" btn-xs btn-warning">Düzenle</button>
                                    </a>
                                    <div  class="col mt-1">
                                        <a  href="{{ route('user.siparis.sil',$order->id) }}"
                                            data-toggle="tooltip" data-placement="top" title="sil"
                                            onclick="return confirm('Veriyi Silerseniz geri döndüremezsiniz. Silmek istiyor musunuz ? ')"
                                        >
                                            <button class="btn-xs btn-danger ">Sil</button>
                                        </a>

                                    </div>
                                </td>

                            </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div><!-- .widget -->
    </div>

</div>




@endsection
