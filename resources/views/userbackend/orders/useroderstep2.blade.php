@extends('layouts.anasayfa')

@section('aside-page-title','ABOUT US')

@section('sayfa-title')
    <title>Sipariş Oluştur  2. Adım | TechNorm Mühendislik & Danismanlik </title>
@endsection

@section('sayfa-description','')

@section('sayfa-keywords','')

@section('sayfa-author','')

@section('content')

    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
        <div class="container">
            <div class="row">
                <div class="col-md-8 order-2 order-md-1 align-self-center ">
                    <h1 class="text-dark">  <strong>Sipariş Oluştur  2. Adım</strong></h1>

                </div>
                <div class="col-md-4 order-1 order-md-2 align-self-center">
                    <ul class="breadcrumb d-block text-md-end">
                        <li><a href="#">Anasayfa</a></li>
                        <li class="active">Sipariş Oluştur  2. Adım</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div>
            <h4 class="mb-3 text-center">Siparis Detay Bilgileri</h4>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form class="contact-form form-squared-borders" action="{{route('order-step2-post')}}" method="POST">
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

                    <div class="row">
                        <div class="row">
                            <div class="form-group col">
                                <label class="form-label mb-1 text-2">Sipariş Amacı</label>
                                <div class="custom-select-1">
                                    <select class="form-select form-control h-auto py-2"  name="sipamac" required>
                                        <option value="">Seçiniz...</option>
                                        <option value="Belirtilen üretim adedi için parça başı birim fiyat istiyorum">Belirtilen üretim adedi için parça başı birim fiyat istiyorum</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label class="form-label mb-1 text-2">Parça Üretim Adedi</label>
                            <input type="text" value="" placeholder="Lütfen yüklediğiniz çizimlerden ilk baskıda kaçar adet üretilmesini istediğinizi giriniz" maxlength="100" class="form-control text-3 h-auto py-2" name="uretimadet" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <input type="submit" value="Gönder" class="btn btn-primary" >
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('js-extender')



    <script>
        /* Break back button */
        window.onload = function(){
            var i = 0;
            var previous_hash = window.location.hash;
            var x = setInterval(function(){
                i++;
                window.location.hash = "/noop/" + i;
                if (i==10){
                    clearInterval(x);
                    window.location.hash = previous_hash;
                }
            }, 10);
        }
    </script>


@stop
