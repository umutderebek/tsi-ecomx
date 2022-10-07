@extends('layouts.anatema-app')

@section('aside-page-title','CHANGE PASSWORD')

@section('content')

    <section class="futura-section-color">


    <div  class="container">
        <div class="row justify-content-center">
            <div style="margin-top: 50px; margin-bottom: 50px;" class="col-md-8">
                <div class="card">
                    <div class="card-header text-center"><h2 class="text-color-dark">Change Password</h2></div>
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
                        <form class="form-horizontal" method="POST" action="/change-password">
                            {{ csrf_field() }}

                            <div class="form-group row">
                                <label for="email" class="col-md-4 text-color-dark col-form-label text-md-right">{{ __('Current Password') }}</label>

                                <div class="col-md-6">
                                    <input id="current-password" type="password" class="form-control bg-light text-color-dark rounded border-0 text-1 " name="current-password" required>

                                    @if ($errors->has('current-password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 text-color-dark col-form-label text-md-right">{{ __('New Password') }}</label>

                                <div class="col-md-6">
                                    <input id="new-password" type="password" class="form-control bg-light text-color-dark rounded border-0 text-1 " name="new-password" required>

                                    @if ($errors->has('new-password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 text-color-dark col-form-label text-md-right">{{ __('Confirm Your Password') }}</label>

                                <div class="col-md-6">
                                    <input id="new-password-confirmation" type="password" class="form-control bg-light text-color-dark rounded border-0 text-1 " name="new-password-confirmation" required>

                                    @if ($errors->has('new-password_confirmation'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('new-password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-12 offset-md-12 text-center">
                                    <button type="submit" class="btn news-button text-color-light-2">
                                        {{ __('Change Password') }}
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
