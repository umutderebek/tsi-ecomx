@extends('layouts.anasayfa')

@section('aside-page-title','ABOUT US')

@section('sayfa-title')
    <title>Sipariş Oluştur  1. Adım | TechNorm Mühendislik & Danismanlik </title>
@endsection

@section('sayfa-description','')

@section('sayfa-keywords','')

@section('sayfa-author','')

@section('content')

    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
        <div class="container">
            <div class="row">
                <div class="col-md-8 order-2 order-md-1 align-self-center ">
                    <h1 class="text-dark">  <strong>Sipariş Oluştur  1. Adım</strong></h1>

                </div>
                <div class="col-md-4 order-1 order-md-2 align-self-center">
                    <ul class="breadcrumb d-block text-md-end">
                        <li><a href="#">Anasayfa</a></li>
                        <li class="active">Sipariş Oluştur  1. Adım</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div>
            <h4 class="mb-3 text-center">İletişim Bilgileri</h4>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <form class="contact-form form-squared-borders" action="{{route('order-step1-post')}}" method="POST">
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
                        <div class="form-group col-lg-4">
                            <label class="form-label mb-1 text-2">Adınız </label>
                            <input type="text" value="{{ Auth::user()->name ?? '' }}" placeholder="Lütfen Adınızı Giriniz" maxlength="100" class="form-control text-3 h-auto py-2" name="name" required>
                        </div>
                        <div class="form-group col-lg-4">
                            <label class="form-label mb-1 text-2">Soyadınız </label>
                            <input type="text" value="{{ Auth::user()->surname ?? '' }}" placeholder="Lütfen Soyadınızı Giriniz" maxlength="100" class="form-control text-3 h-auto py-2" name="surname" required>
                        </div>
                        <div class="form-group col-lg-4">
                            <label class="form-label mb-1 text-2">Eposta Adresiniz</label>
                            <input type="email" value="{{ Auth::user()->email ?? '' }}" placeholder="Lütfen E-postanızı Giriniz" data-msg-email="Please enter a valid email address." maxlength="100" class="form-control text-3 h-auto py-2" name="email" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="form-label">Şehir</label>
                            <input type="text" value="{{ Auth::user()->state ?? '' }}" placeholder="Lütfen Bulunduğunuzu Şehiri Giriniz" data-msg-email="Please enter a valid email address." maxlength="100" class="form-control text-3 h-auto py-2" name="state" required>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="form-label">Ülke</label>
                            <input type="text" value="{{ Auth::user()->country ?? '' }}" placeholder="Lütfen Bulunduğunuzu Ülkeyi Giriniz" data-msg-email="Please enter a valid email address." maxlength="100" class="form-control text-3 h-auto py-2" name="country" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label class="form-label mb-1 text-2">Firma</label>
                            <input type="text" value="{{ Auth::user()->company ?? '' }}" placeholder="Lütfen Firma adınızı Giriniz" maxlength="100" class="form-control text-3 h-auto py-2" name="company" required>
                        </div>
                        <div class="form-group col-lg-6">
                            <label class="form-label mb-1 text-2">Firma E-posta</label>
                            <input type="text" value="{{ $user->companyemail ?? '' }}" placeholder="Lütfen Firma E-posta adresinizi Giriniz" maxlength="100" class="form-control text-3 h-auto py-2" name="companyemail" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col">
                            <label class="form-label mb-1 text-2">Sipariş Notu</label>
                            <textarea value="{{ $user->siparisnot ?? '' }}" maxlength="5000" placeholder="Sipariş Notu Ekleyin..." rows="8" class="form-control text-3 h-auto py-2" name="siparisnot" required></textarea>
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






@stop
