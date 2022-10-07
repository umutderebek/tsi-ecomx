@extends('layouts.anasayfa')

@section('aside-page-title','NEWS ROOM')

@section('sayfa-title')
    <title>Haberler | RD Global </title>
@endsection

@section('sayfa-description','')

@section('sayfa-keywords','')

@section('sayfa-author','')

@section('css')

@stop

@section('content')

    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
        <div class="container">
            <div class="row">
                <div class="col-md-8 order-2 order-md-1 align-self-center ">
                    <h1 class="text-dark">Faydalı  <strong>Makaleler</strong></h1>

                </div>
                <div class="col-md-4 order-1 order-md-2 align-self-center">
                    <ul class="breadcrumb d-block text-md-end">
                        <li><a href="#">Anasayfa</a></li>
                        <li class="active">Sayfalar</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div class="container pt-4 pb-5 my-5">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1600">
                @foreach($blog as $bg)
                <article class="mb-5">
                    <div class="card bg-transparent border-0 custom-border-radius-1 text-center">
                        <div class="card-body p-0 z-index-1">
                            <a href="{{route('tr.sblog',$bg->slug)}}">
                                <img style="width: 500px;" class="card-img-top custom-border-radius-1 mb-2" src="/frontend/uploads/blog/ongorsel/{{$bg->gimage}}" >
                            </a>
                            <p class="text-uppercase text-color-default text-1 my-2">
                                <time pubdate datetime="2021-01-10">{{date('d F , Y', strtotime($bg->created_at))}}</time>
                                <span class="opacity-3 d-inline-block px-2">|</span>
                                TechNorm Admin
                            </p>
                            <div class="card-body p-0">
                                <h4 class="card-title text-5 font-weight-bold pb-1 mb-2"><a class="text-color-dark text-color-hover-primary text-decoration-none" href="{{route('tr.sblog',$bg->slug)}}">{{$bg->post_baslik}}</a></h4>
                                <p class="card-text mb-2" style="white-space: pre-wrap; /* css-3 */
                                    white-space: -moz-pre-wrap; /* Mozilla, since 1999 */
                                    white-space: -pre-wrap; /* Opera 4-6 */
                                    white-space: -o-pre-wrap; /* Opera 7 */
                                    word-wrap: break-word; /* Internet Explorer 5.5+ */ "  class="text-color-dark">{{$bg->onyazi}}</p>

                                <a href="{{route('tr.sblog',$bg->slug)}}" class="btn btn-link font-weight-semibold text-decoration-none text-3 ps-0">READ MORE</a>
                            </div>
                        </div>
                    </div>
                </article>
                @endforeach


                <ul class="custom-pagination-style-1 pagination pagination-rounded pagination-md justify-content-center">
                    {{ $blog->links() }}
                </ul>

            </div>
            <div class="blog-sidebar col-lg-4 pt-4 pt-lg-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1800">
                <aside class="sidebar">
                    <div class="py-1 clearfix">
                        <hr class="my-2">
                    </div>
                    <div class="px-3 mt-4">
                        <h3 class="text-color-dark text-capitalize font-weight-bold text-5 m-0 mb-3">Recent Posts</h3>
                        <div class="pb-2 mb-1">
                            @foreach($popular as $p)

                                @if ($p->deleted_at == null )
                                    <article class="row align-items-center mb-3">
                                        <div class="col-4 pr-0">
                                            <a href="{{route('tr.sblog',$p->slug)}}">
                                                <img src="/frontend/uploads/blog/kapak/{{$p->kimage}} " class="img-fluid hover-effect-2" alt="" />
                                            </a>
                                        </div>
                                        <div class="col-8">
                                            <span class="text-color-dark"> {{$p->post_baslik}}</span>
                                            <h4 class="text-2 mb-0">
                                                <a href="#" class="text-1">  {{date('d F , Y', strtotime($p->created_at))}} </a>
                                            </h4>
                                        </div>
                                    </article>
                                @endif

                            @endforeach
                        </div>
                    </div>

                    <div class="py-1 clearfix">
                        <hr class="my-2">
                    </div>
                    <div class="px-3 mt-4">
                        <h3 class="text-color-dark text-capitalize font-weight-bold text-5 m-0">Categories</h3>
                        <ul class="nav nav-list flex-column mt-2 mb-0 p-relative right-9">
                            @foreach($kategori as $kg)
                            <li class="nav-item"><a class="nav-link bg-transparent border-0" href="{{route('tr.bkategori',$kg->slug)}}">{{$kg->kategori_adi}} ({{$kg->count()}})</a></li>
                            @endforeach
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>






@stop


@section('js')

@stop
