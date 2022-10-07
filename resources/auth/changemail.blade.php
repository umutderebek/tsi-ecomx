@extends('layouts.anatema-app')

@section('aside-page-title','CHANGE EMAIL')

@section('content')

    <section class="futura-section-color">
        <div class="container">
            <div  class="row justify-content-center">
                <div  style="margin-top: 50px; margin-bottom: 50px;" class="col-md-8">
                    <div class="card">
                        <div class="card-header text-center"><h2 class="text-color-dark">Change Email</h2></div>
                        <hr style="background-color: white;">
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="card-body">
                            <form class="form-horizontal" method="POST" action="/change-email">
                                {{ csrf_field() }}

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 text-color-dark col-form-label text-md-right">{{ __('New Email') }}</label>

                                    <div class="col-md-6">
                                        <input id="new-mail" type="email" class="form-control bg-light-3 text-color-dark rounded border-0 text-1" name="new-mail" required>

                                        @if ($errors->has('current-mail'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('current-mail') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 text-color-dark col-form-label text-md-right">{{ __('Confirm Your New Mail') }}</label>

                                    <div class="col-md-6">
                                        <input id="new-mail-confirm" type="email" class="form-control bg-light-3 text-color-dark rounded border-0 text-1" name="new-mail_confirmation" required>

                                        @if ($errors->has('new-mail-confirm'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('new-mail-confirm') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 text-color-dark col-form-label text-md-right">{{ __('Confirm Your Current Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="current-password" type="password" class="form-control bg-light-3 text-color-dark rounded border-0 text-1" name="current-password" required>

                                        @if ($errors->has('current-password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-12 offset-md-12 text-center">
                                        <button type="submit" class="btn news-button text-color-light-2">
                                            {{ __('Change Email') }}
                                        </button>


                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


<br><br>




@endsection
