@extends('layouts.anasayfa')

@section('aside-page-title','HOME')

@section('sayfa-title')
    <title>Anasayfa | TechNorm Mühendislik & Danismanlik  </title>
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

    @include('layouts.partials.slider')


    <div class="container-fluid p-0 mx-0 custom-carousel-1-wrapper">
        <div class="row gx-0">
            <div class="col-lg-4">
                <div style="    background-color: #262c36 !important;" class="custom-carouse-1-title p-2 mt-5">
                    <h4 class="text-color-light text-6 font-weight-semi-bold d-block text-center text-lg-end p-3 m-0"><span class="d-block me-lg-5 pe-lg-4 p-relative bottom-2"><span class="d-inline-block appear-animation" data-appear-animation="fadeInUpShorterPlus" data-appear-animation-delay="0">Hizmetlerimiz</span></span></h4>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="carousel-half-full-width-wrapper carousel-half-full-width-right custom-carousel-1">
                    <div class="owl-carousel owl-theme carousel-half-full-width-right nav-bottom nav-bottom-align-left nav-style-1 nav-light nav-arrows-thin nav-font-size-lg mb-0" data-plugin-options="{'responsive': {'0': {'items': 1,  'autoplay': true, 'autoplayTimeout': 3000}, '768': {'items': 1,  'autoplay': true, 'autoplayTimeout': 3000}, '992': {'items': 2}, '1200': {'items': 3}}, 'loop': false, 'nav': true, 'dots': false, 'margin': 0}">
                        @foreach($hizmet as $hx)
                        <div class="anim-hover-translate-top-10px transition-3ms">
                            <div class="card">
                                <div class="card-body p-5">
                                    <div class="d-flex flex-row">

                                        <div class="ps-4">
                                            <h4 class="mb-2 text-5 font-weight-semi-bold">{{$hx->post_baslik}}</h4>
                                            <p class="mb-2 font-weight-medium text-3">{{$hx->blog_aciklama}}</p>
                                            <a href="{{route('hizmet.blog',$hx->slug)}}" class="text-uppercase text-2-5 stretched-link text-decoration-underline text-color-primary text-color-hover-tertiary font-weight-semi-bold transition-2ms d-inline-block">Daha fazla</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>



    <section class="section section-height-4 custom-section-full-width custom-section-pull-top-1 bg-color-transparent border-0 position-relative z-index-1 pb-0 pb-xl-5 mb-0" style="background-image: url(/frontend/img/demos/it-services/backgrounds/dots-background-1.png); background-repeat: no-repeat; background-position: top left;">
        <div class="container container-xl-custom mt-2 mb-xl-5">
            <div class="row">
                <div class="col-xl-7 pb-5 pb-xl-0 mb-5 mb-xl-0">
                    <div class="custom-overlapping-cards">
                        <div class="card border-0 box-shadow-1 ps-2 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">
                            <img src="/frontend/img/demos/it-services/generic/generic-1.jpg" class="card-img-top rounded-0 img-fluid" alt="IT Consulting">
                            <div class="card-body pt-4">
                                <h4 class="custom-heading-bar font-weight-bold text-color-dark text-5">IT CONSULTING</h4>
                                <p class="custom-font-secondary text-4 mb-3">Lorem ipsum dolor sit <strong class="text-color-dark">amet</strong>, consectetur adipiscing elit. Nunc viverra erat orci, ac auctor.</p>
                            </div>
                        </div>
                        <div class="card-transform">
                            <div class="card border-0 box-shadow-1 pe-2 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500">
                                <img src="/frontend/img/demos/it-services/generic/generic-2.jpg" class="card-img-top rounded-0 img-fluid" alt="IT Support">
                                <div class="card-body pt-4">
                                    <h4 class="custom-heading-bar custom-heading-bar-right font-weight-bold text-color-dark text-end text-5">IT SUPPORT</h4>
                                    <p class="text-end custom-font-secondary text-4 ps-4 ms-3 mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra erat orci, ac auctor.</p>
                                </div>
                            </div>
                        </div>
                        <img src="/frontend/img/demos/it-services/puzzle-and-dots.png" class="custom-overlapping-cards-puzzle-background" alt="Puzzle and Dots background image" />
                    </div>
                </div>
                <div class="col-xl-5">
                    <span class="d-block custom-text-color-grey-1 font-weight-bold mb-1 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="700">Biz Kimiz</span>
                    <h2 class="text-color-dark font-weight-bold text-8 line-height-2 negative-ls-1 pb-3 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="900">We focus on bringing value and solve business challenges through the delivery of modern IT services and solutions</h2>
                    <p class="custom-text-size-1 pb-3 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1100">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed imperdiet libero id nisi euismod, sed porta est consectetur. Vestibulum auctor felis eget orci semper vestibulum. Pellentesque ultricies nibh gravida, accumsan libero luctus, molestie nunc. In nibh ipsum, blandit id faucibus ac, finibus vitae dui.</p>
                    <a href="demo-it-services-about-us.html" class="d-flex align-items-center custom-link-effect-1 text-color-primary font-weight-bold text-decoration-none text-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1300">Find Out More <i class="custom-arrow-icon ms-2"></i></a>
                </div>
            </div>
        </div>
    </section>

    <div class="container container-xl-custom mt-5">
        <div class="row">
            <div class="col">
                <hr class="my-5">
            </div>
        </div>
    </div>


    <section class="section border-0 py-4 m-0">
        <div class="container">
            <div class="row align-items-end pb-3 mb-5 mb-lg-4">
                <div class="col-lg-7 col-xl-8 mb-4 mb-lg-0">
                    <div class="d-flex align-items-center mb-2">
                        <span class="custom-line appear-animation" data-appear-animation="customLineAnimation" appear-animation-duration="1s"></span>
                        <div class="overflow-hidden ms-3">
                            <h2 class="text-color-primary font-weight-semibold line-height-3 text-4 mb-0 appear-animation" data-appear-animation="maskRight" data-appear-animation-delay="1000">WHAT WE DO</h2>
                        </div>
                    </div>
                    <h3 class="text-color-secondary font-weight-bold text-transform-none text-8 mb-3 pb-1 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1200">Our Services</h3>
                    <p class="mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1400">Cras a elit sit amet leo accumsan volutpat. Suspendisse hendrerit vehicula leo, vel efficitur felis ultrices non. Integer aliquet ullamcorper dolor, quis sollicitudin. Integer aliquet ullamcorper dolor, quis sollicitudin.</p>
                </div>
                <div class="col-lg-5 col-xl-4">
                    <div class="d-flex justify-content-lg-end">
                        <a href="" class="btn btn-primary btn-modern font-weight-bold text-3 btn-px-4 py-3 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="1800">VIEW ALL SERVICES</a>
                        <a href="" class="btn btn-secondary btn-modern font-weight-bold text-3 btn-px-4 py-3 ms-4 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="1600">BOOK NOW</a>
                    </div>
                </div>
            </div>
            <div class="row appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="2000">
                <div class="col">
                    <div class="owl-carousel nav-outside nav-arrows-1 custom-carousel-box-shadow-1 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="750" data-plugin-options="{'responsive': {'0': {'items': 1}, '479': {'items': 1}, '768': {'items': 2}, '979': {'items': 3}, '1199': {'items': 3}}, 'autoplay': false, 'autoplayTimeout': 5000, 'autoplayHoverPause': true, 'dots': false, 'nav': true, 'loop': false, 'margin': 20, 'stagePadding': '75'}">
                        <div>
                            <a href="demo-cleaning-services-services-detail.html" class="text-decoration-none">
                                <div class="card custom-card-style-1">
                                    <div class="card-body text-center py-5">
                                        <div class="custom-card-style-1-image-wrapper bg-primary rounded-circle d-inline-block mb-3">
                                            <img src="/frontend/img/demos/cleaning-services/services/services-small-1.jpg" class="img-fluid rounded-circle" alt="" />
                                        </div>
                                        <h4 class="custom-card-style-1-title text-color-secondary font-weight-bold mb-2">Building Services</h4>
                                        <p class="custom-card-style-1-description">Cras a elit sit amet leo accumsan volutpat. Suspendisse hendrerit vehicula leo, vel efficitur felis ultrices non. </p>
                                        <span class="custom-card-style-1-link font-weight-bold">VIEW MORE</span>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-height-3 bg-color-dark border-0 m-0">
        <div class="container container-xl-custom">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-8 col-xl-6 mb-5 mb-lg-0">
                    <span class="d-block custom-text-color-light-2 custom-heading-bar custom-heading-bar-with-padding font-weight-light text-5 mb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="300">Bize Ulaşın</span>
                    <h2 class="text-color-light font-weight-extra-bold text-10 negative-ls-1 pe-3 mb-3 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="500">LET'S TALK ABOUT YOUR BUSINESS IT SERVICES NEEDS</h2>
                    <p class="custom-font-secondary text-4 custom-text-color-light-3 mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="700">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
                <div class="col-lg-4 col-xl-3">
                    <div class="overflow-hidden">
                        <a href="demo-it-services-contact.html" class="btn btn-primary btn-outline text-color-light font-weight-semibold border-width-4 custom-link-effect-1 text-1 text-xl-3 d-inline-flex align-items-center px-4 py-3 appear-animation" data-appear-animation="maskRight" data-appear-animation-delay="900">GET STARTED NOW <i class="custom-arrow-icon ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section border-0 bg-transparent pt-4 pt-lg-5 m-0">
        <div class="container pb-5 mb-3">
            <div class="row align-items-end pb-3 mb-4 text-center">
                <div class="col-lg-12 col-xl-10 mb-4 mb-lg-0">
                    <h3 class="text-color-primary font-weight-bold text-transform-none text-8 mb-3 pb-1 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1200">Yararlı Makaleler</h3>
                    <p class="mb-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1400">Cras a elit sit amet leo accumsan volutpat. Suspendisse hendrerit vehicula leo, vel efficitur felis ultrices non. Integer aliquet ullamcorper dolor, quis sollicitudin. Integer aliquet ullamcorper dolor, quis sollicitudin.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <article class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1800">
                        <div class="card border-0 border-radius-0 box-shadow-1">
                            <div class="card-body p-3 z-index-1">
                                <a href="">
                                    <img class="card-img-top border-radius-0 mb-2" src="/frontend/img/demos/cleaning-services/blog/blog-1.jpg" alt="Card Image">
                                </a>
                                <p class="text-uppercase text-color-default text-1 my-2">
                                    <time pubdate datetime="2022-01-10">10 Jan 2022</time>
                                    <span class="opacity-3 d-inline-block px-2">|</span>
                                    3 Comments
                                    <span class="opacity-3 d-inline-block px-2">|</span>
                                    John Doe
                                </p>
                                <div class="card-body p-0">
                                    <h4 class="card-title text-5 font-weight-bold pb-1 mb-2"><a class="text-color-dark text-color-hover-primary text-decoration-none" href="">Lorem ipsum dolor sit amet</a></h4>
                                    <p class="card-text mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra lorem , consectetur adipiscing elit...</p>
                                    <a href="" class="btn btn-link font-weight-semibold text-decoration-none text-3 ps-0">READ MORE</a>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <article class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1800">
                        <div class="card border-0 border-radius-0 box-shadow-1">
                            <div class="card-body p-3 z-index-1">
                                <a href="">
                                    <img class="card-img-top border-radius-0 mb-2" src="/frontend/img/demos/cleaning-services/blog/blog-1.jpg" alt="Card Image">
                                </a>
                                <p class="text-uppercase text-color-default text-1 my-2">
                                    <time pubdate datetime="2022-01-10">10 Jan 2022</time>
                                    <span class="opacity-3 d-inline-block px-2">|</span>
                                    3 Comments
                                    <span class="opacity-3 d-inline-block px-2">|</span>
                                    John Doe
                                </p>
                                <div class="card-body p-0">
                                    <h4 class="card-title text-5 font-weight-bold pb-1 mb-2"><a class="text-color-dark text-color-hover-primary text-decoration-none" href="">Lorem ipsum dolor sit amet</a></h4>
                                    <p class="card-text mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra lorem , consectetur adipiscing elit...</p>
                                    <a href="" class="btn btn-link font-weight-semibold text-decoration-none text-3 ps-0">READ MORE</a>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <article class="appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1800">
                        <div class="card border-0 border-radius-0 box-shadow-1">
                            <div class="card-body p-3 z-index-1">
                                <a href="">
                                    <img class="card-img-top border-radius-0 mb-2" src="/frontend/img/demos/cleaning-services/blog/blog-1.jpg" alt="Card Image">
                                </a>
                                <p class="text-uppercase text-color-default text-1 my-2">
                                    <time pubdate datetime="2022-01-10">10 Jan 2022</time>
                                    <span class="opacity-3 d-inline-block px-2">|</span>
                                    3 Comments
                                    <span class="opacity-3 d-inline-block px-2">|</span>
                                    John Doe
                                </p>
                                <div class="card-body p-0">
                                    <h4 class="card-title text-5 font-weight-bold pb-1 mb-2"><a class="text-color-dark text-color-hover-primary text-decoration-none" href="">Lorem ipsum dolor sit amet</a></h4>
                                    <p class="card-text mb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc viverra lorem , consectetur adipiscing elit...</p>
                                    <a href="" class="btn btn-link font-weight-semibold text-decoration-none text-3 ps-0">READ MORE</a>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>



            </div>
        </div>
    </section>



@endsection
