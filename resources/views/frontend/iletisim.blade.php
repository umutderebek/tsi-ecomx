@extends('layouts.anasayfa')

@section('aside-page-title','ABOUT US')

@section('sayfa-title')
    <title>İletişim | Abramak Kalıp Teknolojileri </title>
@endsection

@section('sayfa-description','')

@section('sayfa-keywords','')

@section('sayfa-author','')

@section('content')

    {!! NoCaptcha::renderJs() !!}


    <iframe class="mapbox2" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3057.5978352446923!2d32.7438947667966!3d39.972743396643274!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14d349be648c87eb%3A0x25cc850ecdd8734b!2sOstim%2C%20100.%20Y%C4%B1l%20Blv%20OF%C4%B0M%20%C4%B0%C5%9F%20Merkezi%20No%3A99%2C%2006374%20Ostim%20Osb%2FYenimahalle%2FAnkara!5e0!3m2!1str!2str!4v1663259253575!5m2!1str!2str" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>



    <div class="container py-4 my-5">
        @foreach($temaayar as $ayar)
        <div class="row align-items-center">
            <div class="col-lg-5 col-xl-4 offset-xl-1 mb-5 mb-lg-0">
                <div class="overflow-hidden">
                    <h2 class="text-color-dark font-weight-bold line-height-3 text-5-5 mb-0" >{{$ayar->adres}}</h2>
                </div>

                <ul class="list list-unstyled text-color-dark font-weight-bold text-4 py-2 my-4 " >
                    <li class="d-flex align-items-center mb-2">
                        <i class="icons icon-envelope text-color-dark me-2"></i>
                        E-posta: <a href="mailto:{{$ayar->mail}}" class="text-color-dark text-color-hover-primary text-decoration-none ms-1">{{$ayar->mail}}</a>
                    </li>
                    <li class="d-flex align-items-center mb-0">
                        <i class="icons icon-phone text-color-dark me-2"></i>
                        Telefon: <a href="tel:{{$ayar->telefon_2}}" class="text-color-dark text-color-hover-primary text-decoration-none ms-1">{{$ayar->telefon}}</a>
                    </li>
                </ul>
            </div>
            @endforeach
            <div class="col-lg-6 col-xl-5 " >
                <h2 class="text-color-dark font-weight-bold line-height-3 text-5-5 mb-0 p2 " >Bize Ulaşın</h2>

                <form style="margin-top: 35px;" method="post" class="contact-form custom-form-style-1" action="contact-us">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control bg-light-3 rounded border-0  text-1"  name="name" placeholder="Adınız" required autofocus="">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="mail" class="form-control bg-light-3 rounded border-0  text-1"  name="email" placeholder="E-posta" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <input type="text" class="form-control bg-light-3 rounded border-0  text-1"  name="subject" placeholder="Konu" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <textarea class="form-control textarea-contact bg-light-3 rounded border-0  text-1" rows="5" name="message" placeholder="Mesajınızı Lütfen Girin..." required></textarea>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">

                        <div class="col-md-12">
                            {!! NoCaptcha::display(['class'=>'rdcaptacha']) !!}


                            @if ($errors->has('g-recaptcha-response'))
                                <span class="help-block text-danger">
                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-row mt-2">
                        <div class="col text-center">
                            <button class="btn btn-primary text-3 text-color-light " type="submit"> Gönder </button>

                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>





@endsection



