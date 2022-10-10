@extends('layouts.userbackend')

@section('aside-page-title','HOM
E')

@section('sayfa-title')
    <title>Panel | TechNorm Mühendislik & Danismanlik </title>
@endsection


@section('sayfa-description')@endsection

@section('sayfa-keywords')@endsection

@section('sayfa-author','Rd Global Admin')

@section('tw-title')
    TechNorm Mühendislik & Danismanlik
@endsection
@section('tw-site','@rdglobal_inc')
@section('tw-description')@endsection

@section('fc-title')
    TechNorm Mühendislik & Danismanlik
@endsection

@section('fc-image') @endsection
@section('fc-description') @endsection

@section('content')

    <!-- Start of Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title mb-0">My Account</h1>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="">Home</a></li>
                <li>My account</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of PageContent -->
    <div class="page-content pt-2">
        <div class="container">
            <div class="tab tab-vertical row gutter-lg">
                <ul class="nav nav-tabs mb-6" role="tablist">
                    <li class="nav-item">
                        <a href="#account-dashboard" class="nav-link active">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="#account-orders" class="nav-link">Orders</a>
                    </li>
                    <li class="nav-item">
                        <a href="#account-addresses" class="nav-link">Addresses</a>
                    </li>
                    <li class="nav-item">
                        <a href="#account-details" class="nav-link">Account details</a>
                    </li>
                    <li class="link-item">
                        <a href="">Wishlist</a>
                    </li>
                    <li class="link-item">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </a>

                    </li>
                </ul>

                <div class="tab-content mb-6">
                    <div class="tab-pane active in" id="account-dashboard">
                        <p class="greeting">
                        <h2>Hello <span class="font-weight-normal text-dark">{{Auth::user()->name}} {{Auth::user()->sname}}</span>

                        </h2>
                        (if you are not
                        <g2 class="text-dark font-weight-bold">{{Auth::user()->name}} {{Auth::user()->sname}}</g2>?
                        <a href="#" class="text-primary">     <span>
                                <a href="{{ route('logout') }}"  class="font-weight-normal text-dark"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout
                                                               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                   @csrf
                                                               </form>
                                                           </a>
                            </span></a>)


                        </p>

                        <p class="mb-4">
                            From your account dashboard you can view your <a href="#account-orders"
                                                                             class="text-primary link-to-tab">recent
                                orders</a>,
                            manage your <a href="#account-addresses" class="text-primary link-to-tab">shipping
                                and billing
                                addresses</a>, and
                            <a href="#account-details" class="text-primary link-to-tab">edit your password and
                                account details.</a>
                        </p>

                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                <a href="#account-orders" class="link-to-tab">
                                    <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-orders">
                                                    <i class="w-icon-orders"></i>
                                                </span>
                                        <div class="icon-box-content">
                                            <p class="text-uppercase mb-0">Orders</p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                <a href="#account-addresses" class="link-to-tab">
                                    <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-address">
                                                    <i class="w-icon-map-marker"></i>
                                                </span>
                                        <div class="icon-box-content">
                                            <p class="text-uppercase mb-0">Addresses</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                <a href="#account-details" class="link-to-tab">
                                    <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-account">
                                                    <i class="w-icon-user"></i>
                                                </span>
                                        <div class="icon-box-content">
                                            <p class="text-uppercase mb-0">Account Details</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                                <a href="wishlist.html" class="link-to-tab">
                                    <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-wishlist">
                                                    <i class="w-icon-heart"></i>
                                                </span>
                                        <div class="icon-box-content">
                                            <p class="text-uppercase mb-0">Wishlist</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">

                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <div class="icon-box text-center">
                                                <span class="icon-box-icon icon-logout">
                                                    <i class="w-icon-logout"></i>
                                                </span>
                                        <div class="icon-box-content">
                                            <p class="text-uppercase mb-0">Logout</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane mb-4" id="account-orders">
                        <div class="icon-box icon-box-side icon-box-light">
                                    <span class="icon-box-icon icon-orders">
                                        <i class="w-icon-orders"></i>
                                    </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title text-capitalize ls-normal mb-0">Orders</h4>
                            </div>
                        </div>

                        <table class="shop-table account-orders-table mb-6">
                            <thead>
                            <tr>
                                <th class="order-id">Order</th>
                                <th class="order-date">Date</th>
                                <th class="order-status">Status</th>
                                <th class="order-total">Total</th>
                                <th class="order-actions">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="order-id">#2321</td>
                                <td class="order-date">August 20, 2021</td>
                                <td class="order-status">Processing</td>
                                <td class="order-total">
                                    <span class="order-price">$121.00</span> for
                                    <span class="order-quantity"> 1</span> item
                                </td>
                                <td class="order-action">
                                    <a href="#"
                                       class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="order-id">#2321</td>
                                <td class="order-date">August 20, 2021</td>
                                <td class="order-status">Processing</td>
                                <td class="order-total">
                                    <span class="order-price">$150.00</span> for
                                    <span class="order-quantity"> 1</span> item
                                </td>
                                <td class="order-action">
                                    <a href="#"
                                       class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="order-id">#2319</td>
                                <td class="order-date">August 20, 2021</td>
                                <td class="order-status">Processing</td>
                                <td class="order-total">
                                    <span class="order-price">$201.00</span> for
                                    <span class="order-quantity"> 1</span> item
                                </td>
                                <td class="order-action">
                                    <a href="#"
                                       class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="order-id">#2318</td>
                                <td class="order-date">August 20, 2021</td>
                                <td class="order-status">Processing</td>
                                <td class="order-total">
                                    <span class="order-price">$321.00</span> for
                                    <span class="order-quantity"> 1</span> item
                                </td>
                                <td class="order-action">
                                    <a href="#"
                                       class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <a href="shop-banner-sidebar.html" class="btn btn-dark btn-rounded btn-icon-right">Go
                            Shop<i class="w-icon-long-arrow-right"></i></a>
                    </div>


                    <div class="tab-pane" id="account-addresses">
                        <div class="icon-box icon-box-side icon-box-light">
                                    <span class="icon-box-icon icon-map-marker">
                                        <i class="w-icon-map-marker"></i>
                                    </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title mb-0 ls-normal">Addresses</h4>
                            </div>
                        </div>
                        <p>The following addresses will be used on the checkout page
                            by default.</p>
                        <div class="row">
                            <div class="col-sm-6 mb-6">
                                <div class="ecommerce-address billing-address pr-lg-8">
                                    <h4 class="title title-underline ls-25 font-weight-bold">Billing Address</h4>
                                    <address class="mb-4">
                                        <table class="address-table">
                                            <tbody>
                                            <tr>
                                                <th>Name:</th>
                                                <td>{{Auth::user()->bill->name_surname}}</td>
                                            </tr>

                                            <tr>
                                                <th>Address:</th>
                                                <td>{{Auth::user()->bill->adress}}</td>
                                            </tr>
                                            <tr>
                                                <th>Address 2:</th>
                                                <td>{{Auth::user()->bill->adress2}}</td>
                                            </tr>
                                            <tr>
                                                <th>City:</th>
                                                <td>{{Auth::user()->bill->state}}</td>
                                            </tr>
                                            <tr>
                                                <th>Country:</th>
                                                <td>{{Auth::user()->bill->country}}</td>
                                            </tr>
                                            @if(Auth::user()->bill->zipcode === null)
                                            @else
                                                <tr>
                                                    <th>Postcode:</th>
                                                    <td>{{Auth::user()->bill->zipcode}}</td>
                                                </tr>
                                            @endif


                                            @if(Auth::user()->bill->firm_name === null)
                                            @else
                                                <tr>
                                                    <th>Firm Name:</th>
                                                    <td>{{Auth::user()->bill->firm_name}}</td>
                                                </tr>
                                            @endif

                                            @if(Auth::user()->bill->taxno === null)
                                            @else
                                                <tr>
                                                    <th>Tax No:</th>
                                                    <td>{{Auth::user()->bill->taxno}}</td>
                                                </tr>
                                            @endif
                                            @if(Auth::user()->bill->country_firm === null)
                                            @else
                                                <tr>
                                                    <th>Firm Country:</th>
                                                    <td>{{Auth::user()->bill->country_firm}}</td>
                                                </tr>
                                            @endif
                                            @if(Auth::user()->bill->state_firm === null)
                                            @else
                                                <tr>
                                                    <th>Firm State:</th>
                                                    <td>{{Auth::user()->bill->state_firm}}</td>
                                                </tr>
                                            @endif
                                            </tbody>
                                        </table>
                                    </address>
                                    <a href="{{route('user.billing',Auth::user()->bill->id)}}"
                                       class="btn btn-link btn-underline btn-icon-right text-primary">Edit
                                        your billing address<i class="w-icon-long-arrow-right"></i></a>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-6">
                                <div class="ecommerce-address shipping-address pr-lg-8">
                                    <h4 class="title title-underline ls-25 font-weight-bold">Shipping Address</h4>
                                    <address class="mb-4">
                                        <table class="address-table">
                                            <tbody>
                                            @if(Auth::user()->ship->country === null)
                                            @else
                                                <tr>
                                                    <th>Country:</th>
                                                    <td>{{Auth::user()->ship->country}}</td>
                                                </tr>
                                            @endif
                                            @if(Auth::user()->ship->state === null)
                                            @else
                                                <tr>
                                                    <th>State:</th>
                                                    <td>{{Auth::user()->ship->state}}</td>
                                                </tr>
                                            @endif
                                            @if(Auth::user()->ship->adress === null)
                                            @else
                                                <tr>
                                                    <th>Adress:</th>
                                                    <td>{{Auth::user()->ship->adress}}</td>
                                                </tr>
                                            @endif
                                            @if(Auth::user()->ship->adress2 === null)
                                            @else
                                                <tr>
                                                    <th>Adress-2:</th>
                                                    <td>{{Auth::user()->ship->adress2}}</td>
                                                </tr>
                                            @endif
                                            @if(Auth::user()->ship->zipcode === null)
                                            @else
                                                <tr>
                                                    <th>Zip Code-2:</th>
                                                    <td>{{Auth::user()->ship->zipcode}}</td>
                                                </tr>
                                            @endif

                                            </tbody>
                                        </table>
                                    </address>
                                    <a href="{{route('user.shipper',Auth::user()->ship->id)}}"
                                       class="btn btn-link btn-underline btn-icon-right text-primary">Edit your
                                        shipping address<i class="w-icon-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="account-details">
                        <div class="icon-box icon-box-side icon-box-light">
                                    <span class="icon-box-icon icon-account mr-2">
                                        <i class="w-icon-user"></i>
                                    </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title mb-0 ls-normal">Account Details</h4>
                            </div>
                        </div>
                        <form method="POST" action="{{route('user.profile.kaydet')}}" enctype="multipart/form-data">
                            <div class="container pt-3 pb-2">

                                <div class="row pt-2">
                                    <div class="col-lg-3 mt-4 mt-lg-0">

                                        <div class="d-flex mb-4">
                                            <div class="profile-image-outer-container">
                                                <div class="profile-image-inner-container bg-color-primary">
                                                    <img  src="/frontend/uploads/profile/{{Auth::user()->urun_resmi}}">
                                                    <span class="profile-image-button bg-color-dark">

										</span>
                                                </div>
                                                {!! Form::file('urun_resmi', array('class' => 'form-control profile-image-input ')) !!}
                                            </div>
                                        </div>



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
        </div>
    </div>
    <!-- End of PageContent -->


@endsection
