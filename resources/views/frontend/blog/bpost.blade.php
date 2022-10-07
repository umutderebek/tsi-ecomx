@extends('layouts.anasayfa')

@section('aside-page-title')
   NEWS ROOM > <span class="text-uppercase">{{$blog->post_baslik}}
    @endsection

@section('sayfa-title')

    @if(strlen($blog->post_baslik)<50)
        <title>{{$blog->post_baslik}} | RD Global </title>
        @else
        <title>{{$blog->post_baslik}} </title>

    @endif

@endsection

@section('sayfa-description'){{$blog->blog_aciklama}}@endsection

@section('sayfa-keywords'){{$blog->blog_keyword}}@endsection

@section('sayfa-author','Rd Global Admin')

@section('tw-title'){{$blog->post_baslik}}@endsection
@section('tw-site','@rdglobal_inc')
@section('tw-description'){{$blog->onyazi}}@endsection


@section('fc-title'){{$blog->post_baslik}}@endsection
@section('fc-image')https://www.rdglobal.com.tr/frontend/uploads/blog/kapak/{{$blog->kimage}}@endsection
@section('fc-description'){{$blog->blog_aciklama}}@endsection





   @section('css')

@stop

@section('content')

           <section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
        <div class="container">
            <div class="row">
                <div class="col-md-8 order-2 order-md-1 align-self-center ">
                    <h1 class="text-dark">Faydalı  <strong>Makaleler</strong></h1>
                    <span class="sub-title text-dark">{{$blog->post_baslik}}</span>


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

							<article>
								<div class="card border-0">
									<div class="card-body z-index-1 p-0">
										<p class="text-uppercase text-1 mb-3 text-color-default"><time pubdate datetime=" {{$blog->created_at->format('d M Y' )}}"> {{$blog->created_at->format('d M Y' )}}</time> <span class="opacity-3 d-inline-block px-2">|</span>  <span class=" d-inline-block px-2"> Pulso Medical Admin</span></p>

										<div class="post-image pb-4">
											<img class="card-img-top custom-border-radius-1" src="/frontend/uploads/blog/kapak/{{$blog->kimage}}" alt="Card Image">
										</div>

										<div class="card-body p-0">
                                            <h4 class="card-title text-5 font-weight-bold pb-1 mb-2"><a class="text-color-dark text-color-hover-primary text-decoration-none" >{{$blog->post_baslik}}</a></h4>

                                            <p>
                                                {!! $blog->yazi !!}
                                            </p>
											<hr class="my-5">
                                              <footer class="blog-post-footer  border-left-0 border-right-0 py-4 mt-5">
                                                <div class="row justify-content-between align-items-center">
                                                    <div class="col-12 col-sm-auto mb-3 mb-sm-0 mb-md-3 mb-lg-0">

                                                    </div>

                                                    <div class="col-12 col-sm-auto">
                                                        <div class="d-flex align-items-center">
                                                            <span style="margin-right: 10px;" class="text-2 text-color-dark">SHARE THIS POST</span>

                                                            <ul class="social-icons social-icons-light social-icons-1 ml-3">
                                                                <li class="social-icons-facebook"><a href="https://www.facebook.com/sharer/sharer.php?u={{route('tr.sblog',$blog->slug)}}" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                                                <li class="social-icons-twitter"><a href="https://twitter.com/intent/tweet?url={{route('tr.sblog',$blog->slug)}}" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                                                <li class="social-icons-linkedin"><a href="https://www.linkedin.com/shareArticle?mini=true&url={{route('tr.sblog',$blog->slug)}}&title=&{{route('tr.sblog',$blog->slug)}}summary=&source=" target="_blank" title="Instagram"><i class="fab fa-linkedin"></i></a></li>
                                                                <li class="social-icons-whatsapp"><a href="https://wa.me/?text={{route('tr.sblog',$blog->slug)}}" target="_blank" title="Instagram"><i class="fab fa-whatsapp"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </footer>

										</div>
									</div>
								</div>
							</article>

						</div>
						<div class="blog-sidebar col-lg-4 pt-4 pt-lg-0 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="1800">
							<aside class="sidebar">
								<div class="py-1 clearfix">
									<hr class="my-2">
								</div>
								<div class="px-3 mt-4">
									<h3 class="text-color-quaternary text-capitalize font-weight-bold text-5 m-0">Categories</h3>
									<ul class="nav nav-list flex-column mt-2 mb-0 p-relative right-9">
									  @foreach($kategoris as $kg)
                                            <li class="nav-item"><a class="nav-link bg-transparent border-0" href="{{route('tr.bkategori',$kg->slug)}}">{{$kg->kategori_adi}}</a></li>
                                        @endforeach
									</ul>
								</div>
							</aside>
						</div>
					</div>
				</div>




@stop


@section('js')
           <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
           <script src="{{ asset('js/share.js') }}"></script>
@stop


