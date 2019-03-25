@php $title = 'Register' @endphp
@extends('layouts.app-temp')

@section('header_scripts')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/hover.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}" />
@endsection

@section('content')
@include('widgets.top-nav-bar')
<div class="signup">
    <!-- MAIN -->
    <main class="signup__main">
        <img class="signup__bg" src="{{asset('images/signup-bg.png')}}" alt="bg" />
        <div class="container">
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="signup__container">
                    <div class="signup__logo">
                        <a href="{{ route('index') }}"><img src="{{asset('images/logo_small.png')}}" alt="logo" />Bluumhealth</a>
                    </div>
                    <div class="signup__head">
                        <h3>Create a New Bluumhealth Account</h3>
                        <p>By signing up you can start posting, replying to topics, vote topics and many more.</p>
                    </div>
                    <div class="signup__form">
                        @if ($errors->has('firstname'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong><p>{{ $errors->first('firstname') }}</p></strong>
                            </span>
                        @endif
                        @if ($errors->has('lastname'))
                            <span class="invalid-feedback text-danger" role="alert">
                                <strong><p>{{ $errors->first('lastname') }}</p></strong>
                            </span>
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <div class="signup__section">
                                    <label class="signup__label" for="first-name">{{ __('First Name:') }}</label>
                                    <input type="text" class="form-control" name="firstname" id="first-name" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="signup__section">
                                    <label class="signup__label" for="last-name">{{ __('Last Name:') }}</label>
                                    <input type="text" class="form-control" name="lastname" id="last-name" />
                                </div>
                            </div>
                        </div>
                        <div class="signup__section">
                            @if ($errors->has('email'))
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong><p>{{ $errors->first('email') }}</p></strong>
                                </span>
                            @endif
                            <label class="signup__label" for="email">{{ __('Email Address:') }}</label>
                            <input type="email" class="form-control" name="email" id="email" />
                        </div>
                        <div class="signup__section">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong><p>{{ $errors->first('password') }}</p></strong>
                                </span>
                            @endif
                            <label class="signup__label" for="password">{{ __('Password:') }}</label>
                            <div class="message-input">
                                <div class="password-input-cover" >
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Must contain letters and numbers" />
                                    <i class="fa fa-eye-slash toggle-password-visibility" ></i>
                                </div>
                            </div>
                        </div>

                        <div class="signup__section">
                            <label class="signup__label" for="password-confirm">{{ __('Confirm Password:') }}</label>
                            <div class="message-input">
                                <div class="password-input-cover" >
                                    <input type="password" class="form-control password-input" name="password_confirmation" id="password-confirm" />
                                    <i class="fa fa-eye-slash toggle-password-visibility" ></i>
                                </div>
                            </div>
                        </div>
                        <div class="signup__checkbox">
                            <label class="signup__box">
                                <label class="custom-checkbox">
                                    <input type="checkbox" checked="checked" />
                                    <i></i>
                                </label>
                                <span>I agree to the Terms &amp; Conditions.</span>
                            </label>
                        </div>
                        <button href="#" class="signup__btn-create btn btn--type-02">
                            {{ __('Create New Account') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <!-- FOOTER -->
    <footer class="signup__footer">
        <div class="container">
            <p class="signup__link">Already have an account? <a href="{{ route('login') }}" class="btn">Sign In</a></p>
        </div>
    </footer>
</div>
@include('widgets.footer')
@endsection
