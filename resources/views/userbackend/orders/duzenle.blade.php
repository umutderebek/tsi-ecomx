@extends('layouts.anasayfa')

@section('aside-page-title','ABOUT US')

@section('sayfa-title')
    <title>Sipariş Düzenleme | TechNorm Mühendislik & Danismanlik </title>
@endsection

@section('sayfa-description','')

@section('sayfa-keywords','')

@section('sayfa-author','')

@section('content')

    <section class="page-header page-header-modern bg-color-light-scale-1 page-header-md">
        <div class="container">
            <div class="row">
                <div class="col-md-8 order-2 order-md-1 align-self-center ">
                    <h1 class="text-dark">  <strong>Sipariş Düzenleme</strong></h1>

                </div>
                <div class="col-md-4 order-1 order-md-2 align-self-center">
                    <ul class="breadcrumb d-block text-md-end">
                        <li><a href="#">Anasayfa</a></li>
                        <li class="active">Sipariş Düzenleme</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <form class="contact-form form-squared-borders" action="{{route('user.orderguncelle',$userorder->id)}}" method="POST">
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
    <div style="margin-top: 50px;" class="container text-center">
        <div class="myaccount-content">
            <h2 class="text-center">Sipariş Doğrulama</h2>
            <div class="myaccount-table table-responsive text-center">

                <table style="margin-top: 50px;" class="table table-bordered">
                    <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>isim</th>
                        <th>Soyisim</th>
                        <th>Email</th>
                        <th>Ülke</th>
                        <th>Şehir</th>
                        <th>company</th>
                        <th>companyemail</th>
                        <th>siparisnot</th>
                    </tr>
                    </thead>

                    <tr>

                        <td>{{$userorder->id}}</td>
                        <td>
                            {!! Form::text('name',$userorder->name, ['class' => 'form-control ' ,'placeholder' => 'Surname', ]) !!}
                        </td>
                        <td>
                            {!! Form::text('surname',$userorder->surname, ['class' => 'form-control ' ,'placeholder' => 'Surname', ]) !!}
                        </td>

                        <td>
                            {!! Form::text('email',$userorder->email, ['class' => 'form-control ' ,'placeholder' => 'Surname', ]) !!}
                        </td>
                        <td>
                            {!! Form::text('country',$userorder->country, ['class' => 'form-control ' ,'placeholder' => 'Surname', ]) !!}

                        </td>
                        <td>
                            {!! Form::text('state',$userorder->state, ['class' => 'form-control ' ,'placeholder' => 'Surname', ]) !!}
                        </td>
                        <td>
                            {!! Form::text('company',$userorder->company, ['class' => 'form-control ' ,'placeholder' => 'Surname', ]) !!}
                        </td>
                        <td>
                            {!! Form::text('companyemail',$userorder->companyemail, ['class' => 'form-control ' ,'placeholder' => 'Surname', ]) !!}
                        </td>
                        <td>
                            {!! Form::text('siparisnot',$userorder->siparisnot, ['class' => 'form-control ' ,'placeholder' => 'Surname', ]) !!}
                        </td>

                    </tr>

                </table>
            </div>

        </div>
    </div>

    <div class="container text-center">
        <div class="myaccount-content">
            <div class="myaccount-table table-responsive text-center">

                <table style="margin-top: 50px;" class="table table-bordered">
                    <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Sipariş Amacı</th>
                        <th>Parça Üretim Adedi</th>

                    </tr>
                    </thead>

                    <tr>
                        <td>
                            {{$userorder->id}}
                        </td>
                        <td>
                            <select class="form-select form-control h-auto py-2"  name="sipamac" required>
                                <option value="{{$userorder->sipamac}}">{{$userorder->sipamac}}</option>
                                <option value="Belirtilen üretim adedi için parça başı birim fiyat istiyorum">Belirtilen üretim adedi için parça başı birim fiyat istiyorum</option>
                            </select>


                        </td>
                        <td>
                            {!! Form::text('uretimadet',$userorder->uretimadet, ['class' => 'form-control ' ,'placeholder' => 'Surname', ]) !!}

                        </td>


                    </tr>

                </table>
            </div>

        </div>
    </div>



    <div class="col-md-12">
        <div class="widget">
            <header class="widget-header text-center">
                <a class="btn btn-danger" href="{{route('dashboard')}}">Geri</a>
                @if($userorder->yayin === 0)
                    <a class="btn btn-success" href="{{route('order-ayar-aktif',$userorder->id)}}">yayinla</a>
                @else
                    <a class="btn btn-warning" href="{{route('order-ayar-pasif',$userorder->id)}}">taslak</a>
                @endif


                <input class="btn btn-primary" type="submit" value="Güncelle">
            </header><!-- .widget-header -->

        </div><!-- .widget -->
    </div>

    </form>


@endsection



