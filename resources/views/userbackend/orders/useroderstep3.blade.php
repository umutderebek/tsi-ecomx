@extends('layouts.anasayfa')

@section('aside-page-title','ABOUT US')

@section('sayfa-title')
    <title>Sipariş Doğrulama | TechNorm Mühendislik & Danismanlik </title>
@endsection

@section('sayfa-description','')

@section('sayfa-keywords','')

@section('sayfa-author','')

@section('content')


    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
        <div class="container">
            <div class="row">
                <div class="col-md-8 order-2 order-md-1 align-self-center ">
                    <h1 class="text-dark">  <strong>Sipariş Doğrulama ve Dosya Yükleme 3. Adım</strong></h1>

                </div>
                <div class="col-md-4 order-1 order-md-2 align-self-center">
                    <ul class="breadcrumb d-block text-md-end">
                        <li><a href="#">Anasayfa</a></li>
                        <li class="active">Sipariş Doğrulama  3. Adım</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div style="margin-top: 50px;" class="container text-center">
        <div class="myaccount-content">
            <h2 class="text-center">Sipariş Doğrulama</h2>
                <div class="myaccount-table table-responsive text-center">

                    <table style="margin-top: 50px;" class="table table-bordered">
                        <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>isim</th>
                            <th>Soyisim</th>
                            <th>Email</th>
                            <th>Ülke</th>
                            <th>Şehir</th>
                            <th>company</th>
                            <th>companyemail</th>
                            <th>siparisnot</th>
                        </tr>
                        </thead>

                        <tr>

                            <td>{{$userorder->id}}</td>
                            <td>{{$userorder->name}}</td>
                            <td>{{$userorder->surname}}</td>
                            <td>{{$userorder->email}}</td>
                            <td>{{$userorder->country}}</td>
                            <td>{{$userorder->state}}</td>
                            <td>{{$userorder->company}}</td>
                            <td>{{$userorder->companyemail}}</td>
                            <td>{{$userorder->siparisnot}}</td>

                        </tr>

                    </table>
                </div>

        </div>
    </div>

    <div class="container text-center">
        <div class="myaccount-content">
            <div class="myaccount-table table-responsive text-center">

                <table style="margin-top: 50px;" class="table table-bordered">
                    <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Sipariş Amacı</th>
                        <th>Parça Üretim Adedi</th>
                        <th>Kalıp Ömrü Beklentisi</th>
                        <th>Malzeme Tipi</th>
                        <th>Yüzey Özelliği</th>
                    </tr>
                    </thead>

                    <tr>
                        <td>{{$userorder->id}}</td>
                        <td>{{$userorder->sipamac}}</td>
                        <td>{{$userorder->uretimadet}}</td>
                        <td>{{$userorder->omurbeklenti}}</td>
                        <td>{{$userorder->malzemetip}}</td>
                        <td>{{$userorder->yuzeyozellik}}</td>
                    </tr>

                </table>
            </div>

        </div>
    </div>

    <form class="contact-form form-squared-borders" action="{{route('order-step3-post',$userorder->id)}}" method="POST">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <input name="yayin" hidden value="{{$userorder->id}}">

    <div class="col-md-12">
        <div class="widget">
            <header class="widget-header text-center">
                <a class="btn btn-info" href="{{route('user.dosyaekle',$userorder->id)}}">Dosya Yükleme</a>
                <input class="btn btn-primary" type="submit" value="Doğrula">
            </header><!-- .widget-header -->

        </div><!-- .widget -->
    </div>
    </form>



@endsection

@section('js-extender')

@stop
