@php $title = 'Login' @endphp
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
                <div class="signup__container">
                    <div class="signup__logo">
                        <a href="index.html"><img src="{{asset('images/logo_small.png')}}" alt="logo" />Bluumhealth</a>
                    </div>
                    <div class="signup__head">
                        <h3>Sign in to your Bluumhealth Account</h3>
                    </div>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="signup__form">
                            <div class="signup__section">
                                @if (session()->has('error'))
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong><p>{{ ucfirst(session('error')) }}</p></strong>
                                    </span>
                                @endif
                                @if ($errors->has('email') || $errors->has('password') )
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong><p>Email or Password incorrect</p></strong>
                                    </span>
                                @endif
                                <label class="signup__label" for="email">Email Address:</label>
                                <input type="email" class="form-control" name="email" id="email" />
                            </div>
                            <div class="signup__section">
                                <label class="signup__label" for="password">Password:</label>
                                <div class="message-input">
                                    <div class="password-input-cover" >
                                        <input type="password" class="form-control password-input" name="password" id="password" />
                                        <i class="fa fa-eye-slash toggle-password-visibility" ></i>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="signup__btn-create btn btn--type-02">
                                {{ __('Login') }}
                            </button>
                            <p class="" style="margin-top:25px;">Are you a new to bluum? <a href="/register" class="">Register</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <!-- FOOTER -->
        <footer class="signup__footer">
            <div class="container">
                
            </div>
        </footer>
    </div>
    @include('widgets.footer')
@endsection
