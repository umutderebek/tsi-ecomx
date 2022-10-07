
@extends('layouts.anasayfa')

@section('aside-page-title','USER PROFILE')

@section('sayfa-title')
    <title>TechNorm Mühendislik & Danismanlik </title>
@endsection


@section('sayfa-description')We're dedicated to continuous innovation in order to shape everything we do Our purpose is to improve health of the patients all around the world.@endsection

@section('sayfa-keywords')@endsection

@section('sayfa-author','Rd Global Admin')

@section('tw-title')RD Global Research & Development @endsection
@section('tw-site','@rdglobal_inc')
@section('tw-description')We're dedicated to continuous innovation in order to shape everything we do Our purpose is to improve health of the patients all around the world.@endsection


@section('fc-title')RD Global Research & Development @endsection

@section('fc-image')https://www.rdglobal.com.tr/frontend/img/anasayfa/rev-slider-1.png @endsection
@section('fc-description')We're dedicated to continuous innovation in order to shape everything we do Our purpose is to improve health of the patients all around the world.@endsection

@section('content')

    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
        <div class="container">
            <div class="row">
                <div class="col-md-8 order-2 order-md-1 align-self-center ">
                    <h1 class="text-dark">  <strong>{{Auth::user()->name}} {{Auth::user()->surname}}</strong></h1>

                </div>
                <div class="col-md-4 order-1 order-md-2 align-self-center">
                    <ul class="breadcrumb d-block text-md-end">
                        <li><a href="#">Anasayfa</a></li>
                        <li class="active">{{Auth::user()->name}} {{Auth::user()->surname}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <form method="POST" action="{{route('user.profile.kaydet')}}" enctype="multipart/form-data">
    <div class="container pt-3 pb-2">

        <div class="row pt-2">
            <div class="col-lg-3 mt-4 mt-lg-0">

                <div class="d-flex justify-content-center mb-4">
                    <div class="profile-image-outer-container">
                        <div class="profile-image-inner-container bg-color-primary">
                            <img src="/frontend/uploads/profile/{{Auth::user()->urun_resmi}}">
                            <span class="profile-image-button bg-color-dark">
											<i class="fas fa-camera text-light"></i>
										</span>
                        </div>
                        {!! Form::file('urun_resmi', array('class' => 'form-control profile-image-input ')) !!}
                    </div>
                </div>

                <aside class="sidebar mt-2" id="sidebar">
                    <ul class="nav nav-list flex-column mb-5">
                        <li class="nav-item"><a class="nav-link text-3 text-dark active" href="#">Profilim</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{route('user.password')}}">Şifremi Değiştir </a></li>
                    </ul>
                </aside>

            </div>
            <div class="col-lg-9">


                    @csrf
                @if(count($errors)>0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 required">Ad</label>
                        <div class="col-lg-9">
                            {!! Form::text('name',Auth::user()->name, ['class' => 'form-control text-3 h-auto py-2 ' ,'placeholder' => 'Surname', ]) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 required">Soyad</label>
                        <div class="col-lg-9">
                            {!! Form::text('surname',Auth::user()->surname, ['class' => 'form-control text-3 h-auto py-2 ' ,'placeholder' => 'Surname', ]) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 required">E-posta</label>
                        <div class="col-lg-9">
                            {!! Form::text('email',Auth::user()->email, ['class' => 'form-control text-3 h-auto py-2 ' ,'placeholder' => 'Email', ]) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2 required">Telefon</label>
                        <div class="col-lg-9">
                            {!! Form::text('phone',Auth::user()->phone, ['class' => 'form-control text-3 h-auto py-2 ' ,'placeholder' => 'Phone', ]) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Firma</label>
                        <div class="col-lg-9">
                            {!! Form::text('company',Auth::user()->company, ['class' => 'form-control text-3 h-auto py-2 ' ,'placeholder' => 'Company', ]) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">İnternet Sitesi</label>
                        <div class="col-lg-9">
                            {!! Form::text('website',Auth::user()->website, ['class' => 'form-control text-3 h-auto py-2 ' ,'placeholder' => 'Website', ]) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2">Adres</label>
                        <div class="col-lg-9">
                            {!! Form::text('address',Auth::user()->address, ['class' => 'form-control text-3 h-auto py-2 ' ,'placeholder' => 'Address', ]) !!}

                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label form-control-label line-height-9 pt-2 text-2"></label>
                        <div class="col-lg-6">
                            {!! Form::text('country',Auth::user()->country, ['class' => 'form-control text-3 h-auto py-2 ' ,'placeholder' => 'Country', ]) !!}
                        </div>
                        <div class="col-lg-3">
                            {!! Form::text('state',Auth::user()->state, ['class' => 'form-control text-3 h-auto py-2 ' ,'placeholder' => 'State', ]) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="form-group col-lg-9">

                        </div>
                        <div class="form-group col-lg-3">
                            <input type="submit" value="Save" class="btn btn-primary btn-modern float-end" data-loading-text="Loading...">
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>







<br><br><br>



@endsection

@section('js-extender')






@stop
