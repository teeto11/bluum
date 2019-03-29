@extends('layouts.app-temp')

@section('header_scripts')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/hover.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}" >
@endsection

@section('content')
    @include('widgets.top-nav-bar')
    <div class="about-wrapper">
        <div class="header animated fadeIn">
            <div class="parrallax-contents animated fadeInLeftBig">
                <h3 class="">About Us</h3>
                <p>Bluumhealth is the first of its kind in the digital space for pregnant women, expectant
                        moms and even dads. Bluumhealth is poised to provide content from verified medical
                        experts and a pool of health professionals as well as information and requirements
                        from new mums.</p>
            </div>
        </div>
        <div class="about-body container">
            <section class="layer1">
                <div class="text-wrapper animated fadeIn">
                    <h3>Mission</h3>
                    <p>Bluumhealth is geared towards making the transition of pregnancy very easy and as
                            such improve the health of both mother and child and work closely with HMO&#39;s, non
                            profits, hospitals to make the journey of motherhood safer and stress free for both mother
                            and child.</p>
                    <p>You can connect with Bluumhealth on Facebook, Twitter, LinkedIn,
                            Instagram(@bluumhealth across all social media platforms)</p>
                </div>
                <div class="image-wrapper animated bounceInRight">
                    <img src="/images/laptop.png" alt="">
                </div>
            </section>
            <section class="layer2">
                <div class="card">
                    <p><i class="fa fa-question-circle"></i> Ask</p>
                    <p>Ask the community questions and get answers from various experts</p>
                </div>
                <div class="card">
                    <p><i class="fa fa-commenting"></i> Answer</p>
                    <p>Provide answers and comments to various questions and posts</p>
                </div>
                <div class="card">
                    <p><i class="fa fa-bookmark-o"></i> Post</p>
                    <p>Stay updated with posts of various experts you follow</p>
                </div>
            </section>
        </div>
    </div>
    @include('widgets.footer')
@endsection

@section('scripts')
    <script src="{{ asset('js/bootstrap4.min.js') }}" ></script>
    <script src="{{ asset('js/popper.min.js') }}" ></script>
    <script src="{{ asset('js/app.js') }}" ></script>
@endsection