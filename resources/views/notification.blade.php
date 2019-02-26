@extends('layouts.app-temp')

@section('header_scripts')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/hover.css') }}" >
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}" >
@endsection

@section('content')
    @include('widgets.top-nav-bar')
    <div class="notifications-wrapper-main">
        <div class="container notifications-wrapper">
            <h4><i class="fa fa-exclamation-circle"></i> Notifications</h4><hr>
            <div class="notification-post ">
                <button><i class="fa fa-times-circle hvr-grow-rotate"></i></button>
                <a href="index.html" class="">
                    <div class="notification-image-wrapper">
                        <img src="assets/fonts/icons/avatars/Q.svg" alt="">
                    </div>
                    <div class="notification-body">
                        <h5 class="animated zoomin ">Post Alert <i class="fa fa-bookmark-o"></i> <span class="date">3 may 2018</span></h5>
                        <p class="notification-text">Festus agboma has dropped a new post</p>
                    </div>
                </a>
            </div>
            <div class="notification-comments">
                <button><i class="fa fa-times-circle hvr-grow-rotate"></i></button>
                <a href="index.html" class="">
                    <div class="notification-image-wrapper">
                        <img src="assets/fonts/icons/avatars/C.svg" alt="">
                    </div>
                    <div class="notification-body">
                        <h5 class="animated zoomin ">Comment Alert <i class="fa fa-comment "></i> <span class="date">3 may 2018</span></h5>
                        <p class="notification-text">Festus commented on your question</p>
                    </div>
                </a>
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