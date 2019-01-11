@php $title = 'Login' @endphp
@extends('layouts.app-temp')

@section('content')
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
                                    <input type="password" class="form-control" name="password" id="password" />
                                </div>
                            </div>
                            <button type="submit" class="signup__btn-create btn btn--type-02">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <!-- FOOTER -->
        <footer class="signup__footer">
            <div class="container">
                <p class="signup__link">New user? <a href="/register" class="btn">Sign Up</a></p>
                <div class="signup__footer-content">
                    <ul class="signup__footer-menu">
                        <li><a href="#">Teams</a></li>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Send Feedback</a></li>
                        <li class="footer__copyright"><span>2018 &copy; Bluumhealth. All rights reserved.</li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
@endsection
