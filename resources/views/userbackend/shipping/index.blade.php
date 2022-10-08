
@extends('layouts.userbackend')

@section('aside-page-title','HOME')

@section('sayfa-title')
    <title>RD Global Research & Development </title>
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


    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('anasayfa')}}"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item active" href="" aria-current="page">my-account</li>
                                <li class="breadcrumb-item active" aria-current="page"><a href="{{route('user.shipper')}}">Shipping Address</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="margin-top: 25px; margin-bottom: 25px;" class="page-content">
        <div class="dashboard">
            <div class="container">
                <div class="myaccount-content">
                    <h5>Shipping Address</h5>
                <form method="post" action="{{ route('user.shipper.kaydet',$usershipper->id) }}" enctype="multipart/form-data">

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
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="single-input-item">
                                <label class="required">Country </label>
                                {!! Form::text('country',$usershipper->country, ['class' => 'form-control  form-control bg-light-5 border-0 rounded' ,'placeholder' => 'Country', 'required' => '']) !!}
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="single-input-item">
                                <label class="required">State </label>
                                {!! Form::text('state',$usershipper->state, ['class' => 'form-control  form-control bg-light-5 border-0 rounded' ,'placeholder' => 'State', 'required' => '']) !!}
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="single-input-item">
                                <label class="required">Address </label>
                                {!! Form::text('adress',$usershipper->adress, ['class' => 'form-control  form-control bg-light-5 border-0 rounded' ,'placeholder' => 'Address', 'required' => '']) !!}
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="single-input-item">
                                <label class="required">Address </label>
                                {!! Form::text('adress2',$usershipper->adress2, ['class' => 'form-control  form-control bg-light-5 border-0 rounded ' ,'placeholder' => 'Address 2', 'required' => '']) !!}
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="single-input-item">
                                <label class="required">Zip Code </label>
                                {!! Form::text('zipcode',$usershipper->zipcode, ['class' => 'form-control  form-control bg-light-5 border-0 rounded ' ,'placeholder' => 'Zip Code', 'required' => '']) !!}
                            </div>
                        </div>

                    </div>


                    <div style="margin-top: 10px;margin-bottom: 20px;">
                        <button type="submit" class="btn btn-primary">
                            <span>SAVE CHANGES</span>
                            <i class="icon-long-arrow-right"></i>
                        </button>
                        <a href="{{route('dashboard')}}" style="color:#fff3cd;" class="btn btn-warning">Back</a>
                    </div>

                </form>
                </div>
            </div>


        </div><!-- End .dashboard -->
    </div><!-- End .page-content -->



@endsection

@section('js-extender')







@stop
