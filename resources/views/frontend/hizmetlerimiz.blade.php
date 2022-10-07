@extends('layouts.anasayfa')

@section('aside-page-title','ABOUT US')

@section('sayfa-title')
    <title>Hakkımızda | Abramak Kalıp Teknolojileri </title>
@endsection

@section('sayfa-description','')

@section('sayfa-keywords','')

@section('sayfa-author','')

@section('content')


    <section class="page-header page-header-modern page-header-background page-header-background-sm m-0" style="background-image: url(/frontend/img/demos/industry-factory/backgrounds/background-2.jpg); background-size: cover; background-position: center;">
        <div class="container">
            <div class="row">
                <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                    <h1 class="font-weight-bold text-8 mb-0">Hizmetlerimiz</h1>
                </div>
                <div class="col-md-4 order-1 order-md-2 align-self-center">
                    <ul class="breadcrumb breadcrumb-light d-block text-md-end text-4 mb-0">
                        <li><a href="{{route('anasayfa')}}" class="text-decoration-none">Anasayfa</a></li>
                        <li class="active">Hizmetlerimiz</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <section class="section section-with-shape-divider border-0 m-0">
        <div class="container pb-1 mt-4 mb-5">
            <div class="row justify-content-center pb-3 mb-5">
                <div class="col-lg-9 col-xl-8 text-center">
                    <div class="overflow-hidden">
                        <h2 class="text-color-primary font-weight-medium positive-ls-3 text-4 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="200">HİZMETLERİMİZ</h2>
                    </div>
                    <div class="overflow-hidden mb-3">
                        <h3 class="font-weight-bold text-transform-none text-9 line-height-2 mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="400">KALIP TEKNOLOJİ HİZMETLERİMİZ </h3>
                    </div>

                </div>
            </div>
            <div class="row row-gutter-sm mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="800">
                @foreach($hizmet as $hx)

                <div class="col-md-6 col-lg-4 mb-4">
                    <article>
                        <div class="card border-0 border-radius-0 box-shadow-1">
                            <div class="card-body p-4 z-index-1">
                                <a href="{{route('tr.hblog',$hx->slug)}}">
                                    <img class="card-img-top border-radius-0 mb-4" src="/frontend/uploads/treatment/kapak/{{$hx->kimage}}" alt="Product Name">
                                </a>
                                <div class="card-body p-0">
                                    <h4 class="card-title mb-3 text-5 font-weight-semibold"><a class="text-color-dark text-color-hover-primary text-decoration-none" href="{{route('tr.hblog',$hx->slug)}}">{{$hx->post_baslik}}</a></h4>
                                    <p class="card-text mb-0">{{$hx->onyazi}}</p>
                                    <a href="{{route('tr.hblog',$hx->slug)}}" class="custom-read-more btn btn-link d-inline-flex align-items-center font-weight-semibold text-decoration-none ps-0">
                                        Daha Fazla >>
                                        <svg class="ms-2" version="1.1" viewBox="0 0 15.698 8.706" width="17" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
														<polygon stroke="#FFF" stroke-width="0.1" fill="#FFF" points="11.354,0 10.646,0.706 13.786,3.853 0,3.853 0,4.853 13.786,4.853 10.646,8 11.354,8.706 15.698,4.353 "/>
													</svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                @endforeach
            </div>
        </div>
    </section>





@endsection

@section('js')

@endsection
