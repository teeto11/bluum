@extends('layouts.app-temp')

@section('header_scripts')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/hover.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}" >
@endsection

@section('content')
    @include('widgets.top-nav-bar')
    <div class="contact-wrapper">
        <div class="header animated fadeIn">
            <div class="parrallax-contents animated fadeInLeftBig">
                <h3 class="">Contact Us</h3>
                <p>Contact us and follow us on social media</p>
            </div>
        </div>
        <div class="contact-body container">
            <div class="row">
                <div class="contact-wrapper col-md-5 animated fadeInUp">
                    <div class="contact-header">
                        <h4>Have a Question</h4>
                        <p>Send us an email at:</p>
                        <p>bluumhealth@gmail.com, bluumhealth@gmail.com</p>
                    </div>
                    <p style="margin: 5px 14px;">Follow us on social media</p>
                    <div class="social-bar">
                        <a href=""><i class="fa fa-facebook"></i></a>
                        <a href=""><i class="fa fa-twitter"></i></a>
                        <a href=""><i class="fa fa-linkedin"></i></a>
                        <a href=""><i class="fa fa-instagram"></i></a>
                    </div>
                </div>
                <div class="image-wrapper col-md-7 animated bounceInRight" style="">
                    <img src="/images/contact.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    @include('widgets.footer')
@endsection

@section('scripts')
    <script src="{{ asset('js/bootstrap4.min.js') }}" ></script>
    <script src="{{ asset('js/popper.min.js') }}" ></script>
    <script src="{{ asset('js/app.js') }}" ></script>
@endsection