@extends('layouts.userbackend')

@section('aside-page-title','HOME')

@section('sayfa-title')
    <title> Perlantz </title>
@endsection


@section('sayfa-description')@endsection

@section('sayfa-keywords')@endsection

@section('sayfa-author','Rd Global Admin')

@section('tw-title')@endsection
@section('tw-site','@rdglobal_inc')
@section('tw-description')@endsection


@section('fc-title')@endsection

@section('fc-image') @endsection
@section('fc-description')@endsection

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
                                <li class="breadcrumb-item active" aria-current="page"><a href="">Billing Address</a></li>
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
                    <h5>Billing Details</h5>
                    <div class="account-details-form">
                        <form method="post" action="{{route('user.billing.kaydet',$userdetay->id)}}" enctype="multipart/form-data">

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
                                <div class="col-lg-12 mt-3">
                                    <div class="single-input-item">
                                        <label class="required">Name & Surname </label>
                                        {!! Form::text('name_surname',$userdetay->name_surname, ['class' => 'form-control  ' ,'placeholder' => 'Name & Surname', 'required' => '']) !!}
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-lg-6 mt-3">
                                    <div class="single-input-item">
                                        <label class="required">Country </label>
                                        {!! Form::text('country',$userdetay->country, ['class' => 'form-control  ' ,'placeholder' => 'Country', 'required' => '']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-3 ">
                                    <div class="single-input-item">
                                        <label class="required">State </label>
                                        {!! Form::text('state',$userdetay->state, ['class' => 'form-control  form-control bg-light-5 border-0 rounded ' ,'placeholder' => 'State', 'required' => '']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 mt-3">
                                    <div class="single-input-item">
                                        <label class="required">Address </label>
                                        {!! Form::text('adress',$userdetay->adress, ['class' => 'form-control  form-control bg-light-5 border-0 rounded' ,'placeholder' => 'Address', 'required' => '']) !!}

                                    </div>
                                </div>



                            </div>



                            <div class="row">
                                <div class="col-lg-12 mt-3">
                                    <div class="single-input-item">
                                        <label class="required">Address 2 </label>
                                        {!! Form::text('adress2',$userdetay->adress2, ['class' => 'form-control  form-control bg-light-5 border-0 rounded' ,'placeholder' => 'Address 2', 'required' => '']) !!}

                                    </div>
                                </div>

                            </div>
                            <div class="row">
                            <div class="col-lg-4 mt-3">
                                <div class="single-input-item">
                                    <label class="required">Zip Code</label>
                                    {!! Form::text('zipcode',$userdetay->zipcode, ['class' => 'form-control  form-control bg-light-5 border-0 rounded ' ,'placeholder' => 'Zipcode']) !!}
                                </div>
                            </div>
                            </div>

                            <h5 style="margin-top: 15px;">   <span style="color: red;">Fill in if the invoice will be issued on behalf of the company*</span></h5>

                            <div class="row">
                                <div class="col-lg-4 mt-3">
                                    <div class="single-input-item">
                                        <label class="required">Firm Name </label>
                                        {!! Form::text('firm_name',$userdetay->firm_name, ['class' => 'form-control  form-control bg-light-5 border-0 rounded ' ,'placeholder' => 'Firm Name']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-4 mt-3">
                                    <div class="single-input-item">
                                        <label class="required">Country </label>
                                        {!! Form::text('country_firm',$userdetay->country_firm, ['class' => 'form-control  form-control bg-light-5 border-0 rounded ' ,'placeholder' => 'State']) !!}
                                    </div>
                                </div>
                                <div class="col-lg-4 mt-3">
                                    <div class="single-input-item">
                                        <label class="required">State </label>
                                        {!! Form::text('state_firm',$userdetay->state_firm, ['class' => 'form-control  form-control bg-light-5 border-0 rounded ' ,'placeholder' => 'State']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 mt-3">
                                    <div class="single-input-item">
                                        <label class="required">Tax no </label>
                                        {!! Form::text('taxno',$userdetay->taxno, ['class' => 'form-control  form-control bg-light-5 border-0 rounded' ,'placeholder' => 'Tax no']) !!}
                                    </div>
                                </div>


                            </div>




                            <div style="margin-top: 25px; margin-bottom: 25px;">
                                <button style="" type="submit" class="btn btn-primary">
                                    <span>SAVE CHANGES</span>
                                    <i class="icon-long-arrow-right"></i>
                                </button>
                                <a href="{{route('dashboard')}}" style="color:#fff3cd;" class="btn btn-warning">Back</a>
                            </div>

                        </form>

                    </div>
                </div>


            </div>


        </div><!-- End .dashboard -->
    </div><!-- End .page-content -->





@endsection

@section('js-extender')







@stop
